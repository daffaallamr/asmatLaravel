<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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
        $rules = [
            'judul'                  => 'required|min:5|max:100|unique:stories,judul',
            'judul_paragraf_1'         => 'required',
            'paragraf_1'         => 'required',
            'gambar_1'         => 'required',
        ];
 
        $messages = [
            'judul.required'   => 'Judul wajib diisi',
            'judul.min'   => 'Judul minimal 5 karakter',
            'judul.max'   => 'Judul maksimal 100 karakter',
            'judul.unique'   => 'Judul sudah terdaftar',
            'judul_paragraf_1.required'          => 'Judul Paragraf Pertama belum diisi',
            'paragraf_1.required'          => 'Paragraf Pertama belum diisi',
            'gambar_1.required' => 'Gambar - 1 wajib diisi',
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        if($request->gambar_2 == null) {
            $imageName_1 = Auth::id() . '_' . time() . '_' . $request->gambar_1->getClientOriginalName();
            $request->gambar_1->move(public_path('images/stories'), $imageName_1); 

            $story = new Story;
            $story->admin_id = $request->admin_id;

            $story->judul = $request->judul;
            $story->slug = Str::slug($request->judul, '-');
            $story->link_video = $request->link_video;
            $story->judul_paragraf_1 = $request->judul_paragraf_1;
            $story->paragraf_1 = $request->paragraf_1;

            $story->judul_paragraf_2 = $request->judul_paragraf_2;
            $story->paragraf_2 = $request->paragraf_2;

            $story->judul_paragraf_3 = $request->judul_paragraf_3;
            $story->paragraf_3 = $request->paragraf_3;

            $story->gambar_1 = $imageName_1;
            $story->gambar_2 = $imageName_1;
            $story->save();
        } else {
            $imageName_1 = Auth::id() . '_' . time() . '_' . $request->gambar_1->getClientOriginalName();
            $imageName_2 = Auth::id() . '_' . time() . '_' . $request->gambar_2->getClientOriginalName();
            $request->gambar_1->move(public_path('images/stories'), $imageName_1); 
            $request->gambar_2->move(public_path('images/stories'), $imageName_2);

            $story = new Story;
            $story->admin_id = $request->admin_id;

            $story->judul = $request->judul;
            $story->slug = Str::slug($request->judul, '-');
            $story->link_video = $request->link_video;
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
        }

        return redirect()->route('adminStory.index');
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
        $rules = [
            'judul'                  => 'required|min:5|max:100',
            'judul_paragraf_1'         => 'required',
            'paragraf_1'         => 'required',
        ];
 
        $messages = [
            'judul.required'   => 'Judul wajib diisi',
            'judul.min'   => 'Judul minimal 5 karakter',
            'judul.max'   => 'Judul maksimal 100 karakter',
            'judul_paragraf_1.required'          => 'Judul Paragraf Pertama belum diisi',
            'paragraf_1.required'          => 'Paragraf Pertama belum diisi',
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        if ($request->gambar_1 == null) {

            $story = Story::findOrFail($id);
            $story->admin_id = $request->admin_id;

            $story->judul = $request->judul;
            $story->slug = Str::slug($request->judul, '-');
            $story->link_video = $request->link_video;
            $story->judul_paragraf_1 = $request->judul_paragraf_1;
            $story->paragraf_1 = $request->paragraf_1;

            $story->judul_paragraf_2 = $request->judul_paragraf_2;
            $story->paragraf_2 = $request->paragraf_2;

            $story->judul_paragraf_3 = $request->judul_paragraf_3;
            $story->paragraf_3 = $request->paragraf_3;
            $story->save();

        } else if($request->gambar_2 == null) {

            $imageName_1 = Auth::id() . '_' . time() . '_' . $request->gambar_1->getClientOriginalName();
            $request->gambar_1->move(public_path('images/stories'), $imageName_1); 

            $story = Story::findOrFail($id);
            $image_1_path = "public/images/stories/". $story->gambar_1;
            if(File::exists($image_1_path)) {
                File::delete($image_1_path);
            }
            $story->admin_id = $request->admin_id;

            $story->judul = $request->judul;
            $story->slug = Str::slug($request->judul, '-');
            $story->link_video = $request->link_video;
            $story->judul_paragraf_1 = $request->judul_paragraf_1;
            $story->paragraf_1 = $request->paragraf_1;

            $story->judul_paragraf_2 = $request->judul_paragraf_2;
            $story->paragraf_2 = $request->paragraf_2;

            $story->judul_paragraf_3 = $request->judul_paragraf_3;
            $story->paragraf_3 = $request->paragraf_3;

            $story->gambar_1 = $imageName_1;
            $story->gambar_2 = $imageName_1;
            $story->save();

        } else {

            $imageName_1 = Auth::id() . '_' . time() . '_' . $request->gambar_1->getClientOriginalName();
            $imageName_2 = Auth::id() . '_' . time() . '_' . $request->gambar_2->getClientOriginalName();
            $request->gambar_1->move(public_path('images/stories'), $imageName_1); 
            $request->gambar_2->move(public_path('images/stories'), $imageName_2);

            $story = Story::findOrFail($id);
            $image_1_path = "public/images/stories/". $story->gambar_1;
            if(File::exists($image_1_path)) {
                File::delete($image_1_path);
            }
            $image_2_path = "public/images/stories/". $story->gambar_3;
            if(File::exists($image_2_path)) {
                File::delete($image_2_path);
            }
            $story->admin_id = $request->admin_id;

            $story->judul = $request->judul;
            $story->slug = Str::slug($request->judul, '-');
            $story->link_video = $request->link_video;
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

        }

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
        $story = Story::where('id', $id)->first();
        $image_1_path = "public/images/stories/". $story->gambar_1;
        if(File::exists($image_1_path)) {
            File::delete($image_1_path);
        }

        $image_2_path = "public/images/stories/". $story->gambar_3;
        if(File::exists($image_2_path)) {
            File::delete($image_2_path);
        }
        $story->delete();

        return redirect()->route('adminStory.index');
    }
}
