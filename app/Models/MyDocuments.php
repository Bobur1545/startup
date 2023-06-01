<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyDocuments extends Model
{
    use HasFactory;
    protected $fillable = [
      'project_name', 'project_type', 'project_field', 'project_ppt', 'project_github',
        'project_images', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
