<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $guardedd = [];

    public function category()
    {
        return $this->belongsTo(Category::class, 'cate_id', 'id');//foreign key, primary key
    }
}
