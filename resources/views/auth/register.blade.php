@extends('layouts.auth.auth-form')
@section('title', __('auth.join').' | '.config('app.name'))
@section('form-section')
<!-- Login-Registration Form  -->
<div class="registration-login-form">
    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="home" role="tabpanel" data-mh="log-tab">
            <div class="title h6">{{__('auth.register_to')}} {{config('app.name')}}</div>
            <form class="content" method="POST" action="{{route('register')}}">
                @csrf
                <div class="row">
                    <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group label-floating">
                            <label class="control-label">{{__('auth.register_page.name')}}</label>
                            <input name="name" class="form-control" placeholder="" type="text" value="{{ old('name') }}" required>
                            @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif										
                        </div>
                    </div>
                    <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group label-floating">
                            <label class="control-label">{{__('auth.register_page.username')}}</label>
                            <input name="username" class="form-control" placeholder="" type="text" value="{{ old('username') }}" required>
                            @if ($errors->has('username'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('username') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group label-floating">
                            <label class="control-label">{{__('auth.register_page.email')}}</label>
                            <input name="email" class="form-control" placeholder="" type="email" value="{{ old('email') }}" required>
                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">{{__('auth.register_page.password')}}</label>
                            <input name="password" class="form-control" placeholder="" type="password" required>
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">{{__('auth.register_page.password_confirmation')}}</label>
                            <input class="form-control" placeholder="" type="password"  name="password_confirmation" required>
                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group label-floating is-select">
                            <label class="control-label">{{__('auth.register_page.gender')}}</label>
                            <select name="gender" class="selectpicker form-control" required>
                            @foreach ($genders as $genderKey => $genderValue)
                            <option @if (old('gender') == $genderKey) selected @endif value="{{$genderKey}}">{{__('auth.register_page.'.$genderValue)}}</option>
                            @endforeach
                            </select>
                            @if ($errors->has('gender'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('gender') }}</strong>
                            </span>
                            @endif
                        </div>
                        <a href="javascript:;" class="explanation" style="border-bottom: 1px dotted gray; color: gray">	
                        {{__('auth.register_page.explanation')}}
                        </a>
                        <div id="explanation-details" style="display: none">
                            {!! __('auth.register_page.explanation_profile_type') !!}
                        </div>
                        <div class="form-group label-floating is-select">
                            <label class="control-label">{{__('auth.register_page.profile_type')}}</label>
                            <select name="profile_type" class="selectpicker form-control" required>
                            @foreach ($userTypes as $userTypeKey=> $userTypeValue)
                            <option @if (old('profile_type') == $userTypeValue) selected @endif value="{{$userTypeValue}}">{{__('auth.register_page.'.$userTypeKey)}}</option>
                            @endforeach
                            </select>
                            @if ($errors->has('profile_type'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('profile_type') }}</strong>
                            </span>
                            @endif										
                        </div>
                        <div class="remember">
                            <div class="checkbox">
                                <label>
                                <input name="agree_terms" type="checkbox" required>
                                {{__('auth.register_page.i_accept')}} <a href="#" style="color: gray; text-decoration: underline;">{{__('auth.register_page.terms_and_conditions')}}</a> {{__('auth.register_page.of_website')}}
                                </label>
                                @if ($errors->has('agree_terms'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('agree_terms') }}</strong>
                                </span>
                                @endif										
                            </div>
                        </div>
                        <button type="submit" class="btn btn-green btn-lg full-width" style="color: white;">{{__('auth.register_page.complete_registration')}}</button>
                        <a href="{{route('login')}}" class="btn btn-grey-lighter btn-lg full-width" style="color: white;">{{__('auth.login')}}</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- ... end Login-Registration Form  -->
@endsection