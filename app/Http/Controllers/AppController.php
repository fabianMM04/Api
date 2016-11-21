<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Blog;
use App\Photo;

class AppController extends Controller
{
    public function ShowForm() {
      return view('create');
    }

    public function Post(Request $request) {
      $blog = new Blog;
      $blog->name = $request->name;
      $blog->description = $request->description;
      $blog->save();

      /* Save pictures */
      $files = $request->file('files');

      # Save picture in storage and Make a new Photo Instance
        foreach ($files as $key => $image) {
          $ext = $image->getClientOriginalExtension();  // Extention
          $name = $key . '_' . time() . '.' . $ext;     // Create a new name for the current image file... i.e: "key_time.ext"
          $path = 'photos/';                    // Create the path
          $image->move($path, $name);

          $photo = new Photo;
          $photo->blog_id = $blog->id;
          $photo->path = '/'. $path . $name;
          $photo->save();
        }

      //return view('show')->with(['blog' => $blog ] );

      return redirect()->route('show', ['id' => $blog->id]);
    }

    public function Show($id) {
      $blog = Blog::where('id', $id)->first();

      $pictures = Photo::where('blog_id', $blog->id)->get();

      return view('show')->with([
        'blog' => $blog,
        'pictures' => $pictures
      ]);
    }
}
