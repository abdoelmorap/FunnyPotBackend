<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    protected $table = 'ec_order_product';

 
    use HasFactory;
    protected $fillable = ['order_id', 'product_id', 'qty', 'price', 'tax_amount', 'options', 'product_options', 'product_name'
    , 'product_image', 'weight', 'restock_quantity', 'product_type', 'times_downloaded', 'license_code'];
 


}