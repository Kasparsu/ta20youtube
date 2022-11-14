<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PublicController extends Controller
{
    public function index(){
        $videos = Video::latest()->paginate(12);
        return view('index', compact('videos'));
    }

    public function video(Video $video){
        return view('view', compact('video'));
    }

    public function page1(){
        return view('page1');
    }

    public function page2(){
        return view('page2');
    }
}
