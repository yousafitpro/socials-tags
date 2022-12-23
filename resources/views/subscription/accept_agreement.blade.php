@extends('layout.master')
@section('title',"Agreement")
@section('content')
    <div class="box">


        <br>

        <div class="row">
            <div class="col-md-6 offset-md-3 text-center">
                <h3>Agreement</h3>
            </div>
        </div>
<br>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h4>Please read carefully our <a href="https://zpayd.com/terms-and-conditions/" target="_blank" style="color: lightseagreen">Terms & Conditions</a> and
                <a href="https://zpayd.com/privacy-policy/" target="_blank" style="color: lightseagreen">Privacy Policy</a>
               and click on Accept Button</h4>

        </div>
    </div>
        <br>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <a href="{{route('security.acceptAgreementNow')}}"><button class="btn btn-primary btn-block">Agree</button></a>
            </div>
        </div>

        <br>

        <br>
    </div>

@stop
@section('js')

@endsection
