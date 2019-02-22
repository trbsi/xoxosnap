<div class="container">
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="ui-block">
				<div class="ui-block-title inline-items">
					<div class="btn btn-control btn-control-small bg-orange">
						<svg class="olymp-trophy-icon"><use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-trophy-icon"></use></svg>
					</div>
					<h6 class="title">Popular</h6>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container">
    <div class="row">
        <?php for($i=0;$i<6;$i++): ?>
            @component('components.media.video', ['progressbar' => 'progressbar-continer-vid-popular'])
            @endcomponent
        <?php endfor; ?>
    </div>
</div>

@push('javascript')
    @component('components.media.javascript.progressbar', ['cssClass' => '.progressbar-continer-vid-popular'])
    @endcomponent
@endpush