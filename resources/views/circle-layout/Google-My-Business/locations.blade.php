<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Locations</h5>

                <table id="zero-conf" class="display" style="width:100%">
                    <thead>
                    <tr>
                        <th>Account Name</th>
                        <th>Type</th>
                        <th>Verification State</th>
                        <th>Vetted State</th>
                        <th>Actions</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($locations as $l)

{{--                        <tr>--}}
{{--                            <td>{{$a['accountName']}}</td>--}}
{{--                            <td>{{$a['type']}}</td>--}}
{{--                            <td>{{$a['verificationState']}}</td>--}}
{{--                            <td>{{$a['vettedState']}}</td>--}}
{{--                            <td>--}}
{{--                                <div class="dropdown">--}}
{{--                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                    </button>--}}
{{--                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}
{{--                                        <li><a class="dropdown-item" onclick="get_locations('{{$loop->index}}','pageListModel{{$loop->index}}','{{url('My-Google/Get-Locations')}}?account_name={{$a['name']}}')" href="#">Locations</a></li>--}}


{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </td>--}}

{{--                        </tr>--}}
                    @endforeach

                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Email / Phone</th>
                        <th>Platform</th>
                        <th>date</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
