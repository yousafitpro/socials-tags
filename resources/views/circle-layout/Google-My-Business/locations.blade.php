<div class="row">
    <div class="col">


                <table id="zero-conf2" class="display" style="width:100%">
                    <thead>
                    <tr>

                        <th>Title</th>

                        <th>Actions</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($locations as $l)

                        <tr>

                            <td>{{$l['title']}}</td>

                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item"href="{{url('My-Google/Location/Reviews').'?name='.$l['name']}}">Locations</a></li>


                                    </ul>
                                </div>
                            </td>

                        </tr>
                    @endforeach

                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Title</th>

                        <th>Actions</th>
                    </tr>
                    </tfoot>
                </table>

    </div>
</div>
<br>
<br>
