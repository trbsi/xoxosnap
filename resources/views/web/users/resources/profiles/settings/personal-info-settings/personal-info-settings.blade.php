@extends('web.users.resources.profiles.settings.settings-layout')

@section('settings-content')
<div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
	<div class="ui-block">
		<div class="ui-block-title">
			<h6 class="title">{{__('web/users/resources/settings.personal_info.personal_information')}}</h6>
		</div>
		<div class="ui-block-content">
			
			<!-- Personal Account Settings Form -->
			
			<form method="POST" action="{{route('web.user.profile.settings.edit-personal-info-settings')}}" enctype="multipart/form-data">
				@csrf
				<div class="row">
			
					<div class="col col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="form-group label-floating is-select">
							<div>{{__('web/users/resources/settings.personal_info.profile_picture_info')}}:</div>
							<div class="file-upload">
								<label for="upload" class="file-upload__label bg-blue" id="upload-button-text">{{__('web/users/resources/settings.personal_info.profile_picture')}}</label>
								<input class="file-upload__input" type="file" name="picture" id="profile-picture-input-file">
							</div>
							<div style="display: none; font-weight: bold;" id="chosen-picture">
								{{__('web/users/resources/settings.personal_info.chosen_picture')}}: <span id="chosen-picture-name"></span>
								|
								<a href="javascript:;" id="remove-chosen-picture">{{__('web/users/resources/settings.personal_info.remove_chosen_picture')}}</a>
							</div>
							@if ($errors->has('picture'))
	                            <span class="invalid-feedback" role="alert">
	                            <strong>{{ $errors->first('picture') }}</strong>
	                            </span>
                            @endif   
						</div>
						<div class="form-group label-floating is-select">
							<label class="control-label">{{__('web/users/resources/settings.personal_info.birthday')}}</label>
							<input type="date" name="birthday" value="{{old('birthday') ?? $authUser->profile->getOriginal('birthday')}}">
							@if ($errors->has('birthday'))
	                            <span class="invalid-feedback" role="alert">
	                            <strong>{{ $errors->first('birthday') }}</strong>
	                            </span>
                            @endif   
						</div>
						<div class="form-group label-floating is-select">
							<label class="control-label">{{__('web/users/resources/settings.personal_info.current_city')}}</label>
							<input type="text" name="current_city" value="{{old('current_city') ?? $authUser->profile->getOriginal('current_city')}}">
							@if ($errors->has('current_city'))
	                            <span class="invalid-feedback" role="alert">
	                            <strong>{{ $errors->first('current_city') }}</strong>
	                            </span>
                            @endif   
						</div>
						<div class="form-group label-floating is-select">
							<label class="control-label">{{__('web/users/resources/settings.personal_info.gender')}}</label>
							<select name="gender" class="selectpicker form-control" required>
                            @foreach ($genders as $genderKey => $genderValue)
                            	<option {{ (old('gender') == $genderKey ||  $authUser->profile->getOriginal('gender') == $genderKey) ? 'selected' : ''}} value="{{$genderKey}}">{{__('auth.register_page.'.$genderValue)}}</option>
                            @endforeach
                            </select>
							@if ($errors->has('gender'))
	                            <span class="invalid-feedback" role="alert">
	                            <strong>{{ $errors->first('gender') }}</strong>
	                            </span>
                            @endif   
						</div>
						<div class="form-group label-floating is-select">
							<label class="control-label">{{__('web/users/resources/settings.personal_info.business_email')}}</label>
							<input type="text" name="business_email" value="{{old('business_email') ?? $authUser->profile->getOriginal('business_email')}}">
							@if ($errors->has('business_email'))
	                            <span class="invalid-feedback" role="alert">
	                            <strong>{{ $errors->first('business_email') }}</strong>
	                            </span>
                            @endif   
						</div>
						<div class="form-group label-floating is-select">
							<label class="control-label">{{__('web/users/resources/settings.personal_info.website')}}</label>
							<input type="text" name="website" value="{{old('website') ?? $authUser->profile->getOriginal('website')}}">
							@if ($errors->has('website'))
	                            <span class="invalid-feedback" role="alert">
	                            <strong>{{ $errors->first('website') }}</strong>
	                            </span>
                            @endif   
						</div>
						<div class="form-group label-floating is-select">
							<label class="control-label">{{__('web/users/resources/settings.personal_info.facebook')}}</label>
							<input type="text" name="facebook" value="{{old('facebook') ?? $authUser->profile->getOriginal('facebook')}}">
							@if ($errors->has('facebook'))
	                            <span class="invalid-feedback" role="alert">
	                            <strong>{{ $errors->first('facebook') }}</strong>
	                            </span>
                            @endif   
						</div>
						<div class="form-group label-floating is-select">
							<label class="control-label">{{__('web/users/resources/settings.personal_info.twitter')}}</label>
							<input type="text" name="twitter" value="{{old('twitter') ?? $authUser->profile->getOriginal('twitter')}}">
							@if ($errors->has('twitter'))
	                            <span class="invalid-feedback" role="alert">
	                            <strong>{{ $errors->first('twitter') }}</strong>
	                            </span>
                            @endif   
						</div>
						<div class="form-group label-floating is-select">
							<label class="control-label">{{__('web/users/resources/settings.personal_info.instagram')}}</label>
							<input type="text" name="instagram" value="{{old('instagram') ?? $authUser->profile->getOriginal('instagram')}}">
							@if ($errors->has('instagram'))
	                            <span class="invalid-feedback" role="alert">
	                            <strong>{{ $errors->first('instagram') }}</strong>
	                            </span>
                            @endif   
						</div>
						<div class="form-group label-floating is-select">
							<label class="control-label">{{__('web/users/resources/settings.personal_info.description')}}</label>
							<textarea type="text" name="description" class="form-control" rows="10">{{old('description') ?? $authUser->profile->getOriginal('description')}}</textarea>
							@if ($errors->has('description'))
	                            <span class="invalid-feedback" role="alert">
	                            <strong>{{ $errors->first('description') }}</strong>
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

@push('javascript')
<script type="text/javascript">
	$("#profile-picture-input-file").change(function(){
		var filename = $(this).val().split('\\').pop();
		$('#chosen-picture-name').text(filename);
		$('#chosen-picture').show();
		$('#upload-button-text').text('{{__('web/users/resources/settings.personal_info.picture_chosen')}}');
    });

    $('#remove-chosen-picture').click(function() {
    	$("#profile-picture-input-file").val('');
		$('#chosen-picture').hide();
		$('#upload-button-text').text('{{__('web/users/resources/settings.personal_info.profile_picture')}}');
    });
</script>
@endpush