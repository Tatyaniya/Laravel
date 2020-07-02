<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
 * Class Product
 * @package App
 *
 * @property-read $id
 * @property-read $category_id
 * @property-read $name
 * @property-read $price
 */
class Product extends Model
{
    protected $fillable = [
        'name', 'price', 'category_id', 'desc'
    ];
    /**
     * генерируем случайное имя картинке
     *
     * @return int
     */
    public function getImageId()
    {
        return $this->id % 9 +1;
    }
}
