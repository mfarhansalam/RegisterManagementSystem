<form method="POST" action="{{ route('user-profile-information.update') }}">
    @csrf
    @method('PUT')

    <div class="form-group row">
        <label class="col-sm-3 col-form-label">{{ __('Name') }}</label>

        <div class="col-sm-9">
            <input class="form-control" type="text" name="name" value="{{ old('name') ?? auth()->user()->name }}"
                required autofocus autocomplete="name" />
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-3 col-form-label">{{ __('Email') }}</label>
        <div class="col-sm-9">
            <input class="form-control" type="email" name="email" value="{{ old('email') ?? auth()->user()->email }}"
                required autofocus />
        </div>
    </div>

    <div>
        <button type="submit" class="btn btn-primary">
            {{ __('Update Profile') }}
        </button>
    </div>
</form>

<hr>
