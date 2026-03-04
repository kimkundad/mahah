<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\game;
use App\Models\room;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'room' => 'required',
           ]);

           $status = 0;
           if(isset($request['status'])){
               if($request['status'] == 1){
                   $status = 1;
               }
           }
           $room_hot = 0;
           if(isset($request['room_hot'])){
            if($request['room_hot'] == 1){
                $room_hot = 1;
            }
           }

           $image = $request->file('image');

           if($image == NULL){


            $objs = new room();
            $objs->room = $request['room'];
            $objs->casino = $request['casino'];
            $objs->percent = 75;
            $objs->game_id = $request['game_id'];
            $objs->cate_id = $request['cat_id'];
            $objs->room_hot = $room_hot;
            $objs->room_status = $status;
            $objs->save();

            
           }else{


            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

          $img = Image::make($image->getRealPath());
          $img->resize(400, 400, function ($constraint) {
          $constraint->aspectRatio();
            });
            $img->stream();
            Storage::disk('do_spaces')->put('game/room/'.$image->hashName(), $img, 'public');

            $objs = new room();
            $objs->room = $request['room'];
            $objs->casino = $request['casino'];
            $objs->percent = 75;
            $objs->game_id = $request['game_id'];
            $objs->cate_id = $request['cat_id'];
            $objs->room_hot = $room_hot;
            $objs->room_status = $status;
            $objs->room_image = $image->hashName();
            $objs->save();

           }
        
             

              return redirect(url('admin/games/'.$request['game_id'].'/edit'))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $objs = room::find($id);
        $game = game::where('id', $objs->game_id)->first();
        $data['game'] = $game;
        $data['url'] = url('admin/rooms/'.$id);
        $data['method'] = "put";
        $data['objs'] = $objs;
        return view('admin.rooms.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function api_post_status_rooms(Request $request){

        $user = room::findOrFail($request->user_id);

              if($user->room_status == 1){
                  $user->room_status = 0;
              } else {
                  $user->room_status = 1;
              }


      return response()->json([
      'data' => [
        'success' => $user->save(),
      ]
    ]);

     }

    public function update(Request $request, $id)
    {

        $status = 0;
        $room_hot = 0;
        if(isset($request['status'])){
            if($request['status'] == 1){
                $status = 1;
            }
        }
        if(isset($request['room_hot'])){
            if($request['room_hot'] == 1){
                $room_hot = 1;
            }
        }
        //
        $room = room::find($id);
        $game = game::where('id', $room->game_id)->first();

        $image = $request->file('image');

           if($image == NULL){

            $objs = room::find($id);
             $objs->room = $request['room'];
             $objs->percent = $request['percent'];
             $objs->room_status = $status;
             $objs->room_hot = $room_hot;
            $objs->save();


           }else{

            $img = DB::table('rooms')
          ->where('id', $id)
          ->first();

          $storage = Storage::disk('do_spaces');
          $storage->delete('game/room/' . $img->room_image, 'public');

          $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

          $img = Image::make($image->getRealPath());
          $img->resize(400, 400, function ($constraint) {
          $constraint->aspectRatio();
        });
        $img->stream();
        Storage::disk('do_spaces')->put('game/room/'.$image->hashName(), $img, 'public');

            $objs = room::find($id);
             $objs->room = $request['room'];
             $objs->percent = $request['percent'];
             $objs->room_status = $status;
             $objs->room_hot = $room_hot;
             $objs->room_image = $image->hashName();
            $objs->save();

           }

             

        return redirect(url('admin/games/'.$game->id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function del_rooms($id)
    {
        //
        $room = room::find($id);
        $game = game::where('id', $room->game_id)->first();
        
        $obj = room::find($id);
        $obj->delete();

        return redirect(url('admin/games/'.$game->id.'/edit'))->with('del_success','คุณทำการเพิ่มอสังหา สำเร็จ');

    }
}
