<!-- Window-popup Open Photo Popup V2 -->
<div class="modal fade modal-has-swiper" id="open-photo-popup-v2" tabindex="-1" role="dialog" aria-labelledby="open-photo-popup-v2" aria-hidden="true">
    <div class="modal-dialog window-popup open-photo-popup open-photo-popup-v2" role="document">
        <div class="modal-content">
            <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                <svg class="olymp-close-icon">
                    <use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-close-icon"></use>
                </svg>
            </a>
            <div class="modal-body">
                <div class="open-photo-thumb">
                    <div class="swiper-container" data-effect="fade" data-autoplay="4000">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                                <div class="photo-item">
                                    <video id="performer-video" preload="auto" style="max-height: 400px;">
                                        <source type="video/mp4">
                                    </video>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="open-photo-content">
                    <article class="hentry post">
                        <div class="post__author author vcard inline-items">
                            <img id="profile-picture" alt="author">
                            <div class="author-date">
                                <a id="post-author-name" target="_blank" class="h6 post__author-name fn" href="">First Last</a>
                                <div class="post__date">
                                    <time class="published" id="published-ago" datetime="2017-03-24T18:18">
                                    2 hours ago
                                    </time>
                                </div>
                            </div>
                            <?php /*
                            <div class="more">
                                <svg class="olymp-three-dots-icon">
                                    <use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                                </svg>
                                <ul class="more-dropdown">
                                    <li>
                                        <a href="#">Edit Post</a>
                                    </li>
                                    <li>
                                        <a href="#">Delete Post</a>
                                    </li>
                                </ul>
                            </div>
                            */ ?>
                        </div>
                        <p id="description">Here’s a photo from last month’s photoshoot. We really had a great time and got a batch of incredible shots for the new catalog.</p>
                        <div class="post-additional-info inline-items">
                            <img src="/img/loading_circle.gif" style="display: none;" id="likes-loading">
                            <a href="javascript:;" id="likes-icon" class="post-add-icon inline-items">
                                <svg class="olymp-heart-icon">
                                    <use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-heart-icon"></use>
                                </svg>
                                <span id="likes">148</span>
                            </a>
                            <div class="comments-shared">
                                <a href="javascript:;" class="post-add-icon inline-items">
                                    <svg class="olymp-icon-eye">
                                        <use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-icon-eye"></use>
                                    </svg>
                                    <span id="views">61</span>
                                </a>
                            </div>
                        </div>
                    </article>
                    <?php /*
                    <div class="mCustomScrollbar" data-mcs-theme="dark">
                        <ul class="comments-list">
                            <li class="comment-item">
                                <div class="post__author author vcard inline-items">
                                    <img src="/img/avatar48-sm.jpg" alt="author">
                                    <div class="author-date">
                                        <a class="h6 post__author-name fn" href="#">Marina Valentine</a>
                                        <div class="post__date">
                                            <time class="published" datetime="2017-03-24T18:18">
                                            46 mins ago
                                            </time>
                                        </div>
                                    </div>
                                </div>
                                <p>I had a great time too!! We should do it again!</p>
                            </li>
                            <li class="comment-item">
                                <div class="post__author author vcard inline-items">
                                    <img src="/img/avatar4-sm.jpg" alt="author">
                                    <div class="author-date">
                                        <a class="h6 post__author-name fn" href="#">Chris Greyson</a>
                                        <div class="post__date">
                                            <time class="published" datetime="2017-03-24T18:18">
                                            1 hour ago
                                            </time>
                                        </div>
                                    </div>
                                </div>
                                <p>Dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit.</p>
                            </li>
                        </ul>
                    </div>
                    <form class="comment-form inline-items">
                        <div class="post__author author vcard inline-items">
                            <img src="/img/avatar73-sm.jpg" alt="author">
                            <div class="form-group with-icon-right ">
                                <textarea class="form-control" placeholder="Press Enter to post..." ></textarea>
                            </div>
                        </div>
                    </form>
                    */?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Window-popup Open Photo Popup V2 -->

@push('javascript')
<script type="text/javascript">
    var likesIcon = $('#likes-icon');

    likesIcon.click(function() {    
        var likesLoading = $('#likes-loading');
        likesLoading.show();
        likesIcon.hide();

        var response = ajax('{{route('media.like')}}', 'POST', {id: $(this).data('video-id')})
        response
        .done(function(data) {
            likesLoading.hide();
            likesIcon.show();
            $('#likes').text(data.likes); 
            if (true === data.liked) {
                $(videoElement).data('liked', 1);
                color = '#FF5E3A';
            } else {
                $(videoElement).data('liked', 0);
                color = '#c2c5d9';
            }
            $('#likes-icon').css({'fill': color, 'color': color});
            
        })
        .fail(function(xhr) {
            likesLoading.hide();
            likesIcon.show();
        });
    });
</script>
@endpush