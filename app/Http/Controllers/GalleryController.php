<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use Auth;

class GalleryController extends Controller
{
    public function uploadImage(Request $request)
    {
        $data = $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // $data = $request->image->storeAs('images', $request->image->getClientOriginalName());
        $data = $request->file('image')->store('images');

        $image = new Image;
        $image->filename = $data;
        $image->original = $request->image->getClientOriginalName();
        $image->id_users = $request->user()->id;
        $image->save();

        return back()->with('success', 'Image Upload successful');
    }

    public function show()
    {
        $id_user = Auth::user()->id;
        $images = Image::where('id_users', $id_user)->get();
        return view('show', ['images' => $images]);
    }
}
