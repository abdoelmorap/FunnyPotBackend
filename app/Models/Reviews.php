<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    protected $table = 'ec_reviews';

    use HasFactory;
    protected $fillable = ['customer_id', 'product_id', 'star', 'comment', 'images'];

}
