@if ($userComposerUserId === $media->user_id)

<div class="container" id="edit-media-container" style="{{($errors->count() === 0) ? 'display:none;' : ''}}">
    <div class="ui-block">
        <div class="ui-block-content">
            <div class="row">
                <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <form method="POST" action="{{route('web.media.update')}}" id="edit-media-form">
                        @csrf
                        <input name="id" type="hidden" value="{{$media->id}}">
                        <div class="form-group">
                            <div class="form-group label-floating">
                                <label class="control-label">
                                {{__('web/home/home.performer_video_form.title')}}*
                                </label>
                                <input type="text" name="title" class="form-control" value="{{$media->title}}">
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif	
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-group">
                                <label class="control-label">
                                {{__('web/home/home.performer_video_form.tags')}}*
                                </label>
                                <input type="text" name="hashtags" class="form-control">
                                @if ($errors->has('hashtags'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('hashtags') }}</strong>
                                    </span>
                                @endif	
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-group label-floating">
                                <label class="control-label">
                                {{__('web/home/home.performer_video_form.description')}}
                                </label>
                                <textarea class="form-control" name="description" rows="3">{{$media->getOriginal('description')}}</textarea>
                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group label-floating">
                            <button class="btn btn-green btn-md-2" type="submit">{{__('web/home/home.performer_video_form.submit')}}</button>
                            <button class="btn btn-secondary btn-md-2" type="button" id="cancel-edit-video-button">{{__('web/home/home.performer_video_form.cancel')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@push('javascript')
    <script>
        $('#cancel-edit-video-button').click(function() {
            $('#edit-media-container').hide();
        });
    </script>

    <script type="text/javascript">
        var hashtags = {!! $media->hashtags->toJson()!!};
        var tags = [];
        $.each(hashtags, function(index, hashtag) {
            tags.push({id: hashtag.id, name: hashtag.name});
        });

        $("#edit-media-form input[name='hashtags']").tokenInput('{{route('api.hashtags.filter')}}', {
            searchDelay: 2000,
            minChars: 3,
            tokenLimit: 5,
            preventDuplicates: true,
            theme: 'facebook',
            prePopulate: tags
        });
    </script>
@endpush