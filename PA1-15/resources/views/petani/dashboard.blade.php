@extends('petani.layout.layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Welcome {{ Auth::guard('petani')->user()->nama }}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 grid-margin transparent">
                    <div class="row">
                        <div class="col-md-6 mb-4 stretch-card transparent">
                            <div class="card card-tale">
                                <div class="card-body">
                                    <p class="mb-4">List Order</p>
                                    <p class="fs-30 mb-2">1</p>
                                    <a href="#" class="text-white">Read More >></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4 stretch-card transparent">
                            <div class="card card-dark-blue">
                                <div class="card-body">
                                    <p class="mb-4">List Kategori</p>
                                    <p class="fs-30 mb-2">1</p>
                                    <a href="#" class="text-white">Read More >></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                            <div class="card card-light-blue">
                                <div class="card-body">
                                    <p class="mb-4">List Hasil Tani</p>
                                    <p class="fs-30 mb-2">1</p>
                                    <a href="#" class="text-white">Read More >></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        @include('petani.layout.footer')
        <!-- partial -->
    </div>
@endsection
