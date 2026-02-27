@extends('layouts.app')

@section('title', 'Tambah Catatan')

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
            <div class="card-header">Tambah Catatan Baru</div>
            <div class="card-body">
                <form method="POST" action="/catatan" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" name="judul" id="judul" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="isi" class="form-label">Isi Catatan</label>
                        <textarea name="isi" id="isi" class="form-control" rows="5"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="lampiran" class="form-label">Lampiran (opsional)</label>
                        <input type="file" name="lampiran" id="lampiran" class="form-control">
                        <div class="form-text">Format: PDF, gambar, atau teks. Maks 2MB.</div>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Simpan Catatan</button>
                    </div>
                    <a href="/catatan" class="mt-2 d-block text-center">← Kembali ke Daftar</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
