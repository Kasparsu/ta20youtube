<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(){
        $videos = Video::all();
        return view('index', compact('videos'));
    }

    public function page1(){
        return view('page1');
    }

    public function page2(){
        return view('page2');
    }
}
