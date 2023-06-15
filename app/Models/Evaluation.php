<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_1',
        'category_2',
        'category_3',
        'category_4',
        'category_all',
        'competition_id',
        'user_id'
    ];
    protected $casts = [
        'category_all' => 'integer',
    ];

    public function calculateCategoryAll()
    {
        $category1 = $this->category_1 ?? 0;
        $category2 = $this->category_2 ?? 0;
        $category3 = $this->category_3 ?? 0;
        $category4 = $this->category_4 ?? 0;

        $categoryAll = $category1 + $category2 + $category3 + $category4;

        $this->category_all = $categoryAll;
        $this->save();
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function add_competition()
    {
        return $this->belongsTo(AddCompetition::class,'competition_id','id');
    }
}
