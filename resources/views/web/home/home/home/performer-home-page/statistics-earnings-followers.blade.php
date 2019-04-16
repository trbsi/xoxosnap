<div class="container">
	<div class="row">
		<div class="col col-xl-4 order-xl-4 col-lg-6 order-lg-4 col-md-6 col-sm-12 col-12 performer-tour-current-balance">
			<div class="ui-block">
				<div class="ui-block-content">
					<ul class="statistics-list-count">
						<li>
							<div class="points">
								<span>
									{{__('web/home/home.performer.current_earnings')}}
								</span>
							</div>
							<div class="count-stat">
								<div>NC{{$currentCoins}} <span class="indicator positive"> {{__('general/site.coins')}}</span></div>
								<div>${{$currentMoney}} <span class="indicator positive"> {{__('general/site.dollars')}}</span></div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col col-xl-4 order-xl-4 col-lg-6 order-lg-4 col-md-6 col-sm-12 col-12 performer-tour-total-balance">
			<div class="ui-block">
				<div class="ui-block-content">
					<ul class="statistics-list-count">
						<li>
							<div class="points">
								<span>
									{{__('web/home/home.performer.total_earnings')}}
								</span>
							</div>
							<div class="count-stat">
								<div>NC{{$totalCoins}} <span class="indicator positive"> {{__('general/site.coins')}}</span></div>
								<div>${{$totalMoney}} <span class="indicator positive"> {{__('general/site.dollars')}}</span></div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col col-xl-4 order-xl-4 col-lg-6 order-lg-4 col-md-6 col-sm-12 col-12 performer-tour-followers">
			<div class="ui-block">
				<div class="ui-block-content">
					<ul class="statistics-list-count">
						<li>
							<div class="points">
								<span>
									{{__('web/home/home.performer.followers')}}
								</span>
							</div>
							<div class="count-stat">
								{{$followersCount}}
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
