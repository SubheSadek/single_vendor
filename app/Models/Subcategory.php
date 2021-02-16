<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subcategory extends Model
{
    use HasFactory,SoftDeletes;
    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'cat_id','subcat_name', 'subcat_status',
    ];
}
