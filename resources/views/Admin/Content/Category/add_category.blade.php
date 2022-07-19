@extends('Admin.admin_layout')
@section('admin_content')
        <div class="container">
                <div class="row page-titles">
                    <div class="col p-0">
                        <h4>Hello, <span>Welcome here</span></h4>
                    </div>
                    <div class="col p-0">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">Add Categories</li>
                        </ol>
                    </div>
                </div>
            <div class="row">
                   <div class="col-lg-12">
                       <div class="card">
                           <div class="card-body">
                               <h4 class="card-title">Add Categories</h4>
                               <div class="basic-form">
                                   <form method="post" action="{{URL::to('/add-category')}}">
                                     @csrf
                                       <div class="form-group row">
                                           <label class="col-sm-2 col-form-label">Category name</label>
                                           <div class="col-sm-10">
                                               <input type="text" class="form-control" name="name_category" placeholder="Category name">
                                           </div>
                                       </div>

                                       <div class="form-group row">
                                           <div class="col-sm-10">
                                               <button type="submit" class="btn btn-dark">Add</button>
                                           </div>
                                       </div>
                                   </form>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>

          </div>
@endsection
