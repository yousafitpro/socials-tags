
@if(count($bill['supplements'])>0)
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h3>Supplements</h3>

                    <table class="table table-striped table-responsive">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Download</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($bill['supplements'] as $h)
                            <tr >
                                <td class="classTD" >{{$h['date']}}</td>
                                <td class="classTD"><a href="{{$h['url']}}">{{$h['title']}}</a></td>
                                <td class="classTD">{{$h['description']}}</td>
                                <td class="classTD"><a href="{{$h['state_link']}}" target="_blank">PDF</a></td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endif
