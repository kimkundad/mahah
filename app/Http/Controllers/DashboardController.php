<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\game;
use App\Models\room;

class DashboardController extends Controller
{
    //

    public function index(){

        $pro = User::count();
        $user_day = User::whereDate('created_at', date('Y-m-d'))->count();
        $game = Game::count();
        $room = room::count();
        return view('admin.dashboard.index', compact(
            'pro',
            'user_day',
            'game',
            'room'
        ));
    }


}
