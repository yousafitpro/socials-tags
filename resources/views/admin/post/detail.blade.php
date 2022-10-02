
    @extends('layouts.app')


    @section('content')

           <div style="height:{{!request('top_nave',false)?'90vh':'100vh'}}; overflow: auto">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 offset-3">
                    <div class="card shadow wallPostCard" >

                        <div class="row">
                            <div class="col-md-12">
                                <img src="{{asset($post->image)}}" style="width: 100%; max-height:40vh " class="wallPostModalImage">
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="p-2">
                                    @include('iframe.postBottom',['type'=>$post->type,'username'=>$post->username,'p'=>$post,'category'=>$post])
                                </div>
                            </div>
                        </div>
                        <div style="padding: 10px">
                            <div class="row">
                                <div class="col-md-12">
                                    {!! $post->longcontent !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
           </div>
    @endsection

