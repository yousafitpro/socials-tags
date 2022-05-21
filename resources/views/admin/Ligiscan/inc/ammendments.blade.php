@if(count($bill['amendments'])>0)
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h3>Amendments</h3>

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
                        @foreach($bill['amendments'] as $h)
                            <tr>
                                <td>{{$h['date']}}</td>
                                <td><a href="{{$h['url']}}">{{$h['title']}}</a></td>
                                <td>{{$h['description']}}</td>
                                <td><a href="{{$h['state_link']}}" target="_blank">PDF</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <br>
@endif
