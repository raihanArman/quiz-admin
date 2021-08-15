<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image'
    ];

    public function toArray(){
        $toArray = parent::toArray();
        $toArray['image'] = $this->image;
        return $toArray;
    }

    public function getImageAttribute(){
        return url('') .  Storage::url($this->attributes['image']);
    }

}
