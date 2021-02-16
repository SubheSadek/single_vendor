<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sitesetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'phone_one','phone_two','email','company_name', 'logo', 'address', 'facebook', 'youtube', 'instagram', 'twitter',
    ];
}
