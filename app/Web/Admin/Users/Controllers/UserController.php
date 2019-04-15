<?php

namespace App\Web\Admin\Users\Controllers;

use App\Http\Controllers\Controller;
use App\Web\Admin\Users\Repositories\User\Get\GetAllUsersRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function get(Request $request, GetAllUsersRepository $getAllUsersRepository)
    {
        return view('admin.web.users.user.get.get', [
            'users' => $getAllUsersRepository->getAllUsersPaginated($request->all())
        ]);
    }
}
