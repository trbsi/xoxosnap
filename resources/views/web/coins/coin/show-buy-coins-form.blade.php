<?php
use App\Models\Coin;
?>

@extends('layouts.site.core')

@section('title', __('web/coins/coins.show_buy_coins_form.buy_coins'))

@section('body')
<div class="container">
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">{{__('web/coins/coins.show_buy_coins_form.buy_coins')}}</h6>
				</div>
				<div class="ui-block-content">
                    <form class="needs-validation" id="buy-coins-form" method="POST" action="{{route('coins.process-coins-order')}}">
						@csrf
						<div class="row">
							<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="form-group label-floating">
									<label class="control-label">{{__('web/coins/coins.show_buy_coins_form.number_of_coins')}}</label>
									<input class="form-control" type="number" name="coins" min="100" required>
									@if ($errors->has('coins'))
										<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('coins') }}</strong>
										</span>
									@endif
								</div>
								<div>
									<b>{{__('web/coins/coins.show_buy_coins_form.total_in_dollars')}}: <span  id="in-dollars"></span></b>
								</div>
								<br>
							</div>
							<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<button class="btn btn-md btn-green" type="submit">{{__('web/coins/coins.show_buy_coins_form.buy')}}</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('javascript')
	<script>
		$('#buy-coins-form input[name="coins"]').keyup(function() {
		    var inDollars = $(this).val() / {{Coin::COIN_COST}};
            $('#in-dollars').text('$'+inDollars);
        });
	</script>
@endsection
