@extends('layouts.app')

@section('title', 'Tambah Kontak')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card">
            <div class="card-header">Tambah Kontak Baru</div>
            <div class="card-body">

                @if(session('sukses'))
                    <div class="alert alert-success">{{ session('sukses') }}</div>
                @endif

                <form method="POST" action="/kontak">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="pesan" class="form-label">Pesan</label>
                        <textarea name="pesan" id="pesan" class="form-control" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Kontak</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
