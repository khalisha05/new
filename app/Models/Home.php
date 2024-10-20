<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;

    protected $fillable = [
        'banner_title',
        'banner_description',
        'banner_image',
        // Tambahkan atribut lain sesuai kebutuhan
    ];
}
