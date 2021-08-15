<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'path_id',
        'sum_que'
    ];

    public function path(){
        return $this->hasMany(Path::class, 'id', 'path_id');
    }

}
