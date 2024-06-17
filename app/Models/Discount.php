<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $table = 'ec_discounts';

    use HasFactory;
    protected $fillable = [ 'title', 'code', 'start_date', 'end_date', 'quantity', 'total_used', 'value', 'type', 'can_use_with_promotion', 'discount_on', 'product_quantity', 'type_option',
    'target', 'min_order_price', 'apply_via_url', 'display_at_checkout', 'store_id', 'description'];
 

    
}
