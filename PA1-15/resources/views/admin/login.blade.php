    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>AgroMaju Admin</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="{{ url('admin/vendors/feather/feather.css') }}">
        <link rel="stylesheet" href="{{ url('admin/vendors/ti-icons/css/themify-icons.css') }}">
        <link rel="stylesheet" href="{{ url('admin/vendors/css/vendor.bundle.base.css') }}">
        <!-- endinject -->
        <!-- Plugin css     for this page -->
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="{{ url('admin/css/vertical-layout-light/style.css') }}">
        <!-- endinject -->
        <link rel="shortcut icon" href="{{ url('admin/images/favicon.png') }}" />
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

        h2 {
            overflow: hidden;
            animation: typing 0.5s steps(10, end) 0.5s 0.5 normal both;
        }

        h2 {
            overflow: hidden;
            /* Membuat garis separator di sebelah kanan tulisan */
            white-space: nowrap;
            /* Membuat tulisan tidak pindah baris */
            margin: 0 auto;
            /* Membuat tulisan berada di tengah-tengah */
            letter-spacing: 0.15em;
            /* Menambahkan jarak antar huruf */
            animation: typing-loop 2s steps(30, end) 1s 1 normal;
        }

        @keyframes typing-loop {
            from {
                width: 0;
            }

            to {
                width: 100%;
            }
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
                                    <h2 class="text-success" style="font-family: verdana"; align="center">AGROMAJU</h2>
                                </div>
                                @if (Session::has('error_message'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ Session::get('error_message') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                @if ($errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                <form class="pt-3" action="{{ url('admin/login') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="email" id="email"
                                            class="form-control form-control-lg" id="exampleInputEmail1"
                                            placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="password"
                                            class="form-control form-control-lg" id="exampleInputPassword1"
                                            placeholder="Password">
                                    </div>
                                    <div class="mt-3">
                                        <button type="submit"
                                            class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                                            Sign In
                                        </button>
                                    </div>
                                    <div class="my-2 d-flex justify-content-between align-items-center">
                                        <div class="form-check">
                                            <label class="form-check-label text-muted">
                                                <input type="checkbox" class="form-check-input">
                                                Ingatkan Saya
                                            </label>
                                        </div>
                                        <a href="#" class="auth-link text-black">Lupa password?</a>
                                    </div>
                                    <div class="text-center mt-4 font-weight-light">
                                        Tidak Punya Akun? <a href="{{ url('/register') }}"
                                            class="text-primary">Daftar</a>
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
        <script src="{{ url('admin/vendors/js/vendor.bundle.base.js') }}"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="{{ url('admin/js/off-canvas.js') }}"></script>
        <script src="{{ url('admin/js/hoverable-collapse.js') }}"></script>
        <script src="{{ url('admin/js/template.js') }}"></script>
        <script src="{{ url('admin/js/settings.js') }}"></script>
        <script src="{{ url('admin/js/todolist.js') }}"></script>
        <!-- endinject -->
    </body>

    </html>
