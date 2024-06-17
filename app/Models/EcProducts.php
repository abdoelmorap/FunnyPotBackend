<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EcProducts extends Model
{

    use HasFactory;
    public function itemFiles()
    {
        return $this->hasMany(Files::class,'id','product_id');
    }
    public function reviews()
    {
        return $this->hasMany(Reviews::class,'id','product_id');
    }
}
