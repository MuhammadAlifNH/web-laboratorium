@extends('layouts.web')

@section('content')
    <h1>Dashboard Admin Pusat</h1>
    
    <p>Selamat datang, <strong>{{ Auth::user()->name }}</strong> :D </p>
    <div class="sidebar"></div>
        <a href="{{ route('users.index') }}" class="btn btn-primary">Manajemen Pengguna</a>
        <a href="{{ route('labs.index') }}" class="btn btn-primary">Kelola Lab</a>
        <a href="{{ route('perlunak.index') }}" class="btn btn-primary">Kelola Perangkat Lunak</a>
        <a href="{{ route('perkeras.index') }}" class="btn btn-primary">Kelola Perangkat Keras</a>
        <a href="{{ route('pemeriksa_perlunak.index') }}" class="btn btn-primary">Kelola Pernyataan Software</a>
    </div>    
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
@endsection

