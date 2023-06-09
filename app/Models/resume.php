<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resume extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'pdfurl',
        'upload_or_update'=> 'datetime',
        'user_id'
    ];

}
