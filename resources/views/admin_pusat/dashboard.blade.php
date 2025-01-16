@extends('layouts.admin')

@section('content')
    <h1>Dashboard Admin Pusat</h1>
    
    <p>Selamat datang, <strong>{{ Auth::user()->name }}</strong> :D </p>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
@endsection

