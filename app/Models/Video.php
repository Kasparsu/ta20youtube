<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function authHasLiked(): Attribute {
        return Attribute::get(function (){
            return $this->likes()->where('user_id', Auth::user()->id)->exists();
        });
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
