<form method="POST" action="{{ route('user-password.update') }}">
    @csrf
    @method('PUT')

    <div class="form-group row">
        <label class="col-sm-3 col-form-label">{{ __('Current Password') }}</label>
        <div class="col-sm-9">
            <input class="form-control" type="password" name="current_password" required autocomplete="current-password" />
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-3 col-form-label">{{ __('Password') }}</label>
        <div class="col-sm-9">
            <input class="form-control" type="password" name="password" required autocomplete="new-password" />
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-3 col-form-label">{{ __('Confirm Password') }}</label>
        <div class="col-sm-9">
            <input class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
        </div>
    </div>

    <div>
        <button type="submit" class="btn btn-primary">
            {{ __('Save') }}
        </button>
    </div>
</form>

<hr>
