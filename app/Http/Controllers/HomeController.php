<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\category;
use App\Models\game;
use App\Models\room;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }

    // public function welcome(){

    //     $objs = category::where('status', 1)->get();
    //     $data['objs'] = $objs;
        
    //     return view('welcome', compact('objs'));
    // }

    // public function games($id){

    //     $objs = DB::table('games')->select(
    //         'games.*',
    //         'games.id as id_q',
    //         'games.status as status1',
    //         'categories.*',
    //         )
    //         ->leftjoin('categories', 'categories.id',  'games.cat_id')
    //         ->where('games.cat_id', $id)
    //         ->get();
        
    //     return view('games', compact('objs'));

    // }

    public function welcome(){

        $objs = DB::table('games')->select(
                    'games.*',
                    'games.id as id_q',
                    'games.status as status1',
                    'categories.*',
                    )
                    ->leftjoin('categories', 'categories.id',  'games.cat_id')
                    ->where('games.cat_id', 1)
                    ->get();

                //    dd($objs);
                $i = 1;
                
                return view('games', compact('objs', 'i'));

    }

    
    public function game_room(Request $request){

      //  dd($request->id);
        
        $objs = room::where('casino', $request->id)->where('room', $request->room)->first();
     
        $game = game::where('id', $objs->game_id)->first();
      //  dd($objs);

        return view('game-room', compact('objs', 'game'));

    }

    public function room_percents(Request $request){

        //   $request->casino
   
        $objs = room::where('casino', $request->casino)->get();
   
        return response()->json(
           $objs
         );
   
       }

    public function rooms(Request $request){

        $game = game::where('game_name_short', $request->casino)->first();
        $objs = room::where('casino', $request->casino)->get();

        return view('rooms', compact('objs', 'game'));
    }

    public function rooms_slot(Request $request){

        $game = game::where('game_name_short', $request->casino)->first();
        $objs = room::where('casino', $request->casino)->get();
  
        return view('rooms-slot', compact('objs', 'game'));
    }

    public function online_user(){
        

        return response()->json([
            'count' => rand(2500,3500)
          ]);

    }

    public function call_percent(){

        $room = room::where('room_status', 1)->get();
        if(isset($room)){
            foreach($room as $u){

                // $per = rand(75,100);

                room::where('id', $u->id)
                ->update([
                    'percent' => rand(75,100)
                    ]);

            }
        }
        

        return response()->json([
            'data' => [
              'msg' => 'success'
            ]
          ]);


    }
}
