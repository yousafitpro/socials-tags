@extends('layouts.ligiscan')
@section('sub1content')
    <form action="{{route('ligiscan.addState')}}" method="post">
@csrf
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 offset-3">
                    <div class="card">
                        <div class="card-header">
Add New Region
                        </div>
                        <div class="card-body">
                    <input class="form-control" required name="state_abbr" placeholder="abbr"><br>
                    <input class="form-control" required name="state_name" placeholder="Name"><br>

                            <button class="form-control btn btn-primary">Add</button><br>
                            <small>Warning! The following 45 states in your subscription are not included in general regions: AL, AK, AZ, AR, CA, CO, CT, DE, FL, GA, HI, ID, IL, IN, IA, KY, LA, MD, MA, MN, MS, MT, NE, NH, NJ, NY, NC, OH, OK, OR, PA, RI, SC, SD, TN, TX, UT, VT, VA, WA, WV, WI, WY, DC, US</small>

                        </div>

            </div>


        </div>
    </div>
</div>
    </form>
@endsection
