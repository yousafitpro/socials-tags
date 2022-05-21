@extends('layouts.dashboard')
@section('content')

<style>
    .active{
        background-color: #2a4b79;
    }

</style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2" onclick="{{Route::currentRouteName()== 'ligiscan.billDetail'? 'goBack()' : '' }}" ><a href="#"><button class="form-control btn btn-defualt">Go Back</button></a></div>
            <div class="col-md-2 {{Route::currentRouteName()== 'ligiscan.search'? 'active' : '' }}"><a href="{{ route('ligiscan.search') }}"><button class="form-control btn btn-defualt">Search</button></a></div>
            <div class="col-md-2 {{Route::currentRouteName()== 'ligiscan.moniteredBills'? 'active' : '' }}"><a href="{{route('ligiscan.moniteredBills')}}"  active class='is-active'><button class="form-control btn btn-defualt">Monitered Bills</button></a></div>
            <div class="col-md-2 {{Route::currentRouteName()== 'ligiscan.showStates' || Route::currentRouteName()== 'ligiscan.addState'? 'active' : '' }}"><a href="{{route('ligiscan.showStates')}}"><button class="form-control btn btn-defualt">Regions</button></a></div>
            <div class="col-md-2 {{Route::currentRouteName()== 'ligiscan.search88'? 'active' : '' }}"><a href="#"><button class="form-control btn btn-defualt">Alerts </button></a></div>
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
