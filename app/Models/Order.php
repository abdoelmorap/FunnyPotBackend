<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'ec_orders';


    use HasFactory;
    protected $fillable = [ 'code', 'user_id', 'shipping_option'
    , 'shipping_method', 'status', 'amount', 'tax_amount', 'shipping_amount'
    , 'description', 'coupon_code', 'discount_amount', 'sub_total', 'is_confirmed'
    , 'discount_description', 'is_finished', 'completed_at', 'token', 'payment_id'
    , 'store_id', 'proof_file'];

 

    public function item_details()
    {
        return $this->hasMany(OrderItems::class,'id','product_id');
    }

}
