<?php
use App\Models\Story;
?>

<div class="tab-pane {{('add-story' === request()->query('section')) ? 'active' : ''}}" id="story" role="tabpanel" aria-expanded="true">
    <form id="story-form">
    	<div class="row" style="padding: 15px;">

            <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                	<label>{{__('web/home/home.performer_story_form.expiry')}}*</label>
                </div>

				<div class="radio">
					<label>
						<input type="radio" value="{{Story::EXPIRY_TYPE_NEVER}}" name="expiry_type" checked>
						{{__('web/home/home.performer_story_form.expires_24')}}
					</label>
				</div>
				<div class="radio">
					<label>
						<input type="radio" value="{{Story::EXPIRY_TYPE_CUSTOM}}" name="expiry_type">
						{{__('web/home/home.performer_story_form.expires_choose')}}
					</label>
				</div>
			</div>

            <div class="col col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
				<div class="form-group is-select  label-floating">
					<label class="control-label">{{__('web/home/home.performer_story_form.expires_in')}}</label>
					<input type="number" name="expires_in" min="1">
				</div>
			</div>
			<div class="col col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
				<div class="form-group is-select">
					<select class="selectpicker form-control" name="expires_in_type">
						<option value="{{Story::EXPIRY_TIME_MINUTES}}" selected="">{{__('web/home/home.performer_video_form.minutes')}}</option>
						<option value="{{Story::EXPIRY_TIME_HOURS}}">{{__('web/home/home.performer_video_form.hours')}}</option>
					</select>
				</div>
			</div>

    		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    			<div class="file-upload ">
					<label for="upload" class="file-upload__label">{{__('web/home/home.performer_story_form.choose_video_or_image')}}</label>
					<input class="file-upload__input"  type="file" name="stories[]" id="story-form-media-to-upload" multiple>
				</div>
    		</div>

    		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    			<table class="table table-striped table-hover" id="story-table">
    				<tr>
    					<th>{{__('web/home/home.performer_story_form.preview')}}</th>
    					<th>{{__('web/home/home.performer_story_form.name')}}</th>
    					<th>{{__('web/home/home.performer_story_form.action')}}</th>
    				</tr>
    			</table>
    		</div>
    	</div>

    	<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-top: 20px;">
			<div class="progress" id="story-progress">
			  <div class="bar progress-bar progress-bar-striped progress-bar-animated" role="progressbar"></div>
			</div>
		</div>

        <div class="add-options-message">
            <button class="btn btn-green btn-md-2" id="upload-story-form-button">{{__('web/home/home.performer_story_form.upload_story')}}</button>
            <button class="btn btn-secondary btn-md-2" type="button" id="reset-story-form-button">{{__('web/home/home.performer_story_form.reset')}}</button>
        </div>
    </form>
</div>

@push('javascript')
<script type="text/javascript">
$("#story-form").submit(function(e){
	e.preventDefault();
});

var resetStoryFormBtn = $('#reset-story-form-button');
var uploadStoryBtn = $('#upload-story-form-button');
var filesToSubmit = [];
var fileToUploadIndex = 0;

$(function () {	
    var fileUploadForm = $('#story-form-media-to-upload').fileupload({
        dataType: 'json',
        acceptFileTypes: /(\.|\/)(jpe?g|png|mp4)$/i,
        autoUpload: false,
        url: '{{route('story.create')}}',
        beforeSend: function(xhr, data) {
	        xhr.setRequestHeader("X-CSRF-TOKEN", '{{ csrf_token() }}');
	        data.formData = {x:23};
	    },
        add: function (e, data) {
        	if (!(/(\.|\/)(jpe?g|png|mp4)$/i).test(data.files[0].name)) {
	            toastr.error('{{__('web/home/home.performer_story_form.add_only_images_videos')}}');
	            return;
	        }
        	storyFormAppendFileToTable(data.files, fileToUploadIndex);
        	uploadStoryBtn.attr('disabled', false);
        	resetStoryFormBtn.attr('disabled', false);
        },
        done: function (e, data) {
            $('#story-progress .bar').css('width', '0%');
            toastr.success('{{__('web/home/home.performer_story_form.story_added')}}');

            setTimeout(function(){
	            window.location.href = '{{route('home')}}'; 
	        }, 2000);
            
        },
        progressall: function (e, data) {
	        var progress = parseInt(data.loaded / data.total * 100, 10);
	        $('#story-progress .bar').css('width', progress + '%');
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


	        $('#story-progress .bar').css('width', '0%');
	        uploadStoryBtn.attr('disabled', false);
	        resetStoryFormBtn.attr('disabled', false);
	    }
    });

    uploadStoryBtn.click(function() {
    	var validated = validateStoryForm();
    	if (false === validated) {
    		return;
    	}
		uploadStoryBtn.attr('disabled', true);
		resetStoryFormBtn.attr('disabled', true);
		var extraData = {
			expiry_type: $('#story-form input[name="expiry_type"]:checked').val(),
			expires_in_type: $('#story-form select[name="expires_in_type"]').val(),
			expires_in: $('#story-form input[name="expires_in"]').val(),
		};

		$('#story-form-media-to-upload').fileupload('send', {files: filesToSubmit, formData: extraData});
    });

	resetStoryFormBtn.click(function(e) {
		e.preventDefault();
		areYouSure()
		.then((result) => {
		  	if (result.value) {
            	window.location.href = '{{route('home', ['section' => 'add-story'])}}';
			}
		});

	});
    
});

function validateStoryForm()
{
	var validated = true;

	if (false === $('#story-form input[name="expiry_type"]').is(':checked')) { 
		showStoryFormErrorMessage('{{__('web/home/home.performer_story_form.expiry')}}');
		validated = false;
	} else {
		if ('{{Story::EXPIRY_TYPE_CUSTOM}}' === $('#story-form input[name="expiry_type"]:checked').val() && '' === $('#story-form input[name="expires_in"]').val()) {
			showVideoFormErrorMessage('{{__('web/home/home.performer_story_form.expires_choose')}}');
			validated = false;
		}
	}

	return validated;
}

function showStoryFormErrorMessage(inputName, fullMessage = false) 
{
	if (fullMessage) {
		toastr.error(fullMessage);
	} else {
		toastr.error('{{__('web/home/home.performer_video_form.validation_error_field')}} "'+inputName+'" {{__('web/home/home.performer_video_form.validation_error_must_not_be_empty')}}');
	}
}


function storyFormAppendFileToTable(files, fileIndex)
{
	var fileType;

	$.each(files, function(index, file) {
		if ((file.type).indexOf('video') !== -1) {
			var vid = document.createElement('video');
			var fileURL = URL.createObjectURL(file);
			vid.src = fileURL;
			// wait for duration to change from NaN to the actual duration
			vid.onloadedmetadata = function() {
				if (this.duration > {{Story::MAX_STORY_VIDEO_DURATION}}) {
	            	toastr.error('{{__('web/home/home.performer_story_form.max_video_length', ['duration' => Story::MAX_STORY_VIDEO_DURATION])}}');
	            	return;
	            }

    			fileTypeContent = '<video controls style="max-height: 300px; max-width: 300px;">'
							+'<source type="video/mp4" src="'+URL.createObjectURL(file)+'">'
						+'</video>';

				storyFormAppendContentToTableAndPushFileToArray(file, fileTypeContent, fileIndex);
	  		};

		} else {
			fileTypeContent = '<img class="img-thumbnail img-fluid" style="max-height:200px;" src="'+URL.createObjectURL(file)+'">';
			storyFormAppendContentToTableAndPushFileToArray(file, fileTypeContent, fileIndex);
		}	
	});
}

function storyFormAppendContentToTableAndPushFileToArray(file, fileTypeContent, fileIndex)
{
	var html = '<tr id="story-file-'+fileIndex+'">'
		+'<td>'+fileTypeContent+'</td>'
		+'<td>'+file.name+'</td>'
		+'<td><a href="javascript:;" onClick="removeStoryMedia('+fileIndex+')" class="btn btn-danger btn-sm">{{__('web/home/home.performer_story_form.remove')}}</a></td>'
	+'</tr>';
	$("#story-table").append(html);

	filesToSubmit[fileToUploadIndex] = file;
	fileToUploadIndex++;
}

function removeStoryMedia(fileIndex) 
{
	filesToSubmit.splice(fileIndex, 1);
	$('#story-file-'+fileIndex).remove();
}
</script>
@endpush