@extends('circle-layout.layout')
@section('content')
    <div class="modal fade" id="AddNote" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add new Note</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label>Title</label>
                    <input class="form-control" name="title">
                    <br>
                    <label>Details</label>
                    <textarea name="details" class="form-control" style="height: 200px"></textarea>
                    <br>
                    <label>Time</label>
                    <input class="form-control" name="time" type="datetime-local">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary"><i data-feather="plus"></i> Add</button>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-body">
    <button class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#AddNote" >
        <i data-feather="plus"></i> Add New
    </button>
    <br>
    <h5 class="card-title">All Notes</h5>
    <div class="transactions-list">
        <div class="tr-item">
            <div class="tr-company-name">
                <div class="tr-icon tr-card-icon tr-card-bg-primary text-primary">
                    <i data-feather="bell"></i>
                </div>
                <div class="tr-text">
                    <h4>Meting With Goreg</h4>
                    <p>In this meeting in need to discuss all realated issues about the system and the enhencements </p>
                </div>

            </div>
            <div class="dropdown pull-right">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                   Actions
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="#">Mark as read</a></li>
                    <li><a class="dropdown-item" href="#">Delete</a></li>

                </ul>
            </div>
        </div>
    </div>


</div>
@endsection
