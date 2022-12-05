<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Video;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PublicController extends Controller
{
    public function index(){
        $dbQuery = Video::query();
        if(request()->query('search')){
            $dbQuery->where('title', 'LIKE', '%' . request()->query('search') .'%')
                ->orWhere('description', 'LIKE', '%' . request()->query('search') .'%');
        }
        $videos = $dbQuery->latest()->paginate(12);
        return view('index', compact('videos'));
    }

    public function tag(Tag $tag){
        $dbQuery = $tag->videos();
        if(request()->query('search')){
            $dbQuery->where(function($query){
                $query->where('title', 'LIKE', '%' . request()->query('search') .'%')
                    ->orWhere('description', 'LIKE', '%' . request()->query('search') .'%');
            });
        }
        $videos = $dbQuery->latest()->paginate(12);
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
