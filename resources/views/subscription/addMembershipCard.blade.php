@extends('layout.master')
@section('title',"Membership")
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border text-center">
                    @include("components.panelBackbutton",['backUrl'=>url('dashboard')])
                    <h4 class="box-title text-capitalize">Membership</h4>
                    {{--                    <a href="{{route('transaction.history')}}" class="pull-right">Transfer Logs</a>--}}
                </div>
                <div class="box-body">

                    <form class="form-horizontal form-element" id="card_form"
                          action="{{route('fund.add')}}" method="post"
                    >
                        @csrf

                        <div class="row">
                            <div class="offset-sm-3 col-sm-6">

                                <div class="form-group row">
                                    <label class="col-sm-3 control-label">Amount</label>
                                    <div class="col-sm-9">
                                        <input type="number"
                                               required
                                               class="form-control" name="amount" id="amount"
                                               min="1"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="offset-sm-3 col-sm-6">

                                <div class="form-group row">
                                    <label class="col-sm-3 control-label">Cards</label>
                                    <div class="col-sm-9">
                                        <select name="card_id" id="card_id" class="form-control">
                                            @foreach(my_credits() as $c)
                                                <option value="{{$c->id}}">{{$c->bank_name}} ({{$c->title}})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="offset-sm-3 col-sm-6" style="text-align: center">
                                <small >
                                    *Please note, payment updates using cards might take up to 24 hours to reflect on your account.

                                </small>

                            </div>
                        </div>
                        <br>
                        <div class="text-center">
                            <a  onclick="addFunds()" class="btn btn-primary " style="color: white">
                                Submit
                            </a>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
@stop
@section('js')

@endsection
