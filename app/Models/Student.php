<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'path_id'
    ];

    public function path(){
        return $this->hasMany(Path::class, 'id', 'path_id');
    }

    public function user(){
        return $this->hasMany(User::class, 'id', 'user_id');
    }

}
