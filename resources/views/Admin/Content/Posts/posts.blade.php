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
                <li class="breadcrumb-item active">Posts</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
              <a href="{{URL::to('/add-post-form')}}" type="button" class="btn btn-primary">Add post<span class="btn-icon-right"><i class="fa fa-plus"></i></span></a>
                <div class="card-body">
                    <h4 class="card-title">All posts</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered verticle-middle">
                            <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Author</th>
                                    <th scope="col">Date time</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($posts as $key => $value)
                                <tr>
                                    <td>{{$value->title_post}}</td>
                                    <td>
                                      <img src="{{asset('public/Upload/BlogImages/'.$value->image_post.'')}}" class="w-50px m-r-10" alt="">
                                    </td>
                                    <td>{{$value->sub_post}}</td>
                                    <td>{{$value->author_post}}</td>
                                    <td><span class="label label-success">{{$value->created_at}}</span>
                                    </td>
                                    <td>
                                      <span>
                                        <a href="{{URL::to('/edit-post-form/id='.$value->id_post.'')}}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted m-r-5"></i> </a>
                                        <a href="{{URL::to('/delete-post/id='.$value->id_post.'')}}" data-toggle="tooltip" data-placement="top" title="Close"><i class="fa fa-close color-danger"></i></a>
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
