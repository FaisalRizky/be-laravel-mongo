<?php

declare(strict_types=1);
/**
 * User: isalriz9@gmail.com
 * Date: 27/08/23 15:34
 */

namespace Core\Transaction\Entity\Model;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Vehicle
 *
 * @package Core\Transaction\Entity\Model\Vehicle
 */
class Vehicle extends Eloquent
{
    use HasFactory;

    protected $primaryKey = '_id';

    protected $collection = 'vehicle';
    protected $fillable = ['year', 'color', 'price', 'stock', 'type', 'brand'];
}
