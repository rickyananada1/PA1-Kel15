<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>AgroMaju Petani</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ url('petani/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ url('petani/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ url('petani/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css     for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ url('petani/css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ url('petani/images/favicon.png') }}" />
</head>
<style>
    .auth-form-light {
        background-color: rgba(255, 255, 255, 0.8);
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
    }

    .brand-logo h2 {
        color: #28a745;
        font-size: 40px;
        font-weight: bold;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
    }

    .form-control {
        border-radius: 10px;
        border-color: #28a745;
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #28a745;
    }

    .auth-form-btn {
        background-color: #28a745;
        border-color: #28a745;
        border-radius: 10px;
        font-weight: bold;
        transition: all 0.3s ease;
    }

    .auth-form-btn:hover {
        background-color: #218838;
        border-color: #218838;
    }

    .auth-link {
        color: #28a745;
        font-weight: bold;
    }
</style>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <h2 class="text-center" style="font-family: verdana;">
                                    <a href="/" class="text-success" style="text-decoration: none">Lupa
                                        Password</a>
                                </h2>
                            </div>
                            @if (Session::has('success_message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Success: </strong> {{ Session::get('success_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <form class="pt-3" action="{{ url('petani/login') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="email" name="email" id="email"
                                        class="form-control form-control-lg" id="exampleInputEmail1"
                                        placeholder="Masukkan Email">
                                </div>
                                <button type="submit"
                                    class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                                    Submit
                                </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ url('petani/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ url('petani/js/off-canvas.js') }}"></script>
    <script src="{{ url('petani/js/hoverable-collapse.js') }}"></script>
    <script src="{{ url('petani/js/template.js') }}"></script>
    <script src="{{ url('petani/js/settings.js') }}"></script>
    <script src="{{ url('petani/js/todolist.js') }}"></script>
    <!-- endinject -->
</body>

</html>
