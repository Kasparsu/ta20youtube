<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'path', 'duration', 'thumbnail'];
// old version
//    public function getSnippetAttribute(){
//        return substr($this->description,0,100);
//    }

    public function snippet():Attribute {
        return Attribute::get(function (){
            return substr($this->description,0,100);
        });
    }
}
