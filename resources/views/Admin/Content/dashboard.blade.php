@extends('Admin.admin_layout')
@section('admin_content')
<div class="container">
    <div class="row page-titles">
        <div class="col p-0">
            <h4>Hello, <span>Welcome here</span></h4>
        </div>
        <div class="col p-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a>
                </li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4>Customer <span class="pull-right"><i class="f-s-30 text-primary"></i></span></h4>
                    <h6 class="m-t-20 f-s-14">{{$CountCustomer}}</h6>
                    <div class="progress m-t-0 h-7px">
                        <div role="progressbar" class="progress-bar bg-primary wow animated progress-animated w-50pc h-7px"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4>Category <span class="pull-right"><i class="f-s-30 text-success"></i></span></h4>
                    <h6 class="m-t-20 f-s-14">{{$CountCategory}}</h6>
                    <div class="progress m-t-0 h-7px">
                        <div role="progressbar" class="progress-bar bg-success wow animated progress-animated w-90pc h-7px"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4>Post <span class="pull-right"><i class="f-s-30 text-danger"></i></span></h4>
                    <h6 class="m-t-20 f-s-14">{{$CountPost}}</h6>
                    <div class="progress m-t-0 h-7px">
                        <div role="progressbar" class="progress-bar bg-danger wow animated progress-animated w-65pc h-7px"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="active-member">
                        <div class="table-responsive">
                            <table class="table table-xs">
                                <thead>
                                    <tr>
                                        <th>Post</th>
                                        <th>Author</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($post as $key => $value)
                                    <tr>
                                        <td>
                                            <img src="{{asset('public/Upload/BlogImages/'.$value->image_post.'')}}" class="w-50px rounded-circle m-r-10" alt="">{{$value->title_post}}</td>
                                        </td>
                                        <td>{{$value->author_post}}</td>
                                        <td><span>{{$value->created_at}}</span>
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
</div>
<!-- #/ container -->
@endsection
