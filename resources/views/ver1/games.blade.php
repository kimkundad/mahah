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
                <a href="{{ url('/welcome') }}">
                    <img class="img-fluid" src="{{ url('/home/assets/img/page5/change_back.png') }}" style="height: 35px; width:82px;" />
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
                        <img class="img-fluid" src="{{ url('/home/assets/img/Rectangle.png') }}" style="height: 36px; ">
                        <p class="text-yello-p3">เลือกค่ายเกมส์ที่ต้องการใช้สูตร</p>
                    </a>
                </div>
                <div class="box-height-10"></div>
                <div class="card-body">
                <div class="row" >

                @if(isset($objs))
                @foreach($objs as $u)

                    <div class="col-6 col-6-new ">
                        <div class="text-center">
                            @if($u->cat_id == 2)

                            <a href="{{ url('rooms_slot?casino='.$u->game_name_short) }}">
                                <img class="img-fluid" src="{{ url('images/game/game/'.$u->game_image) }}">
                                <img class="img-fluid" src="{{ url('/home/assets/img/page3/Click-Now.png') }}" style="height: 20px; margin-top: -60px;">
                            </a>

                            @else

                            <a href="{{ url('rooms?casino='.$u->game_name_short) }}">
                                <img class="img-fluid" src="{{ url('images/game/game/'.$u->game_image) }}">
                                <img class="img-fluid" src="{{ url('/home/assets/img/page3/Click-Now.png') }}" style="height: 20px; margin-top: -60px;">
                            </a>

                            @endif
                            
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
