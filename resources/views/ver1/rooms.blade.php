@extends('layouts.template')


@section('title')
สูตรบาคาร่า5ดาว
@stop

@section('stylesheet')

@stop('stylesheet')

@section('content')

<div id="main" class="layout-column flex">
    <div class="chakra-container-page3">
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
                        <img class="img-fluid" src="{{ url('/home/assets/img/Rectangle_4.png') }}" style="width: 96px; height: 45px; ">
                        <p class="text-yello-p4">เลือกห้อง</p>
                    </a>
                </div>
                <div class="box-height-10"></div>
                <div class="card-body">
                <div class="row">

                    @if(isset($objs))
                    @foreach($objs as $u)
                    <div class="col-4 col-4-new">
                        <div class="text-center">
                            <a href="{{ url('game-room-'.$u->casino.'-'.$u->room) }}">
                                <img class="img-fluid" src="{{ url('/home/assets/img/ranking.png') }}">
                                <p class="text-racking-p4">{{ $u->percent }}%</p>
                                <p class="text-racking-room-p4"> ห้อง {{ $u->room }} </p>
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
