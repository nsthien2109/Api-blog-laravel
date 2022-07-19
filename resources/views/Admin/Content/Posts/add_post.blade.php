@extends('Admin.admin_layout')
@section('admin_content')
<div class="container">
           <div class="row page-titles">
               <div class="col p-0">
                   <h4>Hello, <span>Welcome here</span></h4>
               </div>
               <div class="col p-0">
                   <ol class="breadcrumb">
                       <li class="breadcrumb-item"><a href="javascript:void(0)">Posts</a>
                       </li>
                       <li class="breadcrumb-item active">Add post</li>
                   </ol>
               </div>
           </div>
           <div class="row">
               <div class="col-12">
                   <div class="card">
                       <div class="card-body">
                           <h4 class="card-title">Content</h4>
                           <form method="post" action="{{URL::to('/add-post')}}" enctype="multipart/form-data">
                             @csrf
                            <div class="card-body">
                            <h4 class="card-title">Post category</h4>
                               <div class="form-group">
                                  <select class="form-control" name="id_category">
                                    @foreach ($category as $key => $value)
                                      <option value="{{$value->id_category}}">{{$value->name_category}}</option>
                                    @endforeach
                                  </select>
                                </div>
                            </div>
                            <div class="card-body row">
                              <div class="col-6">
                                <h4 class="card-title">Title post</h4>
                                    <div class="form-group">
                                        <input type="text" name="title_post" class="form-control" placeholder="Title post">
                                    </div>
                              </div>
                              <div class="col-6">
                                <h4 class="card-title">Author</h4>
                                    <div class="form-group">
                                        <input type="text" name="author_post" class="form-control" placeholder="Author">
                                    </div>
                              </div>
                            </div>
                            <div class="card-body">
                            <h4 class="card-title">Main Image Post</h4>
                                <div class="form-group">
                                   <input type="file" name="image_post" class="form-control-file">
                                </div>
                            </div>
                            <div class="card-body">
                            <h4 class="card-title">Short description</h4>
                               <div class="form-group">
                                  <label>Subject :</label>
                                  <textarea class="form-control h-150px" name="sub_post" rows="6" id="comment"></textarea>
                               </div>
                            </div>
                            <div class="card-body">
                            <h4 class="card-title">Description</h4>
                                <div class="form-group">
                                   <textarea class="textarea_editor form-control" name="description_post" rows="15" placeholder="Enter text ..." style="height:450px"></textarea>
                                </div>
                          </div>
                          <div class="card-body">
                            <h4 class="card-title">Post now</h4>
                              <div class="form-group">
                                <input type="submit" value="Post" class="btn btn-primary btn-lg">
                              </div>
                           </div>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
@endsection
