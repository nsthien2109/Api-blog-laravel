<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\V1\Customer;
use App\Http\Resources\CustomerResource;
use Validator;
use DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CustomerResource::collection(Customer::paginate(5));
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
        // $request->validate([
        //   'name_customer' => 'required | string',
        //   'email_customer' => 'required | string',
        //   'phone_customer' => 'required',
        //   'password_customer' => 'required | string'
        // ]);

        $validator = Validator::make($request->all(),
                [
                'name_customer' => 'required',
                'email_customer' => 'required',
                'phone_customer' => 'required',
                'password_customer' => 'required',
               ]);

               //$data = array();
               $customer = new Customer();
               $customer->name_customer = $request->name_customer;
               $customer->email_customer = $request->email_customer;
               $customer->phone_customer = $request->phone_customer;
               $customer->password_customer = $request->password_customer;
               $customer->address_customer = $request->address_customer;
               $avatar = $request->file('avatar_customer');
               if($avatar != null){
                 $avatar_name = 'avatar-'.rand(0,2000).$request->name_customer.'.'.$avatar->getClientOriginalExtension();
                 $avatar->store($avatar_name);
                 $avatar->move('Upload/Avatar/',$avatar_name);
                 $customer->avatar_customer = $avatar_name;
                 $customer->save();
                 return new CustomerResource($customer);
               }
               $customer->avatar_customer = "unknow.png";
               $customer->save();
               return new CustomerResource($customer);

        // $customer = Customer::create($request->all());
        // return new CustomerResource($customer);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($customer)
    {
        return Customer::find($customer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Customer $customer)
    {
        $validator = Validator::make($request->all(),
                [
                'name_customer' => 'required',
                'email_customer' => 'required',
                'phone_customer' => 'required',
                'password_customer' => 'required',
                'avatar_customer' => 'mimes:png,jpg|max:2048',
               ]);

          if ($validator->fails()) {
                return response()->json(['error'=>$validator->errors()], 401);
            }
            $avatar = $request->file('avatar_customer');
            if($avatar != null){
              $avatar_name = 'avatar-'.rand(0,2000).$request->name_customer.'.'.$avatar->getClientOriginalExtension();
              $avatar->store($avatar_name);
              $avatar->move('public/Upload/Avatar',$avatar_name);
              $customer->avatar_customer = $avatar_name;
            }

            $customer->name_customer = $request->name_customer;
            $customer->email_customer = $request->email_customer;
            $customer->phone_customer = $request->phone_customer;
            $customer->password_customer = $request->password_customer;
            $customer->address_customer = $request->address_customer;
            $customer->update();
            return new CustomerResource($customer);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        echo "Deleted";
    }
}
