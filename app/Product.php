<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
 * Class Product
 * @package App
 *
 * @property-read $id
 * @property-read $name
 * @property-read $price
 */
class Product extends Model
{
    public function getImageId()
    {
        return $this->id % 9 +1;
    }
}
