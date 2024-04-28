<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    
    protected $fillable = [
        
        'name',
        'description',
        'slug',
        'popular',
        'meta_title',
         'meta_des',
         'meta_keywords'   
        
    ];
}
