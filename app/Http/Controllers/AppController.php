<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Blog;
use App\Photo;

use Validator;
use DB;

class AppController extends Controller
{
    /**
    * Show a form to create a blog instance
    *
    * @return \Illuminate\Http\Response
    */
    public function ShowForm() {
      return view('create');
    }

    /**
    * Post a blog instance
    *
    * @param \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
    public function Post(Request $request) {

      $rules = [
        'name' => 'bail|required|min:6|max:60',
        'description' => 'bail|required|min:6|max:300',
      ];

      /*
      $files = count($request->file('files'));

      foreach(range(0, $files) as $index) {
          //$rules['file.' . $index] = 'required|mimes:png,jpeg,jpg,gif';   // check
      }*/

      $validator = Validator::make($request->all(), $rules);

      // If fails
      if ($validator->fails()) {
          return redirect('/create/blog')
                      ->withErrors($validator)
                      ->withInput();
      }

      /*
      if(count($request->file('files')) == 0) {
        return redirect()->back()->with('status', ['Must upload a file'])
                      ->withInput();
      }*/

      // If ok
      $blog = new Blog;
      $blog->name = $request->name;
      $blog->description = $request->description;
      $blog->save();

      /* Save pictures */
      $files = $request->file('files');

      # Save picture in storage and Make a new Photo Instance
      foreach ($files as $key => $image) {
        $ext = $image->getClientOriginalExtension();    // Extension
        $name = $key . '_' . time() . '.' . $ext;       // Create a new name for the current image file... i.e: "key_time.ext"
        $path = 'photos/';                              // Create the path
        $image->move($path, $name);

        $photo = new Photo;
        $photo->blog_id = $blog->id;
        $photo->name = $name;
        $photo->save();
      }

      return redirect('/show/' . $blog->id);    // show/{id}
    }

    /**
    * Show a blog instance
    *
    * @param $id
    * @return \Illuminate\Http\Response [$blog, $pictures]
    */
    public function Show($id) {
      $blog = Blog::where('id', $id)->first();

      if(is_null($blog))
        return view('errors.404');

      $pictures = Photo::where('blog_id', $blog->id)->get();

      return view('show')->with([
        'blog' => $blog,
        'pictures' => $pictures
      ]);
    }

    /**
    * Show last five blog instances and display the welcome view
    *
    * @return \Illuminate\Http\Response [$blogs, $pictures]
    */
    public function ShowLastFive() {
      $blogs = Blog::orderBy('id', 'desc')->take(5)->get();

      return view('welcome')->with([
        'blogs' => $blogs
      ]);
    }
}
