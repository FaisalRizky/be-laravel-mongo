<?php
declare(strict_types=1);

/**
 * User: isalriz9@gmail.com
 * Date: 27/08/23 15:34
 */

namespace Core\Transaction\Entity\Repository;

use Core\Transaction\Entity\Model\Vehicle;
use Core\Transaction\Entity\Model\Transaction;
use Core\Foundation\Exception\MessageExceptionInterface;
use Core\Foundation\Exception\HttpCodeInterface;
use Core\Transaction\Exception\VehicleNotFoundException;
use Illuminate\Support\Facades\Hash;
use MongoDB\BSON\ObjectId;
use MongoDB\BSON\UTCDateTime;

/**
 * Class UserService
 *
 * @package Core\Transaction\Entity\Repository\TransactionRepository
 */
class TransactionRepository implements TransactionRepositoryInterface
{
    protected $vehicle;

    public function __construct(Vehicle $vehicle)
    {
        $this->vehicle = $vehicle;
    }

    /**
     * @inheritdoc
     */
    public function createTransaction($request)
    {
        $operation = $request->input('operation');
        $newStock  = (int) $request->input('stock');
        $vehicleId = $request->input('vehicle_id');

        // Find the vehicle by ID
        $vehicle = Vehicle::find($vehicleId);

        if (!$vehicle) {
            throw new VehicleNotFoundException(MessageExceptionInterface::VEHICLE_NOT_FOUND, HttpCodeInterface::NOT_FOUND);
        }

        $aggregationPipeline = [];
        if ($operation === 'Buy') {
            $aggregationPipeline[] = ['$set' => ['stock' => ['$add' => ['$stock', $newStock]]]];
        } elseif ($operation === 'Sell') {
            $aggregationPipeline[] = ['$set' => ['stock' => ['$subtract' => ['$stock', $newStock]]]];
        }
        // Find the vehicle by ID and perform the aggregation update
        Vehicle::raw(function ($collection) use ($vehicleId, $aggregationPipeline) {
            $collection->findOneAndUpdate(['_id' => new ObjectId($vehicleId)], $aggregationPipeline);
        });

        $transaction = new Transaction($request->all());

        $transaction->save();
        return $transaction;
    }

    
    /**
     * @inheritdoc
     */
    public function getSellTransactions($request)
    {
        // Retrieve the vehicle_id from the query parameters if present
        $vehicleId = $request->query('vehicle_id');

        // Define the query criteria
        if ($vehicleId) {
            $pipeline[] = [
                '$match' => [
                    'vehicle_id' => $vehicleId,
                    'operation' => 'Sell',
                ],
            ];
        } else {
            $pipeline[] = [
                '$match' => [
                    'operation' => 'Sell',
                ],
            ];
        }

        $pipeline[] = [
            '$group' => [
                '_id' => '$vehicle_id',
                'total_sales' => ['$sum' => ['$ifNull' => ['$stock', 0]]],
            ],
        ];

        
        $pipeline[] = [
            '$project' => [
                '_id' => 0,
                'vehicle_id' => '$_id',
                'total_sales' => 1,
            ],
        ];

        $summary = Transaction::raw(function ($collection) use ($pipeline) {
            return $collection->aggregate($pipeline)->toArray();
        });

        return $summary;
    }

    /**
     * @inheritdoc
     */
    public function getDetail($request)
    {
        // Retrieve the vehicle_id from the query parameters if present
        $type = $request->query('type');
        $_id = $request->query('id');

        // Define the query criteria
        $query = [];
        if ($type) {
            $query['type'] = [
                '$regex' => $type,
                '$options' => 'i', // 'i' flag for case-insensitivity
            ];
        }
        
        if ($_id) {
            $query['_id'] = new \MongoDB\BSON\ObjectID($_id);
        }

        // Retrieve the transactions based on the query and convert to an array
        $transactions = Vehicle::raw(function ($collection) use ($query) {
            return $collection->find($query)->toArray();
        });

        // Convert _id to string without $oid and format date fields
        $transactions = array_map(function ($transaction) {
            $transaction['_id'] = (string) $transaction['_id'];
            $transaction['updated_at'] = (new UTCDateTime($transaction['updated_at']->toDateTime()))->toDateTime()->format('Y-m-d H:i:s');
            $transaction['created_at'] = (new UTCDateTime($transaction['created_at']->toDateTime()))->toDateTime()->format('Y-m-d H:i:s');
            return $transaction;
        }, $transactions);

        return $transactions;
    }
}
