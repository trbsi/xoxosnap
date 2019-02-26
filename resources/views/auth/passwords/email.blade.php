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
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <p>{{__('auth.reset_password_page.reset_password_description')}}
                    </p>
                    <div class="form-group label-floating">
                        <label class="control-label">Your Email</label>
                        <input class="form-control" placeholder="" type="email" name="email">
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-green btn-lg full-width">{{__('auth.reset_password_page.send_code')}}</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ... end Window-popup Restore Password -->
@endsection
