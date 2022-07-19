<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use DateTime;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
       $category = DB::table('category_posts')
                            ->orderBy('id_category','DESC')
                            ->get();
        return view('Admin.Content.Category.category')->with('category',$category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('Admin.Content.Category.add_category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        // $request->validate([
        //   'name_category' => 'string'
        // ]);

        $now = new DateTime();

        $data = array();
        $data['name_category'] = $request->name_category;
        $data['created_at'] = $now->format('Y-m-d');
        if($data['name_category'] == null){
          Session::put('message','Vui lòng điền tên danh mục');
          return Redirect::to('/category');
        }
        DB::table('category_posts')->insert($data);
        Session::put('message','Added');
        return Redirect::to('/category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $category = DB::table('category_posts')
                    ->where('id_category',$id)
                    ->get();
        return view('Admin.Content.Category.edit_category')->with('category',$category);
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
        $data['name_category'] = $request->name_category;
        DB::table('category_posts')
                 ->where('id_category',$request->id_category)
                 ->update($data);
        Session::put('message','updated');
        return Redirect::to('/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        DB::table('category_posts')
                 ->where('id_category',$id)
                 ->delete();
        Session::put('message','deleted');
        return Redirect::to('/category');
    }
}
