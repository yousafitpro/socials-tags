@extends('circle-layout.layout')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">All Posts</h5>
                    <a href="{{url('My-Dashboard/publish-post')}}" class="btn btn-primary" type="button"  style="zoom: 0.8; float: right"  >
                        <i data-feather="plus"></i> Add New
                    </a>
<br>
<br>
<br>
<br>
<br>
<br>
                    <table id="zero-conf" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th>Title </th>
<th>Description</th>
                            <th>Platforms</th>
                            <th>date</th>
                            <th>Actions</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $p)
                        <tr>
                            <td>{{$p->title}}</td>
                            <td>{!! $p->post_content !!}</td>
                            <td style="min-width: 200px">
                                @if($p->facebook_post_id)


                                          <a href="{{url('Facebook/Post-Detail',app_encrypt($p->id))}}">
                                              <button class="btn btn-primary"  type="button"  >
                                                  <i data-feather="facebook"></i>
                                              </button>
                                          </a>
                                @endif
                                    @if($p->insta_id)


                                        <a href="{{url('Instagram/Post-Detail',app_encrypt($p->id))}}">
                                            <button class="btn btn-primary"  type="button"  >
                                                <i data-feather="instagram"></i>
                                            </button>
                                        </a>
                                    @endif
                                    @if($p->twitter_post_id)
                                <button class="btn btn-primary" type="button"  style="zoom: 0.8; margin-top: 5px"  >
                                    <i data-feather="twitter"></i>
                                </button>
                                        @endif
                            </td>
                            <td>{{$p->created_at}}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">

                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
{{--                                        <li><a class="dropdown-item" href="#">Edit /  View</a></li>--}}
                                        <li><a class="dropdown-item" href="#">Hide</a></li>


                                    </ul>
                                </div>
                            </td>

                        </tr>
                       @endforeach

                        </tbody>

                    </table>
                    <br>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <script>
       function loadComments(id,post_id)
       {
            $("#commentBox"+id).modal('show')
           $("#PageDiv"+id).empty()
           $("#PageDiv"+id).append('<br><h4 style="text-align: center">Loading...</h4><br>')
           $.ajax({
               url:"{{url('Facebook/Comments')}}/"+post_id,
               method:'get',
               data: {"_token": "{{ csrf_token() }}"},
               beforeSend:function(){
                  // $(".products__btn").text("Loading...")
               },
               success:function(response){
                   $("#PageDiv"+id).empty()

                   $("#PageDiv"+id).append(response)

               },
               error: function (jqXHR, textStatus, errorThrown) {


               },
               complete:function(data){
                //   $(".products__btn").text("Load More")
               }
           })
       }

       function loadLikes(id,post_id)
       {
           $("#commentBox"+id).modal('show')
           $("#PageDiv"+id).empty()
           $("#PageDiv"+id).append('<br><h4 style="text-align: center">Loading...</h4><br>')
           $.ajax({
               url:"{{url('Facebook/Likes')}}/"+post_id,
               method:'get',
               data: {"_token": "{{ csrf_token() }}"},
               beforeSend:function(){
                   // $(".products__btn").text("Loading...")
               },
               success:function(response){
                   $("#PageDiv"+id).empty()

                   $("#PageDiv"+id).append(response)

               },
               error: function (jqXHR, textStatus, errorThrown) {


               },
               complete:function(data){
                   //   $(".products__btn").text("Load More")
               }
           })
       }
    </script>
@endsection
