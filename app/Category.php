<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * @package App
 *
 * @property-read $id
 * @property-read $name
 */
class Category extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'name', 'desc'
    ];
}
