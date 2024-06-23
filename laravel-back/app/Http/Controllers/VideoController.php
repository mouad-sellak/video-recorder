<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'video' => 'required|file|mimes:mp4,mov,avi,flv|max:10240' // Limite à 10MB
        ]);

        $path = $request->file('video')->store('videos', 'public');

        $video = new Video();
        $video->title = $request->title;
        $video->path = $path;
        $video->save();

        return response()->json(['message' => 'Video uploaded successfully'], 201);
    }

    public function show(Video $video)
    {
        return response()->json($video);
    }

    public function index()
    {
        $videos = Video::all();
        return response()->json($videos);
    }
}
