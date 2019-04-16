@extends('layouts.auth.auth-form')

@section('title', __('auth.reset_password').' | '.config('app.name'))

@section('form-section')
<!-- Window-popup Restore Password -->
<div id="restore-password">
    <div class="modal-dialog window-popup restore-password-popup">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title">{{__('auth.reset_password_page.restore_password')}}</h6>
            </div>
            <div class="modal-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group label-floating">
                        <label class="control-label">{{__('auth.reset_password_page.email')}}</label>
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group label-floating">
                        <label class="control-label">{{__('auth.reset_password_page.password')}}</label>
                        <input id="password" name="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group label-floating">
                        <label class="control-label">{{__('auth.reset_password_page.confirm_password')}}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg full-width">{{__('auth.reset_password_page.change_password')}}</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ... end Window-popup Restore Password -->
@endsection
