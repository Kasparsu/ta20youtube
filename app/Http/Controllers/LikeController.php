<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Http\Requests\StoreLikeRequest;
use App\Http\Requests\UpdateLikeRequest;
use App\Models\Video;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
   public function like(Video $video){
       $like = $video->likes()->where('user_id', Auth::user()->id)->first();
       if($like){
           $like->delete();
       } else {
           $like = new Like();
           $like->video()->associate($video);
           $like->user()->associate(Auth::user());
           $like->save();
       }
       return redirect()->back();
   }
}
