<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'quiz_id',
        'a',
        'b',
        'c',
        'd',
        'answer',
    ];

    public function quiz(){
        return $this->hasMany(Quiz::class, 'id', 'quiz_id');
    }

}
