<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddCompetition extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'last_document_day',
        'competition_day',
    ];

    public function sharedocuments(){
        return $this->hasMany(ShareDocuments::class, 'competition_id', 'id');
    }
    public function evaluation(){
        return $this->hasMany(Evaluation::class, 'competition_id', 'id');
    }
}
