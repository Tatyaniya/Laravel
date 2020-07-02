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
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    /**
     * @var string[]
     */
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
