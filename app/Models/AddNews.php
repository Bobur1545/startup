<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddNews extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'text', 'image'
    ];
}
