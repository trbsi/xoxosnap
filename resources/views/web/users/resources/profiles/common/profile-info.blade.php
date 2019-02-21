<!-- Top Header-Profile -->
<div class="container">
    <div class="row">
        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="ui-block profile-info">
                <div class="top-header">
                    <!--
                        <div class="top-header-thumb">
                            <img src="/img/top-header1.jpg" alt="nature">
                        </div>
                        -->
                    <div class="profile-section">
                        <div class="row">
                            <div class="col col-lg-5 col-md-5 col-sm-12 col-12">
                                <ul class="profile-menu">
                                    <li>
                                        <a href="{{route('user.profile', ['username' => $username])}}" class="active">Snaps</a>
                                    </li>
                                    <li>
                                        <a href="{{route('user.about', ['username' => $username])}}">About</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col col-lg-5 ml-auto col-md-5 col-sm-12 col-12">
                                <ul class="profile-menu">
                                    <li>
                                        <a href="#">100K followers</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="control-block-button">
  
                            <div class="btn btn-control more">
                                <img src="/img/badge5.png" alt="author">
                                <ul class="more-dropdown more-with-triangle triangle-top-right" style="left:0">
                                    <li>
                                        <span>Expert Filmaker</span> 
                                        <span style="white-space: pre-wrap; font-weight: normal;">You have uploaded more than 80 videos to your profile.</span>      
                                    </li>
                                </ul>
                            </div>

                            <div class="btn btn-control bg-blue more">
                                <svg class="olymp-plus-icon">
                                    <use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-plus-icon"></use>
                                </svg>
                                 <ul class="more-dropdown more-with-triangle triangle-top-right">
                                    <li>
                                        <span>Follow</span>
                                    </li>
                                </ul>
                            </div>
                                  
                            <div class="btn btn-control bg-primary more">
                                <svg class="olymp-settings-icon">
                                    <use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-settings-icon"></use>
                                </svg>
                                <ul class="more-dropdown more-with-triangle triangle-top-right">
                                    <li>
                                        <a href="29-YourAccount-AccountSettings.html">Account Settings</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="top-header-author">
                        <a href="02-ProfilePage.html" class="author-thumb">
                        <img src="/img/author-main1.jpg" alt="author">
                        </a>
                        <div class="author-content">
                            <a href="02-ProfilePage.html" class="h4 author-name">James Spiegel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ... end Top Header-Profile -->