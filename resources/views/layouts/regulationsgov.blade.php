@extends('layouts.dashboard')
@section('content')

<style>
    .active{
        background-color: #2a4b79;
    }

</style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-2"></div>
            <div class="col-md-2 {{Route::currentRouteName()== 'regulationsgov.search'? 'active' : '' }}"><a href="{{ route('regulationsgov.search') }}"><button class="form-control btn btn-defualt">Search</button></a></div>
{{--            <div class="col-md-2 {{Route::currentRouteName()== 'ligiscan.showStates' || Route::currentRouteName()== 'ligiscan.addState'? 'active' : '' }}"><a href="{{route('ligiscan.showStates')}}"><button class="form-control btn btn-defualt">officials</button></a></div>--}}
            <div class="col-md-2"></div>
            <div class="col-md-2"></div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <hr/>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
               @yield('sub1content')
            </div>
        </div>
    </div>


@endsection
