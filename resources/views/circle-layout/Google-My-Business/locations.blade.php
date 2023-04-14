<div class="row">
    <div class="col">


                <table id="zero-conf" class="display" style="width:100%">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Title</th>

                        <th>Actions</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($locations as $l)

                        <tr>
                            <td>{{$l['name']}}</td>
                            <td>{{$l['title']}}</td>

                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" onclick="get_locations('{{$loop->index}}','pageListModel{{$loop->index}}','{{url('My-Google/Get-Locations')}}?account_name=')" href="#">Locations</a></li>


                                    </ul>
                                </div>
                            </td>

                        </tr>
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
