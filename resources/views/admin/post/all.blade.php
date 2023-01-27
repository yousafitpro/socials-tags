@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3>All Posts</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('admin.post.add')}}">  <button class="btn btn-primary float-right"> Add New</button></a>
                </div>
            </div>
            <br>
    <div class="table-responsive">
        <table class="table  table-bordered table-hover dataTables-example" >
            <thead>
            <tr>
                <th>Thumb Nail</th>
                @if(auth()->user()->hasRole('admin'))
                <th>Posted By</th>
                @endif
                <th>Title</th>
                <th>Status</th>
                <th>Clicks</th>
                <th>Views</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>

            @foreach($posts as $post)
            <tr class="center">

                <td class="myflex">
                    @if($post->image)
                    <img src="{{asset($post->image)}}" style="width: 50px;">
                        @endif
                </td>
                @if(auth()->user()->hasRole('admin'))

                    <td>

                        {{$post->user?$post->user->fname.' '.$post->user->lname:''}}
                    </td>
                @endif
                <td>{{Str::substr($post->content,0,50)}}</td>

                <td>{{$post->status}}</td>
                <td>{{$post->clicks}}</td>
                <td>{{$post->views}}</td>

                <td width="50px">
                    <div class="dropdown dropdown-menu-bottom">
                        <i class="fa fa-cogs" data-toggle="dropdown"></i>

                        <ul class="dropdown-menu">
{{--                            <li><a href="#" data-toggle="modal" data-target="#deleteModel">Delete</a></li>--}}
                            <li><a href="{{route('admin.post.getOne',$post->id)}}">Edit/View</a></li>
                            @if(auth()->user()->hasRole('admin'))
                                @if($post->status=='Pending')
                            <li><a href="{{url('Dashboard/Approve',$post->id)}}">Approve</a></li>
                                @endif
                                    @if($post->status=='Approved')
                            <li><a href="{{url('Dashboard/Pause',$post->id)}}">Pause</a></li>
                                    @endif
                                    @if($post->status=='Paused')
                            <li><a href="{{url('Dashboard/Resume',$post->id)}}">Resume</a></li>
                                    @endif
                                    @if($post->status=='Pending')
                            <li><a href="{{url('Dashboard/Reject',$post->id)}}">Reject</a></li>
                                        @endif
                            @endif
                            <li><a href="#" onclick="deletePost('{{route('admin.post.deleteOne',$post->id)}}')">Delete</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
{{--            Delete Moel--}}
            <div class="modal fade" id="deleteModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Alert</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                           <h3>Are you want to Delete this ?</h3>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                           <a href="{{route('admin.post.deleteOne',$post->id)}}"> <button type="button" class="btn btn-primary">Yes</button></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            </tbody>

        </table>
    </div>
    <script>
        function deletePost(url)
        {
            swal({
                title: "Confirmation!",
                text: "Are you want to delete this post permanently ?",
                icon: "warning",
                buttons: ["No", "Yes"],
                dangerMode: true,
            })
                .then((res) => {
                    if (res) {

                        window.location.href=url
                    } else {

                    }
                });
        }


    </script>

        </div>
    </div>
@endsection
