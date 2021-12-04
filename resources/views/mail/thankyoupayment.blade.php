@extends('mail.layout') 

@section('content')  

<h1>Terima Kasih atas Bayaran Yuran Keahlian</h1>

{{ $name }},

<p>Kami telah menerima bayaran anda sebanyak {{ $amount }}.</p> 

<p>Keahlian anda sekarang telah diperbaharui sehinggan {{ $expire_at }}.</p> 

<p>Anda boleh terus login di halaman berikut untuk ke sistem keahlian.</p> 

<p><a href="{{ route('login') }}">Login ke Sistem Keahlian Bootcamp</a></p>

@endsection 