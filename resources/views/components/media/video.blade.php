<?php 
$icon = rand(1,2)%2 === 0 ? 'olymp-locked' : 'olymp-play-icon';
?>

<div class="col col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
    <div class="ui-block video-item">
        <div class="video-player">
            <img src="/img/video10.jpg" alt="photo">
            <a data-toggle="modal" data-target="#open-photo-popup-v2" class="play-video">
                <svg class="{{$icon}}">
                    <use xlink:href="/assets/svg-icons/sprites/icons.svg#{{$icon}}"></use>
                </svg>
            </a>
            <div class="overlay overlay-dark"></div>
        </div>
        <div class="ui-block-content video-content">
            <?php if(rand(1,2)%2===0):  ?>
            <div class="progressbar-continer-vid {{$progressbar ?? ''}}"></div>
            <?php endif; ?>
            <a href="#" class="h6 title">Rock Garden Festival - Day 3</a>
            <time class="published" datetime="2017-03-24T18:18">18:44</time>
        </div>
    </div>
</div>


@component('components.media.video-popup')
@endcomponent
