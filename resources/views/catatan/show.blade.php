@extends('layouts.app')

@section('title', $catatan->judul)

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>{{ $catatan->judul }}</span>
                <div>
                    <small class="text-muted d-block">{{ $catatan->created_at->format('d F Y, H:i') }}</small>
                    <small class="text-success">{{ $catatan->user->name }}</small>
                </div>
            </div>

            <div class="card-body">
                <p class="card-text">{!! nl2br(e($catatan->isi)) !!}</p>
            </div>

            @if($catatan->lampiran)
                <hr>
                <p class="mb-0"><strong>Lampiran:</strong></p>
                @php
                    $ext = pathinfo($catatan->lampiran, PATHINFO_EXTENSION);
                @endphp
                @if(in_array($ext, ['jpg', 'jpeg', 'png']))
                    <img src="{{ asset('storage/public/lampiran/' . $catatan->lampiran) }}" alt="Lampiran" class="img-fluid mt-2" style="max-height:300px;">
                @else
                    <a href="{{ asset('storage/public/lampiran/' . $catatan->lampiran) }}" target="_blank" class="btn btn-outline-secondary btn-sm mt-2">
                        📎 Lihat Lampiran
                    </a>
                @endif
            @endif


            
            <div class="card-footer text-end">
            <a href="/catatan" class="btn btn-secondary">← Kembali</a>
            <a href="/catatan/{{ $catatan->id }}/edit" class="btn btn-warning">Edit</a>
            
            @if($catatan->is_archived)
                <form action="/catatan/{{ $catatan->id }}/unarchive" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-success">Batalkan Arsip</button>
                </form>
            @else
                <form action="/catatan/{{ $catatan->id }}/archive" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-secondary" onclick="return confirm('Arsipkan catatan ini?')">Arsipkan</button>
                </form>
            @endif

            <form action="/catatan/{{ $catatan->id }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus catatan ini?')">Hapus</button>
            </form>
        </div>

        </div>
    </div>
</div>
@endsection
