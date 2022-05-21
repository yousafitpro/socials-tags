@foreach($officiallist as $l)
    <div class="row leftRow" style='padding-left:5px;padding-top:20px' data-toggle="collapse" data-target="#collapse{{$l['id']}}" aria-expanded="false" >
        <div class="4">
            <img src="{{$l['photo_origin_url']}}" style='height:60px;width:60px'/>
        </div>
        <div class="8" style='padding-left:10px'>
            <div>
               {{Str::limit($l['office']['title'],21)}}
            </div>
            <div style='font-weight:bold;color:var(--official-color)'>
                {{$l['first_name']}} {{$l['last_name']}}
            </div>

                <small>{{$l['office']['representing_country']['name_short']}}</small>
                <a href="#" style="margin-left: 15px">View Details</a>

        </div>
    </div>

    <div class="collapse" id="collapse{{$l['id']}}">
        <br>
        <div class="card card-body">
            <div class="container-fluid">

                @if(count($l['email_addresses'])>0)
                    <label>Email Addresse: </label>
                <div class="row">
                    <div class="col-md-12">

                           @foreach($l['email_addresses'] as $a)

                           <small> {{$a}}</small>
                            @if($loop->index==0)
                                @break
                            @endif
                           @endforeach



                    </div>

                </div>
                @endif
                <br>
                    @if(count($l['addresses'])>0)
                        <label>Address: </label>
                        <div class="row">
                            <div class="col-md-12">

                                @foreach($l['addresses'] as $a)

                                    <small> {{$a['address_1']}}</small>
                                    @if($loop->index==0)
                                        @break
                                    @endif
                                @endforeach



                            </div>

                        </div>
                    @endif
                    <br>

                @if($l['web_form_url'])
                    <label>Web URL </label>
                    <div class="row">
                        <div class="col-md-12">


                               <a href="{{$l['web_form_url']}}" target="_blank"> <small> {{$l['web_form_url']}}</small></a>




                        </div>

                    </div>
                @endif
{{--                <label>Contact Links: </label>--}}
{{--                @if(count($l['identifiers'])>0)--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-12">--}}

{{--                            @foreach($l['identifiers'] as $a)--}}

{{--                    <small> {{$a['identifier_type']}}</small><br>--}}
{{--                                <small>{{$a['identifier_value']}}</small>--}}
{{--<br>--}}
{{--                            @endforeach--}}



{{--                        </div>--}}

{{--                    </div>--}}
{{--                @endif--}}
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        $id=$l['id'];

                        $name=$l['first_name']." ".$l['last_name'];
                        $post=$l['office']['title'];
                        $state=$l['office']['representing_country']['name_short'];
                        $web=$l['web_form_url'];
                        $email="";
                        if(count($l['email_addresses'])>0)
                            {
                                $email=$l['email_addresses'][0];
                            }
                        $address="";
                        if (count($l['addresses'])>0)
                            {

                                $address=$l['addresses'][0]['address_1'];
                            }

                        $image=$l['photo_origin_url'];

                        ?>
                        <button id="btnOsave{{$id}}" onclick="SaveOfficial('{{$id}}','{{$name}}','{{$post}}','{{$state}}','{{$web}}','{{$email}}','{{$address}}','{{$image}}')" style="width: 100%" class=" btn btn-primary">Save Official</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endforeach
@if(count($officiallist)<=0)
    <br>
    <h4 style="text-align: center">No results found</h4>
    @endif

<script>

    initMap('{{$lat}}','{{$lng}}')

</script>
