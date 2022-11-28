<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Auth::user()->videos()->latest()->paginate();
        return view('videos.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('videos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVideoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVideoRequest $request)
    {

//        $video = new Video();
//        $video->title = $request->validated('title');
//        $video->description = $request->validated('description');
//        $video->duration = $request->validated('duration');
//        $video->path = $request->validated('path');
//        $video->thumbnail = $request->validated('thumbnail');
        $video = new Video($request->validated());
        $video->user()->associate(Auth::user());
        $video->save();
        $request->session()->flash('status', 'Video added successfuly!');
        return redirect()->route('videos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {

        if($video->user->id !== Auth::user()->id){
            throw new NotFoundHttpException();
        }
        return view('videos.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVideoRequest  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVideoRequest $request, Video $video)
    {
        if($video->user->id !== Auth::user()->id){
            throw new NotFoundHttpException();
        }
        $video->fill($request->validated());
        $video->save();
        $request->session()->flash('status', 'Video updated successfuly!');
        return redirect()->route('videos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        if($video->user->id !== Auth::user()->id){
            throw new NotFoundHttpException();
        }
        $video->delete();
        request()->session()->flash('status', 'Video deleted successfuly!');
        return redirect()->route('videos.index');
    }
}
