<?php

declare(strict_types=1);
/**
 * User: isalriz9@gmail.com
 * Date: 27/08/23 15:34
 */

namespace Core\Transaction\Entity\Model;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Motorcycle extends Vehicle
{
    use HasFactory;

    protected $primaryKey = '_id';
    protected $collection = 'motorcycle';
    protected $fillable = ['machine', 'suspension_type', 'transmission_type'];
}