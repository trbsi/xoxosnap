<?php

namespace App\Web\Coins\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Exception;
use Illuminate\Support\Facades\Auth;

class CoinController extends Controller
{
    public function showBuyCoinsForm(Request $request)
    {   
        return view('web.coins.coin.show-buy-coins-form');
    }

    public function processCoinsOrder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'coins' => 'required|integer|min:100',
        ]);

        if ($validator->fails()) {
            $request->session()->flash('error', __('general/site.something_went_wrong_check_inputs'));
            return redirect()
                ->route('coins.show-buy-coins-form')
                ->withErrors($validator)
                ->withInput();
        }

        try {
            return redirect(sprintf('/?coins=%s&user_id=%s&access_token=%s', $request->coins, Auth::id(), base64_encode(env('CCBILL_ACCESS_KEY'))));
        } catch (Exception $e) {
            abort(400);
        }
    }
}
