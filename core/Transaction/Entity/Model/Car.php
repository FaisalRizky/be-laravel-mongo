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
 * Class Car
 *
 * @package Core\Transaction\Entity\Model\Car
 */
class Car extends Vehicle
{
    use HasFactory;

    protected $primaryKey = '_id';
    protected $collection = 'car';
    
    protected $fillable = ['machine', 'type', 'capacity'];
}