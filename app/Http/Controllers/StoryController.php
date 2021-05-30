<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Support\Facades\Cache;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stories = Story::orderBy('created_at', 'DESC')->paginate(6);
        return view ('story.story', ['stories' => $stories]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('story.detail', [
            'story' => Story::where('slug', $id)->first()
        ]);
    }
}
