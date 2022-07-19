@extends('Admin.admin_layout')
@section('admin_content')
<div class="container">
    <div class="row page-titles">
      <?php
        $message = Session::get('message');
        if($message){
          echo '<div class="col p-0">
                  <h4>'.$message.'</h4>
                </div>';
          Session::put('message', null);
        }
      ?>
        <div class="col p-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Customer</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
              <a href="{{URL::to('/add-customer-form')}}" type="button" class="btn btn-primary">Add customer <span class="btn-icon-right"><i class="fa fa-plus"></i></span></a>
                <div class="card-body">
                    <h4 class="card-title">Customer</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered verticle-middle">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($customer as $key => $value)
                                <tr>
                                  <td><img src="{{asset('public/Upload/Avatar/'.$value->avatar_customer.'')}}" class="w-30px rounded-circle m-r-10" alt="">{{$value->name_customer}}</td>
                                    <td>{{$value->email_customer}}</td>
                                    <td>{{$value->phone_customer}}</td>
                                    <td><span class="label label-success">{{$value->address_customer}}</span>
                                    </td>
                                    <td>
                                      <span>
                                        <a href="{{URL::to('/edit-customer-form/id='.$value->id_customer.'')}}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted m-r-5"></i> </a>
                                        <a href="{{URL::to('/delete-customer/id='.$value->id_customer.'')}}" data-toggle="tooltip" data-placement="top" title="Close"><i class="fa fa-close color-danger"></i></a>
                                      </span>
                                    </td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #/ container -->
@endsection
