@if(count($bill['subjects'])>0)
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h3>Subjects</h3>
                    @foreach($bill['subjects'] as $item)
                        <small class="subtext">{{$item['subject_name']}}</small><br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <br>
@endif
