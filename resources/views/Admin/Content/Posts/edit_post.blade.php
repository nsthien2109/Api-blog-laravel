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
                       <li class="breadcrumb-item active">Edit post</li>
                   </ol>
               </div>
           </div>
           <div class="row">
               <div class="col-12">
                   <div class="card">
                       <div class="card-body">
                           <h4 class="card-title">Content</h4>
                           @foreach ($post as $key => $val)
                           <form method="post" action="{{URL::to('/edit-post')}}" enctype="multipart/form-data">
                             @csrf
                             <input type="hidden" name="id_post" value="{{$val->id_post}}">
                            <div class="card-body">
                            <h4 class="card-title">Post category</h4>
                               <div class="form-group">
                                  <select class="form-control" name="id_category">
                                    @foreach ($category as $key => $value)
                                      @if ($val->id_category == $value->id_category)
                                      <option selected value="{{$val->id_category}}">{{$value->name_category}}</option>
                                      @else
                                      <option value="{{$value->id_category}}">{{$value->name_category}}</option>
                                      @endif
                                    @endforeach
                                  </select>
                                </div>
                            </div>
                            <div class="card-body row">
                              <div class="col-6">
                                <h4 class="card-title">Title post</h4>
                                    <div class="form-group">
                                        <input type="text" name="title_post" value="{{$val->title_post}}" class="form-control" placeholder="Title post">
                                    </div>
                              </div>
                              <div class="col-6">
                                <h4 class="card-title">Author</h4>
                                    <div class="form-group">
                                        <input type="text" name="author_post" value="{{$val->author_post}}" class="form-control" placeholder="Author">
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
                                  <textarea class="form-control h-150px"  name="sub_post" rows="6" id="comment">{{$val->sub_post}}</textarea>
                               </div>
                            </div>
                            <div class="card-body">
                            <h4 class="card-title">Description</h4>
                                <div class="form-group">
                                   <textarea class="textarea_editor form-control"  name="description_post" rows="15" placeholder="Enter text ..." style="height:450px">{{$val->description_post}}</textarea>
                                </div>
                          </div>
                          <div class="card-body">
                            <h4 class="card-title">Post now</h4>
                              <div class="form-group">
                                <input type="submit" value="Post" class="btn btn-primary btn-lg">
                              </div>
                           </div>
                           </form>
                           @endforeach
                       </div>
                   </div>
               </div>
           </div>
       </div>
@endsection
