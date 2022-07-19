@extends('Admin.admin_layout')
@section('admin_content')
<div class="container">
                <div class="row page-titles">
                    <div class="col p-0">
                        <h4>Hello, <span>Welcome here</span></h4>
                    </div>
                    <div class="col p-0">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Customer</a>
                            </li>
                            <li class="breadcrumb-item active">Add Customer</li>
                        </ol>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-validation">
                                  @foreach ($customer as $key => $value)
                                    <form class="form-valide" action="{{URL::to('/edit-customer')}}" method="post" enctype="multipart/form-data">
                                      @csrf
                                      <input type="hidden" class="form-control" value="{{$value->id_customer}}" name="id_customer">
                                      <div class="form-group row">
                                          <label class="col-lg-4 col-form-label" for="val-username">Full name <span class="text-danger">*</span>
                                          </label>
                                          <div class="col-lg-6">
                                              <input type="text" class="form-control" value="{{$value->name_customer}}" id="val-username" name="name_customer" placeholder="Enter full name..">
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label class="col-lg-4 col-form-label" for="val-email">Email <span class="text-danger">*</span>
                                          </label>
                                          <div class="col-lg-6">
                                              <input type="text" class="form-control" id="val-email" value="{{$value->email_customer}}" name="email_customer" placeholder="Your valid email..">
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label class="col-lg-4 col-form-label" for="val-password">Password <span class="text-danger">*</span>
                                          </label>
                                          <div class="col-lg-6">
                                              <input type="password" class="form-control" value="{{$value->password_customer}}" id="val-password" name="password_customer" placeholder="Choose a safe one..">
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label class="col-lg-4 col-form-label" for="val-phoneus">Phone <span class="text-danger">*</span>
                                          </label>
                                          <div class="col-lg-6">
                                              <input type="text" class="form-control" value="{{$value->phone_customer}}" id="val-phoneus" name="phone_customer" placeholder="Enter your phone">
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label class="col-lg-4 col-form-label" for="val-digits">Address <span class="text-danger">*</span>
                                          </label>
                                          <div class="col-lg-6">
                                              <input type="text" class="form-control" value="{{$value->address_customer}}" id="val-digits" name="address_customer" placeholder="Address...">
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <div class="col-lg-8 ml-auto">
                                              <button type="submit" class="btn btn-primary">Submit</button>
                                          </div>
                                      </div>
                                    </form>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
