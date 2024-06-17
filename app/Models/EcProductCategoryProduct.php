<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EcProductCategoryProduct extends Model
{
    protected $table = 'ec_product_category_product';

    use HasFactory;
    protected $fillable = ['category_id', 'product_id'];

}
