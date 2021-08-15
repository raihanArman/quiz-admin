<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'quiz_id',
        'score',
        'correct',
        'incorrect',
        'not_answered',
    ];

    
    public function quiz(){
        return $this->hasMany(Quiz::class, 'id', 'quiz_id');
    }
    
    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}
