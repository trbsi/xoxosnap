<?php

namespace App\Web\External\Resources\Discord\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiscordController extends Controller
{
    public function showDiscord(Request $request)
    {	
    	return view('web.external.resources.discord.discord.show-discord.show-discord');
    }
}
