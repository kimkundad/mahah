@extends('layouts.template')


@section('title')
สูตรบาคาร่า ใช้ฟรี ตลอดวัน แม่นมาก อัตราชนะสูงสุด 100%
@stop

@section('stylesheet')

@stop('stylesheet')

@section('content')


<div id="main" class="layout-column flex">
    <div class="chakra-container-page3">
        <div id="content" class="flex ">
            <div class="box-height-20"></div>
            <div class="d-flex  justify-content-between pad-l-r">
                
                <a href="{{ url('/logout') }}">
                    <img class="img-fluid" src="{{ url('/home/assets/img/heng1g/page 2/logout_2.png') }}" style="height: 30px; width:99px;">
                </a>
                <a href="{{ url('/welcome') }}">
                    <img class="img-fluid logo_website3x" src="{{ get_site_logo() }}?v{{ time() }}">
                </a>
            </div>
            
                
                <div class="box-height-10"></div>
                <div class="card-body" style="margin-top: 20px; margin-bottom:130px">
                    
                    <div style="position: relative">
                        <div class="img_playy text-center">
                            <img class="img-fluid " src="{{ url('/home/assets/img/heng1g/page 2/dragon.png') }}" style="width: 200px" />
                        </div>
                    </div>
                    
                   
            
                @if(isset($objs))
                
                @foreach($objs as $u)

              
                        <div class="text-center">
                            @if($u->cat_id == 1)
                            <a href="{{ url('rooms?casino='.$u->game_name_short) }}">
                                <img class="img-fluid item_games itemx{{$i}}" src="{{ url('images/game/game/'.$u->game_image) }}">
                            </a>
                            @endif
                            
                        </div>
                <?php $i++; ?>
                @endforeach
                @endif
                    
            
                </div>
                <div class="text-center d-flex justify-content-end">
                    <a href="#" style="position: relative; top: -50px; right: -8px;">
                        <img class="img-fluid" src="{{ url('/home/assets/img/heng1g/page 2/สมาชิกออนไลน์.png') }}" style="height: 48px; width:158px ">
                        <p id="online-user" class=" text-yello-p4" style="margin-right:10px; color: #dcb756; font-size: 13px; margin-top: -32px;">{{ get_user_online() }} ออนไลน์</p>
                    </a>
                </div>
                {{-- <div class="d-flex justify-content-end " style="">
                    <div class="text-center">
                        <a href="#">
                            <img class="img-fluid" src="{{ url('/home/assets/img/heng1g/page 2/สมาชิกออนไลน์.png') }}" style=" height: 45px; ">
                            <p class="text-online-p5 myuser_online" style="margin-right:10px; color: #dcb756;">{{ get_user_online() }} ออนไลน์</p>
                        </a>
                    </div>
                </div> --}}
        </div>
    </div>
</div>


@endsection

@section('scripts')

<script type="text/javascript">

$(document).ready(function() {

    randomOnlinePercent();
    setInterval(function(){ 
      randomOnlinePercent();
    }, 10 * 1000);

function randomOnlinePercent() {
    $.ajax("{{ url('/api/game/online_user') }}", {
      contentType: 'application/json',
      dataType: 'json',
      success: function (data) {
        $("#online-user").html( data.count + ' ออนไลน์');
      },
    });
  }

});

</script>

@stop('scripts')
