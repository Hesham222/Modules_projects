<?php

namespace Vendors\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name','category_id','color','price','created_at','updated_at'];

    protected $hidden = [
        'created_at','updated_at'
    ];

    public function category(){
       return $this->belongsTo('Vendors\Models\Category','category_id')->select('id','name');
    }
}
