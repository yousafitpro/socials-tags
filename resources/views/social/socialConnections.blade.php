@extends('layouts.dashboard')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h3 class="text-center">Social Connections</h3>
            <br>
            <?php
                $connections=\App\Models\socialconnection::where('user_id',auth()->user()->id)->get();
                ?>
            <div class="card">
                <div class="card-body">
                    @foreach($connections as $c)
                        <div class="row">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-6">
                                <label></label>
                            </div>
                            <div class="col-md-3">
                                @if($c->status=="Disconnected")
                                    <button class="btn btn-outline-primary form-control">Connect</button>
                                    @endif
                                    @if($c->status!="Disconnected")
                                        <button class="btn btn-outline-success form-control">Connected</button>
                                    @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
