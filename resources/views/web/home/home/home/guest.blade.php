<!-- Friends -->
<div class="container">
    <div class="row">
        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
            <img src="/img/logo/logo-sml.png">
            <h3>{{__('web/home/home.guest.join_community')}}</h3>
            <h4>{{__('web/home/home.guest.watch_uncensored_video')}}</h4>
            <br><br>
        </div>
        <div class="col col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
            <h4>{{__('web/home/home.guest.performers')}}</h4>
            <ul class="list-group" style="min-height: 180px">
                <li class="list-group-item">&starf; {{__('web/home/home.guest.performer_description_1')}}</li>
                <li class="list-group-item">&starf; {{__('web/home/home.guest.performer_description_2')}}</li>
                <li class="list-group-item">&starf; {{__('web/home/home.guest.performer_description_3')}}</li>
            </ul>
            <h4><b>{{__('auth.login_page.if_you_are_performer')}}</b></h4>
            <a href="{{route('web.social.login', ['provider' => 'twitter'])}}" class="btn btn-lg bg-twitter full-width btn-icon-left"><i class="fab fa-twitter" aria-hidden="true"></i>{{__('auth.login_with_twitter')}}</a>
        </div>
        <div class="col col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
            <h4>{{__('web/home/home.guest.viewers')}}</h4>
             <ul class="list-group" style="min-height: 180px">
                <li class="list-group-item">&#10022; {{__('web/home/home.guest.visitor_description_1')}}</li>
                <li class="list-group-item">&#10022; {{__('web/home/home.guest.visitor_description_2')}}</li>
                <li class="list-group-item">&#10022; {{__('web/home/home.guest.visitor_description_3')}}</li>
            </ul>
            <h4><b>{{__('web/home/home.guest.register_as_performer_viewer')}}</b></h4>
            <a href="{{route('register')}}" class="btn btn-purple btn-md full-width">{{__('auth.register')}}<div class="ripple-container"></div></a>
            <h4><b>{{__('web/home/home.guest.login_as_performer_viewer')}}</b></h4>
            <a href="{{route('login')}}" class="btn btn-green btn-md full-width">{{__('auth.login')}}<div class="ripple-container"></div></a>
        </div>
    </div>

    @if (false === $performers->isEmpty())
    <div class="row">
        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="ui-block responsive-flex">
                <div class="ui-block-title inline-items">
                    <div class="btn btn-control btn-control-small bg-yellow">
                        <svg class="olymp-trophy-icon"><use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-trophy-icon"></use></svg>
                    </div>
                    <h6 class="title">{{__('web/home/home.guest.recommended_performers')}}</h6>
                </div>
            </div>
        </div>
    </div>
    @endif


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
                                @component('components.user.profile-picture-component', [
									'isVerified' => $performer->is_verified,
                        			'profilePicture' => $performer->profile->picture,
									'verifiedTickSizeClass' => 'verified-tick-medium'
								])
								@endcomponent
                            </div>
                            <div class="author-content">
                                <a href="{{$performer->profile_url}}" class="h5 author-name">{{$performer->name}}</a>
                                <a href="{{$performer->profile_url}}"><div class="country">{{$performer->username}}</div></a>
                            </div>
                        </div>
                        <div class="swiper-container" data-slide="fade">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="friend-count" data-swiper-parallax="-500">
                                        <a href="javascript:;" class="friend-count-item">
                                            <div class="h6">{{$performer->profile->followers}}</div>
                                            <div class="title">{{__('web/home/home.guest.followers')}}</div>
                                        </a>
                                        <a href="javascript:;" class="friend-count-item">
                                            <div class="h6">{{$performer->profile->videos}}</div>
                                            <div class="title">{{__('web/home/home.guest.videos')}}</div>
                                        </a>
                                    </div>
                                    <div class="control-block-button" data-swiper-parallax="-100">
                                        <a href="javascript:;" data-name="{{$performer->name}}" class="btn btn-control bg-blue follow_performer_button">
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
                                                @if(empty($performer->profile->website))
                                                -
                                                @else
                                                <a href="{{$performer->profile->website}}" target="_blank">{{__('web/home/home.guest.visit_website')}}</a>
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
<!-- ... end Friends -->

@push('javascript')
    <script type="text/javascript">

        $('.follow_performer_button').click(function()
        {
            var performerName = $(this).data('name');
            var title = '{{__('web/home/home.guest.login_to_follow')}}'+' '+performerName;
            var text = '{{__('web/home/home.guest.if_you_want_to_follow')}}'+' '+performerName+' '+'{{__('web/home/home.guest.register_or_login')}}';
            Swal.fire({
              type: 'info',
              title: title,
              text: text,
            });
        });
    </script>
@endpush