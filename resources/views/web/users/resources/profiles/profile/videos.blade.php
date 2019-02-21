<div class="container">
    <div class="row">
        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div id="stories"></div>
        </div>
    </div>
    <div class="row">
        <?php for($i=0;$i<6;$i++):?>
            <?php $icon = ($i%2===0) ? 'olymp-locked' : 'olymp-play-icon'; ?>
        <div class="col col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
            <div class="ui-block video-item">
                <div class="video-player">
                    <img src="/img/video10.jpg" alt="photo">
                    <a data-toggle="modal" data-target="#open-photo-popup-v2" class="play-video">
                        <svg class="<?=$icon?>">
                            <use xlink:href="/assets/svg-icons/sprites/icons.svg#<?=$icon?>"></use>
                        </svg>
                    </a>
                    <div class="overlay overlay-dark"></div>
                </div>
                <div class="ui-block-content video-content">
                    <?php if($i%2===0):  ?>
                    <div class="progressbar-continer-vid"></div>
                    <?php endif; ?>
                    <a href="#" class="h6 title">Rock Garden Festival - Day 3</a>
                    <time class="published" datetime="2017-03-24T18:18">18:44</time>
                </div>
            </div>
        </div>
        <?php endfor; ?>
        <a id="load-more-button" href="#" class="btn btn-control btn-more" data-load-link="posts-load-moreV2.html" data-container="posts-grid-1">
            <svg class="olymp-three-dots-icon"><use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
        </a>
    </div>
</div>
