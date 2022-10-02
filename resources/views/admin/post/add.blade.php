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
                              Category
                               </label>
                               <br>
                           </div>
                           <div class="col-md-6">
                               <select name="category" id="category" onchange="onCategoryChange()" class="form-control">
                                   <option value="native">Native</option>
                                   <option value="youtube">Youtube</option>
                               </select>
                           </div>
                       </div><br>
                       <div class="row">
                           <div class="col-md-2">
                               <label >
                                  Username
                               </label>
                               <br>
                           </div>
                           <div class="col-md-6">

                               <input name="username" value="{{old('username')}}" required class="form-control">
                           </div>
                       </div><br>
                       <div class="row">
                           <div class="col-md-2">
                               <label >
                                 Thumbnail
                               </label>
                               <br>
                           </div>
                           <div class="col-md-6">
                               <input name="image" accept="image/*"  type="file" class="form-control btn btn-primary btn-outline">
                           </div>
                       </div><br>
                  <div id="redirectLink">
                      <div class="row" >
                          <div class="col-md-2">
                              <label >
                                  Redirect Link
                              </label>
                              <br>
                          </div>
                          <div class="col-md-6">
                              <small>(open on click Post)</small> <br>
                              <input name="link" value="{{old('link')}}" placeholder="Past link here..." class="form-control">
                          </div>
                      </div>
                  </div>
                       <br>


                       <div class="row">
                           <div class="col-md-2">
                               <label class="text-right" >
                                   Content
                               </label>
                               <br>
                           </div>
                           <div class="col-md-10">
                               <textarea  name="contentdata" class="form-control summernote" style="height:0vh">{{old('contentdata')}}</textarea>


                           </div>
                       </div>
                       <br>
                       <div class="row">
                           <div class="col-md-2">
                               <label class="text-right" >
                                   Long Content
                               </label>
                               <br>
                           </div>
                           <div class="col-md-10">
                               <textarea  name="longdata"  class="form-control summernote" style="height:40vh">{{old('longdata')}}</textarea>


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
setTimeout(function (){
    $("#redirectLink").css("display",'none')
},1000)
    function onCategoryChange()
    {
        $("#redirectLink").css("display",'block')
     var cate=$("#category").val()
        if(cate=='native')
        {
            $("#redirectLink").css("display",'none')
        }
    }
       function addPost()
        {
            alert($('#summernote').code())
        }
        $(document).ready(function(){



        });

    </script>
@endsection
