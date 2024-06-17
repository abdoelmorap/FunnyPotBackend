<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EcProductCategories extends Model
{

    use HasFactory;
    protected $fillable = ['name', 'parent_id'
    , 'description', 'status', 'order', 'image'
    , 'is_featured', 'icon', 'icon_image'];

}
