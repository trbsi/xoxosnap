@extends('layouts.auth.auth-form')
@section('title', __('auth.login').' | '.config('app.name'))
@section('form-section')
<!-- Login-Registration Form  -->
<div class="registration-login-form">
    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="profile" role="tabpanel" data-mh="log-tab">
            <div class="title h6">{{__('auth.login_page.login_to_your_account')}}</div>
            @if (session('you_may_login'))
                <div class="alert alert-success">{{session('you_may_login')}}</div>
            @endif
            <form class="content"method="POST" action="{{ route('login') }}">
                @csrf
                <div class="row">
                    <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group label-floating">
                            <label class="control-label">{{__('auth.login_page.email')}}</label>
                            <input class="form-control" placeholder="" type="email" name="email" value="{{ old('email') }}" required="">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">{{__('auth.login_page.password')}}</label>
                            <input class="form-control" placeholder="" type="password" name="password" required="">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="remember">
                            <div class="checkbox">
                                <label>
                                <input name="remember" type="checkbox"  {{ old('remember') ? 'checked' : '' }}>
                                {{__('auth.login_page.remember_me')}}
                                </label>
                            </div>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="forgot"> {{__('auth.login_page.forgot_my_password')}}</a>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-lg btn-green full-width"> {{__('auth.login')}}</button>
                        <p>{{__('auth.login_page.donot_have_account')}} <a href="{{route('register')}}" style="color: blue; text-decoration: underline;">{{__('auth.login_page.register_now')}}</a> {{__('auth.login_page.start_enjoing_benefits')}}</p>

                        <div class="or"></div>
                        <h4><b>{{__('auth.login_page.if_you_are_performer')}}</b></h4>
                        <?php /*
                        <a href="#" class="btn btn-lg bg-facebook full-width btn-icon-left"><i class="fab fa-facebook-f" aria-hidden="true"></i>Login with Facebook</a> */?>
                        <a href="{{route('web.social.login', ['provider' => 'twitter'])}}" class="btn btn-lg bg-twitter full-width btn-icon-left"><i class="fab fa-twitter" aria-hidden="true"></i>{{__('auth.login_with_twitter')}}</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- ... end Login-Registration Form  -->
@endsection