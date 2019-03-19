<div class="container">
    <div class="row">
        <!-- Main Content -->
        <main class="col col-xl-12 order-xl-12 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
            <div class="ui-block">
                <!-- News Feed Form  -->
                <div class="news-feed-form">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active inline-items" data-toggle="tab" href="#video" role="tab" aria-expanded="true">

                                <span>{{__('web/home/home.performer.add_video')}}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link inline-items" data-toggle="tab" href="#story" role="tab" aria-expanded="false">
                                <span>{{__('web/home/home.performer.add_story')}}</span>
                            </a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                       	@include('web.home.home.home.performer-home-page.upload-media-forms.upload-video')
                       	@include('web.home.home.home.performer-home-page.upload-media-forms.upload-story')
                    </div>
                </div>
                <!-- ... end News Feed Form  -->			
            </div>
        </main>
        <!-- ... end Main Content -->
    </div>
</div>
