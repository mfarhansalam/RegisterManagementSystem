@extends('layout.private')
@section('content')

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Profile</h1>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-primary">Profail Pengguna</h6>
                        </div>
                        <div class="card-body">

                        @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updateProfileInformation()))
        @include('profile.update-profile-information-form')
    @endif

    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
        @include('profile.update-password-form')
    @endif

    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::twoFactorAuthentication()))
        @include('profile.two-factor-authentication-form')
    @endif


                        </div>
                    </div>



@endsection