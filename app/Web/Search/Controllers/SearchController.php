<?php

namespace App\Web\Search\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Web\Search\Repositores\Search\Search\SearchRepository;
use App\Web\Search\Constants\SearchConstants;

class SearchController extends Controller
{
    public function search(
        Request $request,
        SearchRepository $searchRepository
    ) {
        $result = $searchRepository->search($request->term, $request->type);
        return view('web.search.search.search-results', [
            'result' => $result,
            'term' => $request->term,
            'type' => $request->type ?? 'users',
            'searchTypeUsers' => SearchConstants::SEARCH_USER,
            'searchTypeMedia' => SearchConstants::SEARCH_MEDIA,
        ]);
   }
}
