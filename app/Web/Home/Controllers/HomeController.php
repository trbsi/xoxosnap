<?php

namespace App\Web\Home\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Web\Home\Repositores\Home\Home\Above18Repository;
use App\Web\Home\Repositores\Home\Home\HomeRepository;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Media;
use App\Web\Home\Repositores\Home\Explore\ExploreRepository;

class HomeController extends Controller
{
    public function home(
        Request $request,
        Above18Repository $above18Repository,
        HomeRepository $homeRepository
    )
    {
        $user = User::where('id', Auth::id())->with(['coin', 'profile'])->first();
        $params = [
            'user' => $user,
            'profileTypePerfomer' => User::USER_TYPE_PERFORMER,
            'profileTypeViewer' => User::USER_TYPE_VIEWER,
        ];
        $params['javascript'] = $above18Repository->getJavascriptParam();
        $homepageData = $homeRepository->getDataForHomePage($user);

        return view('web.home.home.home.home', array_merge($params, $homepageData));
    }

    public function explore(Request $request, ExploreRepository $exploreRepository)
    {
        $exploreType = $request->type ?? Media::ORDER_TYPE_RECENT;
        $data = $exploreRepository->getDataForExplorePage((int)$exploreType);
        $data['exploreType'] = (int)$exploreType;

        return view('web.home.home.explore.explore', $data);
    }
}
