@extends('circle-layout.layout')
@section('content')

    <div class="card card-body">
    <button class="btn btn-primary"  >
         Settings
    </button>
    <br>
    <h5 class="card-title">All Settings</h5>
    <div class="transactions-list">
        <div class="tr-item">
            <div class="tr-company-name">
                <div class="tr-icon tr-card-icon tr-card-bg-primary text-primary">
                    <i data-feather="bell"></i>
                </div>
                <div class="tr-text">
                    <h4>General Notifications</h4>
                    <p>On 'Yes' you will be able to receive all notifications on your registered email </p>
                </div>

            </div>
            <div class="form-check form-switch" style="zoom: 1.4">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked="false">
            </div>
        </div><hr>
        <div class="tr-item">
            <div class="tr-company-name">
                <div class="tr-icon tr-card-icon tr-card-bg-primary text-primary">
                    <i data-feather="bell"></i>
                </div>
                <div class="tr-text">
                    <h4>Customer feedback on Email</h4>
                    <p>On 'Yes' you will be able to receive customer feedback on you email  </p>
                </div>

            </div>
            <div class="form-check form-switch" style="zoom: 1.4">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" >
            </div>
        </div><hr>
        <div class="tr-item">
            <div class="tr-company-name">
                <div class="tr-icon tr-card-icon tr-card-bg-primary text-primary">
                    <i data-feather="bell"></i>
                </div>
                <div class="tr-text">
                    <h4>Post comments</h4>
                    <p>On 'Yes' you will be able to receive posts comments on your registered email </p>
                </div>

            </div>
            <div class="form-check form-switch" style="zoom: 1.4">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked="">
            </div>
        </div><hr>
        <div class="tr-item">
            <div class="tr-company-name">
                <div class="tr-icon tr-card-icon tr-card-bg-primary text-primary">
                    <i data-feather="bell"></i>
                </div>
                <div class="tr-text">
                    <h4>Social Profile update</h4>
                    <p>On 'Yes' you will be able to receive social profiles updates on your registered email </p>
                </div>

            </div>
            <div class="form-check form-switch" style="zoom: 1.4">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked="">
            </div>
        </div><hr>
        <div class="tr-item">
            <div class="tr-company-name">
                <div class="tr-icon tr-card-icon tr-card-bg-primary text-primary">
                    <i data-feather="bell"></i>
                </div>
                <div class="tr-text">
                    <h4>Messages</h4>
                    <p>On 'Yes' you will able to receive all social profile messages on your registered email </p>
                </div>

            </div>
            <div class="form-check form-switch" style="zoom: 1.4">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked="">
            </div>
        </div><hr>
        <div class="tr-item">
            <div class="tr-company-name">
                <div class="tr-icon tr-card-icon tr-card-bg-primary text-primary">
                    <i data-feather="bell"></i>
                </div>
                <div class="tr-text">
                    <h4>Google meet events</h4>
                    <p>On 'Yes' you will be able to receive all google meet events on your registered email </p>
                </div>

            </div>
            <div class="form-check form-switch" style="zoom: 1.4">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked="">
            </div>
        </div>
    </div>


</div>
@endsection
