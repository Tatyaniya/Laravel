<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
 * Class Order
 * @package App
 *
 * @property-read $id
 * @property-read $product_id
 * @property-read $name
 * @property-read $email
 */
class Order extends Model
{
    protected $fillable = [
        'product_id', 'name', 'email'
    ];
}
