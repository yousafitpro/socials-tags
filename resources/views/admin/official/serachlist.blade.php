@if(count($list)==0)
    <div class="row" style="cursor: pointer">
        <div class="col-md-12">
            <h3 style="text-align: center">No results fond</h3>
            <hr>
        </div>
    </div>
@endif
@foreach($list as $l)
    <div class="row" style="cursor: pointer" onclick="loadOfficials('{{$l['geometry']['location']['lat']}}','{{$l['geometry']['location']['lng']}}')">
        <div class="col-md-12">
            <a href="#"><h4>{{$l['formatted_address']}} </h4></a>
            <hr>
        </div>
    </div>
@endforeach

