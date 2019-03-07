    <div class="container">
    <div class="row">
        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="ui-block responsive-flex">
                <div class="ui-block-title inline-items">
                    <div class="btn btn-control btn-control-small bg-yellow">
                        <svg class="olymp-trophy-icon"><use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-trophy-icon"></use></svg>
                    </div>
                    <h6 class="title">{{__('web/home/home.guest.recommended_performers')}}</h6>
                    <a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
    	@foreach($performers as $performer)
        <div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="ui-block">
                <!-- Friend Item -->
                <div class="friend-item">
                    <div class="friend-header-thumb">
                    </div>
                    <div class="friend-item-content">
                        <div class="friend-avatar">
                            <div class="author-thumb">
                                <img src="{{$performer->profile->picture}}" class="img-responsive" alt="author">
                            </div>
                            <div class="author-content">
                                <a href="#" class="h5 author-name">{{$performer->name}}</a>
                                <div class="country">{{$performer->username}}</div>
                            </div>
                        </div>
                        <div class="swiper-container" data-slide="fade">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="friend-count" data-swiper-parallax="-500">
                                        <a href="#" class="friend-count-item">
                                            <div class="h6">{{$performer->profile->followers}}</div>
                                            <div class="title">{{__('web/home/home.guest.followers')}}</div>
                                        </a>
                                        <a href="#" class="friend-count-item">
                                            <div class="h6">{{$performer->profile->videos}}</div>
                                            <div class="title">{{__('web/home/home.guest.videos')}}</div>
                                        </a>
                                    </div>
                                    <div class="control-block-button" data-swiper-parallax="-100">
                                        <div class="user-followed alert alert-success" style="display: none;">
                                              <i class="fa fa-check"></i> 
                                              {{__('web/home/home.viewer.followed')}}
                                        </div>
                                        <div class="user-not-followed alert alert-warning" style="display: none;">
                                              <i class="fa fa-info-circle"></i> 
                                              {{__('web/home/home.viewer.already_following')}}
                                        </div>
                                        <img src="/img/loading_circle.gif" class="loading-circle" style="display: none;">
                                        <a href="javascript:;" class="btn btn-control bg-blue follow-user" data-user-id="{{$performer->id}}">
                                            <svg class="olymp-plus-icon">
                                                <use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-plus-icon"></use>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <p class="friend-about" data-swiper-parallax="-500">
    									<ul>
    										<li><b>{{__('web/home/home.guest.gender')}}:</b> {{$performer->profile->gender}}</li>
    										<li><b>{{__('web/home/home.guest.website')}}:</b> 
                                                @if('-' === $performer->profile->website)
                                                -
                                                @else
                                                <a href="{{$performer->profile->website}}">{{__('web/home/home.guest.visit_website')}}</a>
                                                @endif
                                            </li>
    										<li><b>{{__('web/home/home.guest.business_email')}}:</b>
                                                @if('-' === $performer->profile->business_email)
                                                -
                                                @else
                                                <a href="mailto:{{$performer->profile->business_email}}">{{__('web/home/home.guest.send_email')}}</a>
                                                @endif
                                            </li>
    									</ul>                                    	
                                    </p>
                                    <div class="friend-since" data-swiper-parallax="-100">
                                        <span>{{__('web/home/home.guest.member_since')}}</span>
                                        <div class="h6">{{date('Y-m-d', strtotime($performer->created_at))}}</div>
                                    </div>
                                </div>
                            </div>
                            <!-- If we need pagination -->
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>


                <!-- ... end Friend Item -->			
            </div>
        </div>
        @endforeach
    </div>
</div>

@push('javascript')
<script type="text/javascript">
    $('.follow-user').click(function() {
        var followUser = this;
        var userFollowed = $(followUser).siblings('.user-followed');
        var userNotFollowed = $(followUser).siblings('.user-not-followed');
        var loadingCircle = $(followUser).siblings('.loading-circle');
        $(followUser).hide();
        loadingCircle.show();

        var dataToPost = {userId: $(this).data('user-id')};
        var response = ajax('{{route('users.follow-user')}}', 'POST', dataToPost);
    
        response
        .done(function(data) {
            if (true === data.followed) {
                loadingCircle.hide();
                userFollowed.show();
            } else {
                loadingCircle.hide();
                userNotFollowed.show();
            }
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            $(followUser).show();
            $(followUser).siblings('.loading-circle').hide();
        });
    });
    
</script>
@endpush