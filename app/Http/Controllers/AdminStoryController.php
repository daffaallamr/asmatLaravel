<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminStoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stories = Story::all();
        return view('admin.story.index', [
            'stories' => $stories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.story.tambahData');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imageName_1 = Auth::id() . '_' . time() . '_' . $request->gambar_1->getClientOriginalName();
        $imageName_2 = Auth::id() . '_' . time() . '_' . $request->gambar_2->getClientOriginalName();
        $request->gambar_1->move(public_path('images'), $imageName_1); 
        $request->gambar_2->move(public_path('images'), $imageName_2);

        $story = new Story;
        $story->admin_id = $request->admin_id;

        $story->judul = $request->judul;
        $story->judul_paragraf_1 = $request->judul_paragraf_1;
        $story->paragraf_1 = $request->paragraf_1;

        $story->judul_paragraf_2 = $request->judul_paragraf_2;
        $story->paragraf_2 = $request->paragraf_2;

        $story->judul_paragraf_3 = $request->judul_paragraf_3;
        $story->paragraf_3 = $request->paragraf_3;

        $story->gambar_1 = $imageName_1;
        $story->gambar_2 = $imageName_1;
        $story->gambar_3 = $imageName_2;
        $story->save();

        return redirect()->route('adminStory.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.story.editData', [
            'story' => Story::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $imageName_1 = Auth::id() . '_' . time() . '_' . $request->gambar_1->getClientOriginalName();
        $imageName_2 = Auth::id() . '_' . time() . '_' . $request->gambar_2->getClientOriginalName();
        $request->gambar_1->move(public_path('images'), $imageName_1); 
        $request->gambar_2->move(public_path('images'), $imageName_2);

        $story = Story::where('id', $id)->first();
        $story->admin_id = $request->admin_id;

        $story->judul = $request->judul;
        $story->judul_paragraf_1 = $request->judul_paragraf_1;
        $story->paragraf_1 = $request->paragraf_1;

        $story->judul_paragraf_2 = $request->judul_paragraf_2;
        $story->paragraf_2 = $request->paragraf_2;

        $story->judul_paragraf_3 = $request->judul_paragraf_3;
        $story->paragraf_3 = $request->paragraf_3;

        $story->gambar_1 = $imageName_1;
        $story->gambar_2 = $imageName_1;
        $story->gambar_3 = $imageName_2;
        $story->save();

        return redirect()->route('adminStory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Story::where('id', $id)->first();
        $product->delete();

        return redirect()->route('adminStory.index');
    }
}
