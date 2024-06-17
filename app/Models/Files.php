<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    protected $table = 'ec_product_files';


    use HasFactory;
    protected $fillable = [ 'product_id', 'url', 'extras'];

    public function items()
    {
        return $this->belongsTo(EcProducts::class,'product_id','id');
    }

     

}
