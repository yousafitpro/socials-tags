@extends('layouts.ligiscan')
@section('sub1content')
<style>
    .subtext {
        font-size: 12px;
    }
    .classTD{
        width: 30vw;

    }
    .tab-pane{
        background: transparent;
        width: 100%;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <nav>
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist" style="width: 100%">
                    <a class="nav-item nav-link active" id="nav-summary-tab" href="#nav-summary" data-toggle="tab"  role="tab"  >Summary</a>
                    <a class="nav-item nav-link" id="nav-sponsors-tab" href="#nav-sponsors" data-toggle="tab"  role="tab" >Sponsors</a>
                    <a class="nav-item nav-link" id="nav-texts-tab" href="#nav-texts" data-toggle="tab"  role="tab" >Texts</a>
                    <a class="nav-item nav-link" id="nav-votes-tab" href="#nav-votes" data-toggle="tab"  role="tab" >Votes</a>
                    <a class="nav-item nav-link" id="nav-supplements-tab" href="#nav-supplements" data-toggle="tab"  role="tab" >Supplements</a>
                    <a class="nav-item nav-link" id="nav-amendments-tab" href="#nav-amendments" data-toggle="tab"  role="tab" >Amendments</a>
                    <a class="nav-item nav-link" id="nav-subjects-tab" href="#nav-subjects" data-toggle="tab"  role="tab" >Subjects</a>
                    <a class="nav-item nav-link" id="nav-history-tab" href="#nav-history" data-toggle="tab"  role="tab" >History</a>
                </div>
            </nav>
            <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                <div class="tab-pane fade show active" style="background: transparent" id="nav-summary" role="tabpanel" >
                    @include('admin.Ligiscan.inc.titleandDes')
                    @include('admin.Ligiscan.inc.sponsors',['tabID'=>'1'])
                    @include('admin.Ligiscan.inc.votes')
                    @include('admin.Ligiscan.inc.history')
                    @include('admin.Ligiscan.inc.subjects')
                    @include('admin.Ligiscan.inc.ammendments')
                    @include('admin.Ligiscan.inc.supplements')
                </div>
                <div class="tab-pane fade  " id="nav-sponsors" role="tabpanel" >
                    @include('admin.Ligiscan.inc.sponsors',['tabID'=>'2'])
                </div>

                <div class="tab-pane fade" id="nav-votes" role="tabpanel" >
                    @include('admin.Ligiscan.inc.votes')
                </div>
                <div class="tab-pane fade" id="nav-texts" role="tabpanel" >
                    @include('admin.Ligiscan.inc.texts')
                </div>
                <div class="tab-pane fade" id="nav-supplements" role="tabpanel" >
                    @include('admin.Ligiscan.inc.supplements')
                </div>
                <div class="tab-pane fade" id="nav-amendments" role="tabpanel" >
                    @include('admin.Ligiscan.inc.ammendments')
                </div>
                <div class="tab-pane fade" id="nav-subjects" role="tabpanel" >
                    @include('admin.Ligiscan.inc.subjects')
                </div>
                <div class="tab-pane fade" id="nav-history" role="tabpanel" >
                    @include('admin.Ligiscan.inc.history')
                </div>


            </div>

        </div>
    </div>
</div>
</div>
</div>







@endsection
