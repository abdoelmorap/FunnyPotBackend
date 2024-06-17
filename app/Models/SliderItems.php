<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderItems extends Model
{
    protected $table = 'simple_slider_items';


    use HasFactory;
    protected $fillable = [ 'simple_slider_id', 'title', 'image',
    'link', 'description','order'];

     

}
