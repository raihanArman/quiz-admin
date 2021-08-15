<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'path_id',
        'image',
        'content'
    ];

    public function path(){
        return $this->hasOne(Path::class, 'id', 'path_id');
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
