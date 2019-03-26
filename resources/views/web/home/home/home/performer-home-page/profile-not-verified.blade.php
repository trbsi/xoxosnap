<?php 
use App\Models\UserVerification;
?>

<div class="container">
	<div class="row">
		@if (UserVerification::STATUS_UNVERIFIED === $user->verification->status)
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="alert alert-warning text-center">
				<h1>
					{{__('web/home/home.performer.not_verified.profile_not_verified')}} 
				</h1>
				<div class="img-circular mx-auto" style="opacity: 0.6; background-image: url('{{$user->profile->picture}}');">
					<img src="/img/verified.png" style="position: absolute; bottom: 1px; right: 1px;">
				</div>
				<p>
					{!! __('web/home/home.performer.not_verified.upload_stories_videos_verify') !!} 
				</p>
				<p>
					{!! __('web/home/home.performer.not_verified.use_this_number_to_verify_profile') !!} 
					<img src="/img/not_verified.jpg" class="img-thumbnail">
				</p>

				<h1>
					{{__('web/home/home.performer.not_verified.number')}}: {{$user->verification->number}}
				</h1>
				<form method="POST" action="{{route('user.verification.request-verification')}}" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<div class="file-upload">
							<label for="upload" class="file-upload__label bg-blue">{{__('web/home/home.performer.not_verified.choose_photo')}}</label>
							<input class="file-upload__input" type="file" name="verification_photo">
						</div>
						@if ($errors->has('verification_photo'))
						<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('verification_photo') }}</strong>
						</span>
						@endif	
						<div class="file-label"></div>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-green btn-md">{{__('web/home/home.performer.not_verified.send')}}</button>
					</div>
				</form>
			</div>
		</div>
		@else
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="alert alert-info text-center">
				<h3>
				{!! __('web/home/home.performer.not_verified.hold_on_we_are_verifying_you') !!}
				</h3>
			</div>
		</div>
		@endif
	</div>
</div>

@push('javascript')
<script>
	$('input[name="verification_photo"]').on('change',function(e){
		//get the file name
		var fileName = e.target.files[0].name;
		//replace the "Choose a file" label
		$('.file-label').html(fileName);
	})
</script>
@endpush