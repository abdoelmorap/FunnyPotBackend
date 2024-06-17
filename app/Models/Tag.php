<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'ec_product_tag_product';

    use HasFactory;
    protected $fillable = ['tag_id', 'product_id'];

}
