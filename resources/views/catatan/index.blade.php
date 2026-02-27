@extends('layouts.app')

@section('title', 'Daftar Catatan')

@section('content')
<div class="row justify-content-between mb-3">
     <div class="col">
        <h2>Catatan Aktif</h2>
        <p class="text-muted">Kamu punya {{ $jumlah_aktif }} catatan aktif.</p>
    </div>
    <div class="col-auto">
        <a href="/catatan/import" class="btn btn-outline-info me-2">Impor CSV</a>

        <a href="/catatan/export" class="btn btn-outline-success me-2"><i class="fas fa-file-csv"></i> Ekspor CSV</a>
        
        <a href="{{ route('catatan.arsip') }}" class="btn btn-outline-secondary me-2">Arsip ({{ App\Models\Catatan::where('user_id', auth()->id())->where('is_archived', true)->count() }})</a>
        <a href="{{ route('catatan.create') }}" class="btn btn-success">+ Tambah Baru</a>
    </div>
    <div class="d-flex gap-2 mb-4">
        <form method="GET" action="/catatan" class="flex-fill">
            <div class="input-group">
                <input type="text" name="cari" class="form-control" placeholder="Cari judul atau isi..." value="{{ request('cari') }}">
                <button class="btn btn-outline-primary" type="submit">Cari</button>
                @if(request('cari'))
                    <a href="/catatan" class="btn btn-outline-secondary">✕ Reset</a>
                @endif
            </div>
        </form>

        <form method="GET" action="/catatan" class="ms-2">
            <input type="hidden" name="cari" value="{{ request('cari') }}">
            <select name="urut" class="form-select" onchange="this.form.submit()">
                <option value="terbaru" {{ request('urut') == 'terbaru' ? 'selected' : '' }}>Terbaru</option>
                <option value="terlama" {{ request('urut') == 'terlama' ? 'selected' : '' }}>Terlama</option>
            </select>
        </form>
    </div>


</div>



@if($catatan->count() > 0)
    <div class="row">
        @foreach($catatan as $item)
            <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-header">
                        {{ $item->judul }}
                        <small class="text-muted float-end">{{ $item->created_at->locale('id')->diffForHumans() }}</small>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ Str::limit($item->isi, 100) }}</p>
                        <a href="/catatan/{{ $item->id }}" class="btn btn-sm btn-outline-primary"><i class="fas fa-eye"></i></a>
                        <a href="#" class="btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i></a>
                        <form action="/catatan/{{ $item->id }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-sm btn-outline-danger" 
                                    onclick="bukaModalHapus('/catatan/{{ $item->id }}', '{{ addslashes($item->judul) }}')">
                                <i class="fas fa-trash"></i>
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="alert alert-info">
        Belum ada catatan. <a href="/catatan/tambah">Buat catatan pertama!</a>
    </div>
@endif
{{ $catatan->links('pagination::bootstrap-5') }}

@endsection
