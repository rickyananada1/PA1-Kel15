@extends('petani.layout.layout')
@section('content')
    <div class="container">
        <form action="{{ route('delete-account') }}" method="POST">
            @csrf
            @method('DELETE')
            <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%"
                data-bs-smooth-scroll="true" class="scrollspy-example bg-body-tertiary p-3 rounded-2" tabindex="0">
                <h4 id="scrollspyHeading1">Apakah Anda Bersedia Untuk menghapus Akun Anda Beserta data-data Anda? <br> Jika
                    Ya, Silahkan Tekan Tombol dibawah ini</h4>
                <button type="submit" class="btn btn-danger btn-sm">Hapus Akun</button>
            </div>
        </form>
    </div>
@endsection
