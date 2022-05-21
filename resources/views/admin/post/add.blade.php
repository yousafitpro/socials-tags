@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
    <form action="{{route('admin.post.add')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header">
                <h3>Add New Post</h3>
               <label>Note!</label> <small>You must add at least one of the following fields to the body: 'text', 'image' or 'video'</small>
            </div>
            <div class="card-body">
                @include('errorBars.errorsArray',['title' => 'Error','errors'=>$errors])
                <div class="row">
                    <div class="col-md-12">
                        <i class="fa fa-pencil-square-o"></i> <label>Create a New Post</label>
                    </div>
                </div>
                <br>
                <br>
                <br>
               <div class="row">
                   <div class="col-md-1"></div>
                   <div class="col-md-10">
                       <div class="row">
                           <div class="col-md-2">
                               <label >
                                   Video
                               </label>
                               <br>
                           </div>
                           <div class="col-md-6">
                               <input name="video" accept="video/*" type="file" class="form-control btn btn-primary btn-outline">
                           </div>
                       </div><br>
                       <div class="row">
                           <div class="col-md-2">
                               <label >
                                   Image
                               </label>
                               <br>
                           </div>
                           <div class="col-md-6">
                               <input name="image" accept="image/*"  type="file" class="form-control btn btn-primary btn-outline">
                           </div>
                       </div><br>
                       <div class="row">
                           <div class="col-md-2">
                               <label >
                                  Link
                               </label>
                               <br>
                           </div>
                           <div class="col-md-6">
                               <small>(open on click Post)</small> <br>
                               <input name="link" value="{{old('link')}}" placeholder="Past link here..." class="form-control">
                           </div>
                       </div><br>
                       <div class="row">
                           <div class="col-md-2">
                               <label >
                                  Title  <small style="color:red">(required)</small>
                               </label>
                               <br>
                           </div>
                           <div class="col-md-6">
                           <input name="title" value="{{old('title')}}" class="form-control">
                           </div>
                       </div><br>

                       <div class="row">
                           <div class="col-md-2">
                               <label class="text-right" >
                                   Content
                               </label>
                               <br>
                           </div>
                           <div class="col-md-10">
                               <textarea class="summernote" name="contentdata" style="height: 40vh">{{old('contentdata')}}</textarea>


                           </div>
                       </div>

                       <br>
                       <div class="row">
                           <div class="col-md-12 ">
                               <button class="btn btn-primary float-right" type="submit" >Create</button>
                           </div>
                       </div>
                   </div>
                   <div class="col-md-1"></div>
               </div>
            </div>
        </div>
    </form>
</div>
            <div class="col-md-1"></div>
        </div>
    </div>

    <script>

       function addPost()
        {
            alert($('#summernote').code())
        }
        $(document).ready(function(){



        });

    </script>
@endsection
