@if(count($bill['texts'])>0)
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h3>Texts</h3>

                    <table class="table table-striped table-responsive">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Type</th>

                            <th>Download</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bill['texts'] as $h)
                            <tr>
                                <td>{{$h['date']}}</td>
                                <td><a href="{{$h['url']}}">{{$h['type']}}</a></td>

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
