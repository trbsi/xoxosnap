<?php
use App\Models\Media;
?>

<div class="tab-pane {{(null === request()->query('section')) ? 'active' : ''}}" id="video" role="tabpanel" aria-expanded="true">
    <form enctype="multipart/form-data" id="video-form" method="POST">
    	<input type="hidden" id="thumbnail" name="thumbnail">
    	<div class="row" style="padding: 15px;">
    		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="form-group label-floating">
                	<label class="control-label">
                		{{__('web/home/home.performer_video_form.title')}}*
                	</label>
                    <input type="text" name="title" class="form-control">
                </div>
            </div>

    		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                	<label class="control-label">
                		{{__('web/home/home.performer_video_form.tags')}}*
                	</label>
                    <input type="text" name="hashtags" class="form-control">
                </div>
            </div>

            <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="form-group label-floating">
                	<label class="control-label">{{__('web/home/home.performer_video_form.cost')}}*</label>
                    <input type="number" name="cost" min="0" value="0" class="form-control">
                </div>
            </div>

            <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                	<label>{{__('web/home/home.performer_video_form.expiry')}}*</label>
                </div>

				<div class="radio">
					<label>
						<input type="radio" value="{{Media::EXPIRY_TYPE_NEVER}}" name="expiry_type" checked>
						{{__('web/home/home.performer_video_form.expires_never')}}
					</label>
				</div>
				<div class="radio">
					<label>
						<input type="radio" value="{{Media::EXPIRY_TYPE_CUSTOM}}" name="expiry_type">
						{{__('web/home/home.performer_video_form.expires_choose')}}
					</label>
				</div>
			</div>

			
            <div class="col col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
				<div class="form-group is-select">
					<input type="number" name="expires_in" min="1" disabled>
				</div>
			</div>
			<div class="col col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
				<div class="form-group is-select">
					<select class="selectpicker form-control" name="expires_in_type" disabled>
						<option value="{{Media::EXPIRY_TIME_MINUTES}}" selected="">{{__('web/home/home.performer_video_form.minutes')}}</option>
						<option value="{{Media::EXPIRY_TIME_HOURS}}">{{__('web/home/home.performer_video_form.hours')}}</option>
						<option value="{{Media::EXPIRY_TIME_DAYS}}">{{__('web/home/home.performer_video_form.days')}}</option>
					</select>
				</div>
			</div>

			<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="form-group label-floating">
                	<label class="control-label">{{__('web/home/home.performer_video_form.description')}}</label>
                    <textarea name="description" class="form-control" placeholder="" style="border: 1px solid #E9E9E9;"></textarea>
                </div>
            </div>

            <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="form-group">
                	<label><h3>{{__('web/home/home.performer_video_form.video')}}</h3></label>
                	<br>
					<div class="file-upload">
						<label for="upload" class="file-upload__label">{{__('web/home/home.performer_video_form.choose_video')}}</label>
						<input class="file-upload__input"  type="file" id="video-form-media-to-upload" accept="video/mp4,video/quicktime" name="video">
					</div>
					<br>
					{{__('web/home/home.performer_video_form.capture_info')}}
					<br>
					<button onclick="shoot()" type="button" class="btn btn-blue btn-sm">
						{{__('web/home/home.performer_video_form.capture_thumbnail')}}
					</button>

                </div>
            </div>

            <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div>
					<h3>{{__('web/home/home.performer_video_form.preview')}}</h3>
				</div>
				<video id="preview-video" controls style="max-width: 300px;">
					<source type="video/mp4">
				</video>
            </div>

			<div class="col col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<canvas id="video-canvas" style="display: none;"></canvas>
				<h3>{{__('web/home/home.performer_video_form.thumbnail')}}</h3>
				<div id="video-thumbnail-output"></div>
			</div>

			<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-top: 20px;">
				<div class="progress" id="progress">
				  <div class="bar progress-bar progress-bar-striped progress-bar-animated" role="progressbar"></div>
				</div>
			</div>
						                                
		  	<div class="add-options-message">
                <button class="btn btn-green btn-md-2" type="submit" id="upload-video-form-btn">{{__('web/home/home.performer_video_form.upload_video')}}</button>
                <button class="btn btn-secondary btn-md-2" type="button" id="reset-video-form-button">{{__('web/home/home.performer_video_form.reset')}}</button>
            </div>
    	</div>
    </form>
</div>

@push('javascript')
<script type="text/javascript">
$("#video-form").submit(function(e){
	e.preventDefault();
});

var resetVideoFormBtn = $('#reset-video-form-button');
var videoDuration = 0;

//input are being validated when user clicks on submit button
//so validate here only if video not chosen
var uploadVideoBtn = $('#upload-video-form-btn');
uploadVideoBtn.click(function() {
	var previewVideoSource = $('#preview-video source').attr('src');

	if (' ' === previewVideoSource || '' === previewVideoSource || undefined === previewVideoSource) {
		toastr.error('{{__('web/home/home.performer_video_form.please_choose_video')}}');
	}
});

$(function () {	
	var fileToSubmit;

    $('#video-form-media-to-upload').fileupload({
        dataType: 'json',
        acceptFileTypes: '/(\.|\/)(mp4|mov)$/i',
        autoUpload: false,
        url: '{{route('api.media.create')}}',
        beforeSend: function(xhr, data) {
	        xhr.setRequestHeader("X-CSRF-TOKEN", '{{ csrf_token() }}');
	    },
        add: function (e, data) {
            var videoData = processVideoAndPrepareForThumbnail(data);

            if (videoData) {
            	 // Load metadata of the video to get video duration
			    videoData.video.addEventListener('loadedmetadata', function() {
			        videoDuration = videoData.video.duration;
			         if (videoDuration > {{Media::MAX_VIDEO_DURATION}}) {
		            	toastr.error('{{__('web/home/home.performer_video_form.max_video_length', ['duration' => Media::MAX_VIDEO_DURATION/60])}}');
	            	    $('#preview-video source').attr('src', '');
	    				videoData.video.load();
		            	return;
		            }

		        	fileToSubmit = data;

		            //remove thumbnail
		            $("#video-form input[name='thumbnail']").val('');
		            $('#video-thumbnail-output').empty();
			    });
            }
		   
        },
        done: function (e, data) {
            $('#progress .bar').css('width', '0%');
            toastr.success('{{__('web/home/home.performer_video_form.video_uploaded')}}');

            setTimeout(function(){
	            window.location.href = data.result.url;
	        }, 2000);
            
        },
        progressall: function (e, data) {
	        var progress = parseInt(data.loaded / data.total * 100, 10);
	        $('#progress .bar').css('width', progress + '%');
	    },
	    fail: function (e, data) {
	        var response = data.jqXHR.responseJSON;

	        if (response.errors) {
		        $.each(response.errors, function(index, error){
			    	$.each(error, function(index, errorMessage){
			    		toastr.error(errorMessage);
				    });
			    });
	        } else {
	        	toastr.error(response.message);
	        }


	        $('#progress .bar').css('width', '0%');
	        uploadVideoBtn.attr('disabled', false);
	        resetVideoFormBtn.attr('disabled', false);
	    }
    });

    uploadVideoBtn.click(function() {
        var validated = validateVideoFormInput();
        if (false === validated) {
        	return;
        }

		if('' === $("#video-form input[name='thumbnail']").val()) {
			showVideoFormErrorMessage(false, '{{__('web/home/home.performer_video_form.choose_thumbnail')}}');
			return;
		}

		uploadVideoBtn.attr('disabled', true);
		resetVideoFormBtn.attr('disabled', true);

		fileToSubmit.formData = {
    		thumbnail: $('#video-form input[name="thumbnail"]').val(),
    		title: $('#video-form input[name="title"]').val(),
			description: $('#video-form textarea[name="description"]').val(),
			cost: $('#video-form input[name="cost"]').val(),
			expiry_type: $('#video-form input[name="expiry_type"]:checked').val(),
			expires_in: $('#video-form input[name="expires_in"]').val(),
			expires_in_type: $('#video-form select[name="expires_in_type"]').val(),
			duration: videoDuration,
			hashtags: $('#video-form input[name="hashtags"]').val(),
		};

        fileToSubmit.submit();
    });

    $('#video-form input[name="expiry_type"]').change(function () {
        if ('{{Media::EXPIRY_TYPE_CUSTOM}}' === $(this).val()) {
            $('#video-form input[name="expires_in"]').attr('disabled', false);
            $('#video-form select[name="expires_in_type"]').attr('disabled', false);
            $('#video-form select[name="expires_in_type"]').selectpicker('refresh');
		} else {
            $('#video-form input[name="expires_in"]').attr('disabled', true);
            $('#video-form select[name="expires_in_type"]').attr('disabled', true);
            $('#video-form select[name="expires_in_type"]').selectpicker('refresh');
		}
    });
});
</script>

<script type="text/javascript">
/*document.querySelector("#video-form-media-to-upload").addEventListener('change', function() {
	processVideo(document.querySelector("#video-form-media-to-upload"));
});*/

resetVideoFormBtn.click(function(e) {
	e.preventDefault();
	areYouSure()
	.then((result) => {
	  	if (result.value) {
        window.location.href = '{{route('web.home')}}';
		}
	});

});

function validateVideoFormInput()
{
	var requiredInputs = ['title', 'cost', 'hashtags'];
	var validated = true;

	$.each(requiredInputs, function(index, inputName) {
		if ('' === $("#video-form input[name='"+inputName+"']").val()) {
			var displayName = '';
			switch (inputName) {
				case 'title':
					displayName = '{{__('web/home/home.performer_video_form.title')}}';
					break;

				case 'cost':
					displayName = '{{__('web/home/home.performer_video_form.cost')}}';
					break;

				case 'expires_in':
					displayName = '{{__('web/home/home.performer_video_form.expiry')}}';
					break;

				case 'hashtags':
					displayName = '{{__('web/home/home.performer_video_form.tags')}}';
					break;

			}
			showVideoFormErrorMessage(displayName);
			validated = false;
		}
	});

	if (false === $('#video-form input[name="expiry_type"]').is(':checked')) { 
		showVideoFormErrorMessage('{{__('web/home/home.performer_video_form.expiry')}}');
		validated = false;
	} else {
		if ('{{Media::EXPIRY_TYPE_CUSTOM}}' === $('#video-form input[name="expiry_type"]:checked').val() && '' === $('#video-form input[name="expires_in"]').val()) {
			showVideoFormErrorMessage('{{__('web/home/home.performer_video_form.expires_choose')}}');
			validated = false;
		}
	}

	return validated;
}

function showVideoFormErrorMessage(inputName, fullMessage = false) 
{
	if (fullMessage) {
		toastr.error(fullMessage);
	} else {
		toastr.error('{{__('web/home/home.performer_video_form.validation_error_field')}} "'+inputName+'" {{__('web/home/home.performer_video_form.validation_error_must_not_be_empty')}}');
	}
}

function processVideoAndPrepareForThumbnail(videoData) 
{
	var _CANVAS = document.querySelector("#video-canvas"),
	    _CTX = _CANVAS.getContext("2d"),
	    _VIDEO = document.querySelector("#preview-video");

	// When user chooses a MP4 file
    // Validate whether MP4
    if(['video/mp4'].indexOf(videoData.files[0].type) == -1 && ['video/quicktime'].indexOf(videoData.files[0].type) == -1) {
        alert('Error : Only MP4 and MOV format allowed');
        return;
    }

    // Hide upload button
    //document.querySelector("#upload-button").style.display = 'none';

    // Object Url as the video source
    document.querySelector("#preview-video source").setAttribute('src', URL.createObjectURL(videoData.files[0]));
    
    // Load the video and show it
    _VIDEO.load();
    _VIDEO.style.display = 'inline';
    
    // Load metadata of the video to get video duration and dimensions
    _VIDEO.addEventListener('loadedmetadata', function() {
        // Set canvas dimensions same as video dimensions
        _CANVAS.width = _VIDEO.videoWidth;
        _CANVAS.height = _VIDEO.videoHeight;
    });

    return {video: _VIDEO};
}

var scaleFactor = 0.5;
var snapshots = [];

/**
 * Captures a image frame from the provided video element.
 *
 * @param {Video} video HTML5 video element from where the image frame will be captured.
 * @param {Number} scaleFactor Factor to scale the canvas element that will be return. This is an optional parameter.
 *
 * @return {Canvas}
 */
function capture(video, scaleFactor) {
    if(scaleFactor == null){
        scaleFactor = 1;
    }
    var w = video.videoWidth * scaleFactor;
    var h = video.videoHeight * scaleFactor;
    var maxWidth = 300;

    //if thumbnail is too big
    if (w > maxWidth) {
	    var ratio = w/h;

	    if (ratio > 1) {
	    	w = maxWidth;
	    	h = maxWidth / ratio;
	    }

	    //this is square
	    if (ratio === 1) {
	    	w = maxWidth;
	    	h = maxWidth;
	    }
    }

    var canvas = document.createElement('canvas');
        canvas.width  = w;
        canvas.height = h; 
    var ctx = canvas.getContext('2d');
        ctx.drawImage(video, 0, 0, w, h);
    return canvas;
} 

/**
 * Invokes the <code>capture</code> function and attaches the canvas element to the DOM.
 */
function shoot()
{
    var video  = document.getElementById('preview-video');
    var output = document.getElementById('video-thumbnail-output');
    var canvas = capture(video, scaleFactor);

    output.innerHTML = '';
    output.appendChild(canvas);

    document.getElementById('thumbnail').value = canvas.toDataURL('image/jpeg');
}
</script>

<script type="text/javascript">
$("#video-form input[name='hashtags']").tokenInput('{{route('api.hashtags.filter')}}', {
    searchDelay: 2000,
    minChars: 3,
    tokenLimit: 5,
    preventDuplicates: true,
    theme: 'facebook'
});
</script>
@endpush