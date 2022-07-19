@extends('Admin.admin_layout')
@section('admin_content')
<?php
  $message = Session::get('message');
  if($message){
    echo '<div class="col p-0">
            <h4>'.$message.'</h4>
          </div>';
    Session::put('message', null);
  }
?>
<div class="container">
    <div class="row page-titles">
        <div class="col p-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Category</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <a href="{{URL::to('/add-category-form')}}" type="button" class="btn btn-primary">Add category <span class="btn-icon-right"><i class="fa fa-plus"></i></span>
                </a>
                <div class="card-body">
                    <h4 class="card-title">Category list</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered verticle-middle">
                            <thead>
                                <tr>
                                    <th scope="col">Category name</th>
                                    <!-- <th scope="col">Date</th> -->
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($category as $key => $value)
                                <tr>
                                    <td>{{$value->name_category}}</td>
                                    <!-- <td>{{$value->created_at}}</td> -->
                                    </td>
                                    <td>
                                      <span>
                                        <a href="{{URL::to('/edit-category-form/id='.$value->id_category.'')}}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted m-r-5"></i> </a>
                                        <a href="{{URL::to('/delete-category/id='.$value->id_category.'')}}" data-toggle="tooltip" data-placement="top" title="Close"><i class="fa fa-close color-danger"></i></a>
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
