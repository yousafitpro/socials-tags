@if(count($bill['history'])>0)
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h3>History</h3>

                    <table class="table table-striped table-responsive">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Chamber</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bill['history'] as $h)
                            <tr>
                                <td>{{$h['date']}}</td>
                                <td>{{$h['chamber']}}</td>
                                <td>{{$h['action']}}</td>
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
