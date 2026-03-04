@extends('layouts.template')


@section('title')
สูตรบาคาร่า5ดาว
@stop

@section('stylesheet')

<style>
    .col-4-new {
    padding-right: 2px !important;
    padding-left: 2px !important;
    min-height: 90px;
}
</style>

@stop('stylesheet')

@section('content')


<div id="main" class="layout-column flex">
    <div class="chakra-container-page5">
        <div id="content" class="flex ">
            <div class="box-height-20"></div>
            <div class="d-flex justify-content-between pad-l-r">
                <a href="{{ url('games/'.$game->cat_id) }}">
                    <img class="img-fluid" src="{{ url('/home/assets/img/page5/change_room.png') }}" style="height: 35px; width:82px;" />
                </a>
                <a href="{{ url('/logout') }}">
                    <img class="img-fluid" src="{{ url('/home/assets/img/page5/Logout.png') }}" style="height: 35px; width:82px;">
                </a>
            </div>
            <a href="{{ url('/welcome') }}">
                <img class="img-fluid logo_website3" src="{{ get_site_logo() }}?v{{ time() }}">
            </a>
            <div class="text-center">
                <a href="#">
                    <img class="img-fluid" src="{{ url('/home/assets/img/page5/time_head1.png') }}" style=" height: 32px; ">
                    @php

                                            $now = time(); // or your date as well
                                            $your_date = strtotime(Auth::user()->birthday);
                                            $datediff = $your_date - $now;
                                            $sumday = round($datediff / (60 * 60 * 24));
                     @endphp
                    <p class="text-white-p5">เหลือระยะเวลาอีก : {{ $sumday }} วัน</p>
                </a>
                <p class="text-online-p5"><img class="img-fluid" src="{{ url('/home/assets/img/page5/user.png') }}" style=" height: 15px; "> ออนไลน์ : {{ get_user_online() }} คน</p>
            </div>
            
                <div class="card-body" style="padding: 10px 6px 80px 6px;">
                    

                    <div class="d-flex justify-content-around flex-wrap">

                        @if(isset($objs))
                        @foreach($objs as $u)
                        <div class=" col-4-new">
                            <div class="text-center">
                                <a href="#">
                                    <div class="bg-game-slot" style="width: 117px; padding: 6px 6px; }}');">
                                        <div class="d-flex justify-content-between">
                                            <img src="{{ url('images/game/room/'.$u->room_image) }}" style="width: 38px; height: 38px; border-radius: 5px;">
                                            <div class="text-center">
                                                <p class="gameName-p6"> {{ $u->room }} </p>
                                                <p class="winrate"> อัตราการชนะ </p>
                                                <p class="percen_winrate"> {{ $u->percent }}% </p>
                                            </div>
                                        </div>
                                        <div style="">
                                            <div class="circle" style=" border: 1px solid #fff;">
                                                <div class="progress circle" style="height:12px; ">
                                                    <div class="progress-bar circle gd-warning" data-toggle="tooltip" title="{{ $u->percent }}%" style="width: {{ $u->percent }}%"></div>
                                                </div>
                                                <p class="text-white-pre-p5">{{ $u->percent }}%</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        
                       
                        
                    </div>
                  

                </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')

@stop('scripts')
