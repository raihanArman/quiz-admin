<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Path extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'image',
        'student'
    ];

    public function category(){
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function toArray(){
        $toArray = parent::toArray();
        $toArray['image'] = $this->image;
        return $toArray;
    }

    public function getImageAttribute(){
        return url('') .  Storage::url($this->attributes['image']);
    }

}
