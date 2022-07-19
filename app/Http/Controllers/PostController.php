<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;
use DateTime;

class PostController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
      $posts = DB::table('posts')
                           ->orderBy('id_post','DESC')
                           ->get();
       return view('Admin.Content.Posts.posts')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $category = DB::table('category_posts')->get();
        return view('Admin.Content.Posts.add_post')->with('category',$category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $now = new DateTime();

        $data = array();
        $data['title_post'] = $request->title_post;
        $data['author_post'] = $request->author_post;
        $data['sub_post'] = $request->sub_post;
        $data['id_category'] = $request->id_category;
        $data['description_post'] = $request->description_post;
        $data['created_at'] = $now->format('Y-m-d');
        $image = $request->file('image_post');
        if($image != null){
          $image_name = 'post-'.rand(0,2000).'.'.$image->getClientOriginalExtension();
          $image->store($image_name);
          $image->move('public/Upload/BlogImages',$image_name);
          $data['image_post'] = $image_name;
          DB::table('posts')->insert($data);
          Session::put('message','Added Post');
          return Redirect::to('/posts');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
      $category = DB::table('category_posts')->get();
      $post = DB::table('posts')->where('id_post',$id)->get();
      return view('Admin.Content.Posts.edit_post')->with('category',$category)->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request){

      $data = array();
      $data['title_post'] = $request->title_post;
      $data['author_post'] = $request->author_post;
      $data['sub_post'] = $request->sub_post;
      $data['id_category'] = $request->id_category;
      $data['description_post'] = $request->description_post;

      $image = $request->file('image_post');

      if($image != null){
        $image_name = 'post-'.rand(0,2000).rand(0,9999).'.'.$image->getClientOriginalExtension();
        $image->store($image_name);
        $image->move('public/Upload/BlogImages',$image_name);
        $data['image_post'] = $image_name;
      }
      DB::table('posts')->where('id_post',$request->id_post)->update($data);
      Session::put('message','Edited Post');
      return Redirect::to('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
      DB::table('posts')
               ->where('id_post',$id)
               ->delete();
      Session::put('message','deleted');
      return Redirect::to('/posts');
    }
}
