@extends('layouts.template')


@section('title')
สูตรบาคาร่า ใช้ฟรี ตลอดวัน แม่นมาก อัตราชนะสูงสุด 100%
@stop

@section('stylesheet')

@stop('stylesheet')

@section('content')

<div id="main" class="layout-column flex">
    <div class="chakra-container-page5">
        <div id="content" class="flex ">
            <div class="box-height-20"></div>
            <div class="d-flex justify-content-between pad-l-r">
                <a href="{{ url('welcome') }}">
                    <img class="img-fluid" src="{{ url('/home/assets/img/heng1g/page 3/กลับคาสิโน.png') }}" style="height: 30px; width:99px;" />
                </a>
                <a href="{{ url('/logout') }}">
                    <img class="img-fluid" src="{{ url('/home/assets/img/heng1g/page 3/ออกจากระบบ.png') }}" style="height: 30px; width:101px;">
                </a>
            </div>
            <a>
                <img class="img-fluid logo_website3" src="{{ get_site_logo() }}?v{{ time() }}">
            </a>
            
                <div class="text-center">
                    <a href="#">
                        <img class="img-fluid" src="{{ url('/home/assets/img/heng1g/page 3/เลือกห้องที่ต้องการ.png') }}" style=" height: 60px; width:360px ">
                    </a>
                </div>
                <div class="box-height-5"></div>
                <div class="card-body" style=" padding-top: 0px;">
                <div class="row">

                    @if(isset($objs))
                    @foreach($objs as $u)
                    <div class="col-12" style="margin-bottom: 15px; height:52px">
                        <div class="text-center">
                            <a href="{{ url('game-room-'.$u->casino.'-'.$u->room) }}">
                                <img class="img-fluid" style="width:345px; height:52px" src="{{ url('/home/assets/img/heng1g/page 3/สถานะ - ห้อง.png') }}">
                                <div class="d-flex justify-content-around" style="margin-top:-45px">
                                    <div class="d-flex flex-column">
                                        <p class="text-table-to">โต๊ะ {{ $u->room }}</p>
                                        <p class="text-table-name-game"> {{ $game->game_name }}</p>
                                    </div>
                                    <div>
                                        <p id="room-percent-{{ $u->room }}" class="text-table-win-black">อัตราชนะ {{ $u->percent }}%</p>
                                    </div>
                                </div>
                                {{-- <p >{{ $u->percent }}%</p>
                                <p > ห้อง {{ $u->room }} </p> --}}
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

<div class="modal fade" id="loadingModal" tabindex="-1">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content" style="background-color: transparent;">
            <div class="modal-body" id="modalBody">
                <div class="row">
                  <div class="col-12">
                    <div class="loader">Loading...</div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="white text-center">
                            <span id="loadingMessage">กำลังวิเคราะห์ผลห้อง 1 ...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')

<script type="text/javascript">

    var selectedRoom = 0;
    var room = '';
    
    $(document).ready(function() {
        
      randomPercent();
      setInterval(function() {
        randomPercent();
        $('#loadingModal').modal('show');

        setInterval(function() {
        hideModal('#loadingModal');
      }, 1200);

      }, 30 * 1000);

      


function randomPercent() {
  $.ajax("{{ url('/rooms/room_percents?casino='.$game->game_name_short) }}", {
    contentType: 'application/json',
    dataType: 'json',
    success: function (data) {
      console.log(data);
      let roomIds = $("[id^='room-percent-']").map(function() {
        return this.id;
      }).get();
      for (var i = 0; i < roomIds.length; i++) {
        let percent = getRandomInt(75,95)
        $('#' + roomIds[i]).html('อัตราชนะ ' + percent + '%');
      }
    },
  });
}

function getRandomInt(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min + 1)) + min;
}

function hideModal(id) {
  $(id).modal('hide');
  $('body').removeClass('modal-open');
  $('.modal-backdrop').remove();
}

    });

</script>

@stop('scripts')
