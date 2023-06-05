@extends('petani.layout.layout')
@section('title')
    Update Password
@endsection
@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="row">
                <div class="col grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-description">
                                Update Password
                            </p>
                            @if (Session::has('error_message'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Error: </strong> {{ Session::get('error_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if (Session::has('success_message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong></strong> {{ Session::get('success_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <form class="forms-sample" action="{{ url('petani/update-petani-password') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" value="{{ $petaniDetails['email'] }}" readonly="">
                                </div>
                                <div class="form-group">
                                    <label for="current_password">Current Password</label>
                                    <input type="password" class="form-control" id="current_password"
                                        placeholder="Enter Current Password" name="current_password">
                                    <span id="check_password"></span>
                                </div>
                                @error('current_password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="new_password">New Password</label>
                                    <input type="password" class="form-control" id="new_password"
                                        placeholder="Enter New Password" name="new_password">
                                </div>
                                @error('new_password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="confirm_password">Confirm Password</label>
                                    <input type="password" class="form-control" id="confirm_password"
                                        placeholder="Confirm Password" name="confirm_password">
                                </div>
                                @error('confirm_password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
