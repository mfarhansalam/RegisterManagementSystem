@extends('layout.private')

@section('content')
    @if (session('status'))
        <div>{{ session('status') }}</div>
    @endif

    <div>You are logged in!</div>

    @if( Auth::user()->hasVerifiedEmail()) 
        you are verified 
    @else 
        you have not verify your email


        <form action="/email/verification-notification" method="post">
            @csrf 
            <button type="submit">Resend Email Verification</button>
        </form>
    @endif



    @can('is-expired')
    <div class="alert alert-danger">Keahlian anda telah luput. Sila perbaharui keahlian di <a href="/signup">halaman sign up.</a></div>
    @endcan

    @can('is-active')
    <div class="alert alert-success">Keahlian akan luput dalam {{Auth::user()->subscription->expire_at->diffInDays() }} hari</div>
    @endcan

    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <button type="submit">
            {{ __('Logout') }}
        </button>
    </form>

    <hr>

@endsection
