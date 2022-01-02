<?php

namespace Admins\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $fillable = ['name','created_at','updated_at'];

    protected $hidden = [
        'created_at','updated_at'
    ];
}
