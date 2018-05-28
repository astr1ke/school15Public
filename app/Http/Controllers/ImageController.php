<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        $path =&gt; public_path().'\uploads\\';
        $file = $request->file('file');

        foreach ($file as $f) {
            $filename = str_random(20) .'.' . $f->getClientOriginalExtension() ?: 'png';
            $img = ImageInt::make($f);
            $img->resize(200,200)->save($path . $filename);
            Image::create(['title' => $request->title, 'img' => $filename]);
        }

        return redirect()->route('images.index');
    }
}
