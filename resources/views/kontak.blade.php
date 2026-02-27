@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')
<div class="card">
    <div class="card-header">Halaman Kontak</div>
    <div class="card-body">
        <p>Ini adalah halaman Kontak.</p>
        <p>Email: {{ $kontak['email'] }}</p>
        <p>Telepon: {{ $kontak['telepon'] }}</p>
    </div>
</div>
@endsection
