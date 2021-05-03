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
        $storiesCache = Cache::remember('semua-cerita-cache', 10, function() {
            return Story::orderBy('created_at', 'DESC')->paginate(6);
        });

        return view ('story.story', ['stories' => $storiesCache]);
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
            'story' => Story::findOrFail($id)
        ]);
    }
}
