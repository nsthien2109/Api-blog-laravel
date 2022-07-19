<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\FileController;
use DB;
use Redirect;
use Session;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $customer = DB::table('customer')->orderBy('id_customer','DESC')->get();
      return view('Admin.Content.Customer.customer')->with('customer',$customer);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Content.Customer.add_customer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array();
        $data['name_customer'] = $request->name_customer;
        $data['email_customer'] = $request->email_customer;
        $data['phone_customer'] = $request->phone_customer;
        $data['password_customer'] = $request->password_customer;
        $data['address_customer'] = $request->address_customer;
        $avatar = $request->file('avatar_customer');

        if($avatar != null){
          $avatar_name = 'avatar-'.rand(0,2000).$request->name_customer.'.'.$avatar->getClientOriginalExtension();
          $avatar->store($avatar_name);
          $avatar->move('public/Upload/Avatar',$avatar_name);
          $data['avatar_customer'] = $avatar_name;
          DB::table('customer')->insert($data);
          Session::put('message','Added Customer');
          return Redirect::to('/customer');
        }

        if($data['name_customer'] == null || $data['email_customer'] == null || $data['phone_customer'] == null || $data['password_customer'] == null || $data['address_customer'] == null){
            Session::put('message','Vui lòng điền đầy đủ các trường');
            return Redirect::to('/customer');
        }


        DB::table('customer')->insert($data);
        Session::put('message','Added Customer');
        return Redirect::to('/customer');
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
      $customer = DB::table('customer')
                  ->where('id_customer',$id)
                  ->get();
      return view('Admin.Content.Customer.edit_customer')->with('customer',$customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = array();
        $data['name_customer'] = $request->name_customer;
        $data['email_customer'] = $request->email_customer;
        $data['phone_customer'] = $request->phone_customer;
        $data['password_customer'] = $request->password_customer;
        $data['address_customer'] = $request->address_customer;
        if($data['name_customer'] == null || $data['email_customer'] == null || $data['phone_customer'] == null || $data['password_customer'] == null || $data['address_customer'] == null){
            Session::put('message','Cập nhật thất bại do một trong số các trường bị thiếu');
            return Redirect::to('/customer');
        }
        DB::table('customer')->where('id_customer',$request->id_customer)->update($data);
        Session::put('message','Updated Customer');
        return Redirect::to('/customer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      DB::table('customer')
               ->where('id_customer',$id)
               ->delete();
      Session::put('message','deleted');
      return Redirect::to('/customer');
    }
}
