<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function get_all_posts()
    {
        $posts = Post::with('user', 'catagory')->get();
        return response()->json([
            'posts' => $posts
        ], 200);
    }
    public function save_post(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:2|max:50',
            'description' => 'required|min:2|max:1000'
        ]);
        $strpos = strpos($request->photo, ';');
        $sub = substr($request->photo, 0, $strpos);
        $ex = explode('/', $sub)[1];
        $name = time() . "." . $ex;
        $img = Image::make($request->photo)->resize(200, 200);
        $upload_path = public_path() . "/uploadimage/";
        $img->save($upload_path . $name);
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->cat_id = $request->cat_id;
        $post->user_id = Auth::user()->id;
        $post->photo = $name;
        $post->save();
    }
}
