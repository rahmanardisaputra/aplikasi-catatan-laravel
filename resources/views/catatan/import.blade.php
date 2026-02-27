@extends('layouts.app')

@section('title', 'Impor Catatan')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Impor Catatan dari CSV</div>
            <div class="card-body">

                @if(session('sukses'))
                    <div class="alert alert-success">{{ session('sukses') }}</div>
                @endif

                <p class="small text-muted mb-3">
                    Format file CSV harus memiliki kolom: <strong>Judul, Isi, Tanggal Dibuat</strong><br>
                    Contoh baris: <code>Belanja Bulanan,"Beli susu, roti",10 Februari 2026 14:30</code>
                </p>

                <form method="POST" action="/catatan/import" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="file" class="form-label">Pilih file CSV</label>
                        <input type="file" name="file" id="file" class="form-control" accept=".csv" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Impor Sekarang</button>
                    <a href="/catatan" class="btn btn-link">← Batal</a>
                </form>
                //ff
            </div>
        </div>
    </div>
</div>
@endsection
