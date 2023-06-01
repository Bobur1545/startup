<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShareDocuments extends Model
{
    use HasFactory;
    protected $fillable = [
        'mydocuments_id', 'competition_id', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function mydocuments()
    {
        return $this->belongsTo(MyDocuments::class,'mydocuments_id','id');
    }

    public function competition()
    {
        return $this->belongsTo(AddCompetition::class,'competition_id','id');
    }
}
