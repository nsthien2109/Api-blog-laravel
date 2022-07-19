<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\V1\Post;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Post::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $request->validate([
              'id_category' => 'required',
              'title_post' => 'required',
              'sub_post' => 'required',
              'description_post' => 'required',
              'author_post' => 'required',
              'image_post' => 'required',
            ]);
             $post = new Post();
             $post->title_post = $request->title_post;
             $post->sub_post = $request->sub_post;
             $post->description_post = $request->description_post;
             $post->author_post = $request->author_post;
             $post->id_category = $request->id_category;
             $image = $request->file('image_post');
             if($image != null){
               $image_name = 'post-'.rand(0,2000).$request->author_post.'.'.$image->getClientOriginalExtension();
               $image->store($image_name);
               $image->move('Upload/BlogImages/',$image_name);
               $post->image_post= $image_name;
               $post->save();
               return $post;
             }
             $post->image_post = "post_unknown.png";
             $posts->save();
             return $post;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($post)
    {
        $result = Post::where('id_post', $post)->get();
        return new PostResource($result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
      $post->update($request->all());
      return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        echo "Deleted";
    }


}
