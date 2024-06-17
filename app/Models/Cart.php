<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';


    use HasFactory;
    protected $fillable = [ 'product_id', 'qnty', 'user_id'];

    // public function offline_payments()
    // {
    //     return $this->belongsTo(OfflinePayments::class,'id','order_id');
    // }

    public function item_details()
    {
        return $this->hasMany(EcProducts::class,'id','product_id')->with('itemFiles');
    }

}
