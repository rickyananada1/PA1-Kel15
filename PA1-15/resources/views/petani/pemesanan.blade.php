@extends('petani.layout.layout')
@section('title')
    Pemesanan Pupuk
@endsection
@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success: </strong> {{ Session::get('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <form action="{{ route('pemesanan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nama Pupuk</label>
            <select class="form-control" name="pupuk_id" id="nama_pupuk" required>
                <option value="">--Pilih Nama Pupuk--</option>
                @forelse ($pupuk as $item)
                    <option value="{{ $item->id }}" data-jenis="{{ $item->jenis }}">{{ $item->nama }}</option>
                @empty
                    <option value="">Tidak Ada Data</option>
                @endforelse
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Jenis Pupuk</label>
            <select class="form-control" name="jenis_pupuk" id="jenis_pupuk" disabled required>
                <option value="">--Pilih Jenis Pupuk--</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Stok</label>
            <input type="number" class="form-control" name="stok" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tanggal Pemesanan</label>
            <input type="date" class="form-control" name="tanggal" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <script>
        const namaPupukSelect = document.getElementById('nama_pupuk');
        const jenisPupukSelect = document.getElementById('jenis_pupuk');

        namaPupukSelect.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const jenisPupuk = selectedOption.getAttribute('data-jenis');

            if (jenisPupuk) {
                jenisPupukSelect.innerHTML = `<option value="${jenisPupuk}">${jenisPupuk}</option>`;
                jenisPupukSelect.disabled = false;
            } else {
                jenisPupukSelect.innerHTML = '<option value="">--Pilih Jenis Pupuk--</option>';
                jenisPupukSelect.disabled = true;
            }
        });
    </script>
@endsection
