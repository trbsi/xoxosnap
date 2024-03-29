@extends('web.users.resources.profiles.settings.settings-layout')

@section('settings-content')
<div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
	<div class="ui-block">
		<div class="ui-block-title">
			<h6 class="title">{{__('web/users/resources/settings.account.account_settings')}}</h6>
		</div>
		<div class="ui-block-content">
			
			<!-- Personal Account Settings Form -->
			
			<form method="POST" action="{{route('web.user.profile.settings.edit-account-settings')}}">
				@csrf
				<div class="row">
			
					<div class="col col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="form-group label-floating is-select">
							<label class="control-label">{{__('web/users/resources/settings.account.username')}}</label>
							<input type="text" name="username" value="{{old('username') ?? $authUser->username}}">
							@if ($errors->has('username'))
	                            <span class="invalid-feedback" role="alert">
	                            <strong>{{ $errors->first('username') }}</strong>
	                            </span>
                            @endif   
						</div>
					</div>
					<div class="col col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="form-group label-floating is-select">
							<label class="control-label">{{__('web/users/resources/settings.account.email')}}</label>
							<input type="text" name="email" value="{{old('email') ?? $authUser->email}}">
							@if ($errors->has('email'))
	                            <span class="invalid-feedback" role="alert">
	                            <strong>{{ $errors->first('email') }}</strong>
	                            </span>
                            @endif   
						</div>
					</div>
				
					<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
						<button class="btn btn-primary btn-lg full-width">{{__('web/users/resources/settings.account.save')}}</button>
					</div>
				</div>
			</form>
			
			<!-- ... end Personal Account Settings Form  -->

		</div>
	</div>
</div>
@endsection