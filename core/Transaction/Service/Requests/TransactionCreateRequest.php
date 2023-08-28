<?php
declare(strict_types=1);

/**
 * User: isalriz9@gmail.com
 * Date: 27/08/23 15:06
 */

namespace Core\Transaction\Service\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

/**
 * Class TransactionCreateRequest
 *
 * @package Core\Transaction\Service\Requests
 */
class TransactionCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    protected $stopOnFirstFailure = true;

    public function withValidator($validator)
    {
        if ($validator->stopOnFirstFailure()->fails()) {
            throw new HttpResponseException(response()->json([
                'errors' => $validator->errors(),
            ], 422));
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'vehicle_id'=> 'required|string',
            'operation' => 'required|in:Buy,Sell',
            'stock' => 'required|integer|min:1'
        ];
    }
}
