@extends('layouts.officcial')
@section('sub1content')
<style>
    .brandTitle{
        font-weight: bold;
        font-size: 20px;
        color: var(--official-color);
    }
    .leftSide{

    }
    .rightSide{

    }
    .leftTopBar{

        background-color:#2a4b79 ;
        padding: 15px;
        color: white;

    }
    .inputBar{
        border:solid 2px #2a4b79;
        text-align: center;
        border-radius: 5px;
    }
    .leftRow{
        cursor:pointer;
    }
    .inputBottom{
        width: 100%;
        max-height: 300px;

        position: relative;
        z-index: 1;
        overflow: auto;
    }
    #map {
        height: 100%;
    }
</style>
<script>
    let map;
     var initLat=40.000000
    var initLng=-89.000000
    function initMap(lat=initLat,lng=initLng) {
        var myLatlng = new google.maps.LatLng(lat,lng);
        var mapOptions = {
            zoom: 4,
            center: myLatlng
        }
        map = new google.maps.Map(document.getElementById("map"), mapOptions);

        var marker = new google.maps.Marker({
            position: myLatlng,
            title:"Hello World!"
        });

// To add the marker to the map, call setMap();
        marker.setMap(map);
// loadOfficials(lat,lng)
    }
    setTimeout(function (){

        loadOfficials(initLat,initLng)
    },1000)
</script>
    <div class="container-fluid"  >
        <form method="post" action="{{route('official.search')}}">
            @csrf
            <div class="row" style='height:20px; padding: 0px; margin: 0px'>
                <div class="col-md-4" style=" padding: 0px; margin: 0px" >
                    <label class="brandTitle">
                        Elected Officials & Districts
                    </label>
                </div>
                <div class="col-md-8" style=" padding: 0px; margin: 0px">
                    <input onkeyup="LoadLocations()" onclick="inputFocusIn()" onblur="inputFocusOut()" autocomplete="off" id="searchInput" class="form-control inputBar searchInput" name="keywords" placeholder="Enter keywords here..."/>
                                    <div class="inputBottom card" style="display: none">
                                        <br>
                                      <div class="container-fluid" id="searchLocContainer">

                                      </div>
                                    </div>
                </div>

            </div>
        </form>
        <br/>
        <br/>
        <br/>
        <div class="row" >
            <div class="col-md-4" >

                <div class="leftTopBar">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4"><a href="#" style='color:white'>All Officials</a></div>
{{--                            <div class="col-md-4"><a href="#" style='color:white'>State</a></div>--}}
{{--                            <div class="col-md-4"><a href="#" style='color:white'>National</a></div>--}}
                        </div>
                    </div>
                </div>
                <div style='background-color:white;height:60vh;overflow:auto'>
                    <div class="container-fluid" id="officialsContainer">





                    </div>

                </div>
            </div>
            <div class="col-md-8">
                <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

                <div id="map"></div>
            </div>
        </div>

    </div>
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQS3W-GRJu-gB6I-rSh0Z4ANIJ8YGnEwo&callback=initMap&v=weekly"
    async
></script>
<script>
    var searchInter=null;
    function inputFocusOut()
    {
       setTimeout(function (){
           $(".inputBottom").css('display','none')
       },1000)
    }
    function inputFocusIn()
    {
        $(".inputBottom").css('display','block')
    }
    function LoadLocations()
    {
        if(searchInter!=null)
        {
            clearTimeout(searchInter)
        }
        searchInter=setTimeout(function (){
            var si=$("#searchInput").val()

            if (si.length<=0)
            {
                $(".inputBottom").css('display','none')
                $("#searchLocContainer").empty()

            }
            else
            {
                $("#searchLocContainer").empty()
                $("#searchLocContainer").html('<h4 style="text-align: center">Loading...</h4>')

                $(".inputBottom").css('display','block')
                $.ajax({
                    type: 'get',
                    url: "{{route('official.loadlocations')}}",
                    data: {searchText: si, "_token": "{{ csrf_token() }}"},
                    success: function (data) {
                        console.log(data)
                        $("#searchLocContainer").empty()
                        $("#searchLocContainer").html(data)
                    }
                });
            }
        },2000)
// Messaging Code 

    }
    function loadOfficials(lat,lng){
        $("#officialsContainer").empty()
        $("#officialsContainer").html('<h4 style="text-align: center">Loading...</h4>')
        $.ajax({
            type: 'get',
            url: "{{route('official.loadOfficials')}}",
            data: {"_token": "{{ csrf_token() }}",lat:lat,lng:lng},
            success: function (data) {
                console.log(data)
                $("#officialsContainer").empty()
                $("#officialsContainer").html(data)
            }
        });
    }


  function  SaveOfficial(id,name,post,state,web,email,address,image)
    {


        if($("#btnOsave"+id).text()=='Save Official')
        {
            $.ajax({
                type: 'post',
                url: "{{route('official.saveOfficial')}}",
                data: {"_token": "{{ csrf_token() }}",id:id,name:name,post:post,state:state,web:web,email:email,address:address,image:image},
                success: function (data) {
                    console.log(data)
                    $("#btnOsave"+id).text('Official Saved')
                }
            });

        }

    }
</script>
@endsection
