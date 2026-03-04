@extends('layouts.template')


@section('title')
สูตรบาคาร่า ใช้ฟรี ตลอดวัน แม่นมาก อัตราชนะสูงสุด 100%
@stop

@section('stylesheet')

<style>
    .progress {
    border-radius: 0.25rem;
    overflow: visible;
    background-color: rgb(255 255 255);
}
</style>

@stop('stylesheet')


@section('content')

<div id="main" class="layout-column flex">
    <div class="chakra-container-page6">
        <div id="content" class="flex ">
            <div class="box-height-20"></div>
            <div class="d-flex justify-content-between pad-l-r">
                <a href="{{ url('rooms?casino='.$objs->casino) }}">
                    <img class="img-fluid" src="{{ url('/home/assets/img/heng1g/page 3/กลับคาสิโน.png') }}" style="height: 30px; width:99px;" />
                </a>
                <a href="{{ url('/logout') }}">
                  <img class="img-fluid" src="{{ url('/home/assets/img/heng1g/page 3/ออกจากระบบ.png') }}" style="height: 30px; width:101px;">
                </a>
            </div>
            <div class="box-height-20"></div>
            <div class="box-height-20"></div>
            <div style="margin-top:35px">
                <div class="text-center" style="position: relative; z-index: 1;">
                    <a href="#">
                        <img class="img-fluid" src="{{ url('/home/assets/img/page5/time_head1.png') }}" style=" height: 32px; width: 220px ">
                        @php

                                                $now = time(); // or your date as well
                                                $your_date = strtotime(Auth::user()->birthday);
                                                $datediff = $your_date - $now;
                                                $sumday = round($datediff / (60 * 60 * 24));

                                                $time1 = new DateTime(Auth::user()->birthday);
                                                $time2 = new DateTime(date("Y-m-d H:i"));
                                                $interval = $time1->diff($time2);
                        @endphp
                        <p id="online-user" class="text-white-p5"></p>
                    </a>
                </div>
                <div class="text-center" style=" z-index: 2; margin-top:-80px">
                  <div style>
                    <img class="img-fluid" src="{{ url('/home/assets/img/heng1g/page 4/status ห้อง และ ค่าย.png') }}" style="height: 150px;  width: 348px">
                  </div>
                </div>
                <div class="d-flex justify-content-center" style="margin-top: -73px;">
                    <div class="d-flex justify-content-around" style="width: 320px;">
                        <div>
                          <img class="img-fluid" src="{{ url('images/game/game/'.$game->game_image) }}" style="width: 60px; height: 60px">
                        </div>
                        <div class="d-flex flex-column text-center" style="padding-top: 13px; margin-left:-10px">
                          <p style="margin-left:-10px" class="text-table-to-w">ROOM</p>
                          <p style="margin-left:-10px" class="text-table-name-game-w"> {{ $objs->room }}</p>
                        </div>
                        <div class="d-flex" style="padding-top: 22px; margin-left:-10px">
                          <p class="text-table-name-game-wv" id="round"> รอบที่ 1</p>
                          <p class="text-table-name-game-wv" style="margin-left: 5px" id="round-count"> ไม้ที่ 1</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-height-20"></div>
            <div class="box-height-20"></div>
                <div class="card-body" style="padding-top:0px">
                    
                    <div>
                        <img id="ecoin" style="width: 100%" src="{{ url('/home/assets/img/heng1g/page 4/โครงสีเทา 1.png') }}" alt="E coin d">
                    </div>
                    <div style="margin-top: -95px">
                        <div class="d-flex flex-column text-center">
                            <img class="img-fluid mx-auto" src="{{ url('/home/assets/img/heng1g/page 4/ออกผล.png') }}" style="width: 175px">
                            <img style="margin-top: -170px" id="coin" class="coin mx-auto flip" src="{{ url('/home/assets/img/heng1g/page 4/player_1.png') }}" alt="Ic p">
                        </div>
                    </div>
                    <div class="box-height-20"></div>
                    <div class="text-center" >
                      <img class="img-fluid" id="mcoin" src="{{ url('/home/assets/img/heng1g/page 4/text สถานะ player.png') }}" style=" width: 60%">
                    </div>

                    <div>
                        <div>
                            <img class="img-fluid" src="{{ url('/home/assets/img/heng1g/page 4/tab ปุ่ม ชนะ แพ้ เสมอ.png') }}" style=" width: 100%">
                        </div>
                        <div class="d-flex justify-content-around p-20" style="margin-top: -105px">
                            <div class="p-10">
                                <a onclick="win()">
                                  <img class="img-fluid" src="{{ url('/home/assets/img/heng1g/page 4/ชนะ.png') }}" style=" width: 100%">
                                </a>
                            </div>
                            <div class="p-10">
                              <a onclick="equal()">
                                <img class="img-fluid" src="{{ url('/home/assets/img/heng1g/page 4/เสมอ.png') }}" style=" width: 100%">
                              </a>
                            </div>
                            <div class="p-10">
                              <a onclick="nextCoin()">
                                <img class="img-fluid" src="{{ url('/home/assets/img/heng1g/page 4/แพ้.png') }}" style=" width: 100%">
                              </a>
                            </div>
                        </div>
                    </div>

                    <div class="p-20" style="margin-top: -45px;">
                        <div id="tableResultsx" class="box-black" style="padding-top:20px; padding-bottom:20px">

                            {{-- <div>
                                  <img class="img-fluid w100" src="{{ url('/home/assets/img/heng1g/page 4/สถิติ-สำเร็จ-copy.png') }}" >
                                  <div class="mt-42">
                                    <div class="d-flex justify-content-around">
                                        <div ></div>
                                        <div>
                                          <p class="text-table-name-game-w pt-10"> ไม้ที่ 1</p>
                                        </div>
                                        <div>
                                          <img class="img-fluid w100 hi30" src="{{ url('/home/assets/img/heng1g/page 4/result_win.png') }}" >
                                        </div>
                                    </div>
                                  </div>
                            </div>
                            <div>
                                <img class="img-fluid w100" src="{{ url('/home/assets/img/heng1g/page 4/สถิติ-สำเร็จ-copy.png') }}" >
                                <div class="mt-42">
                                  <div class="d-flex justify-content-around">
                                      <div ></div>
                                      <div>
                                        <p class="text-table-name-game-w pt-10"> ไม้ที่ 1</p>
                                      </div>
                                      <div>
                                        <img class="img-fluid w100 hi30" src="{{ url('/home/assets/img/heng1g/page 4/result_lose.png') }}" >
                                      </div>
                                  </div>
                                </div>
                            </div> --}}

                        </div>
                    </div>
                   

                    <div class="box-height-10"></div>
                    {{-- <div class="d-flex flex-column justify-content-center" >
                        <div class="text-center">
                            <img src="{{ url('/home/assets/img/page5/ครั้งที่-ผลที่ได้.png') }}" style="width: 100%;">
                        </div>
                        <div class="row">
                            <p class="col-8 text-center black_text_p5">ครั้งที่</p>
                            <p class="col-4 text-center black_text_p5">ผลที่ได้</p>
                        </div>
                    </div> --}}
                    {{-- <div id="tableResultsx">

                    </div> --}}

                    {{-- <div class="d-flex flex-column justify-content-center" >
                        <div class="text-center">
                            <img src="{{ url('/home/assets/img/page5/ผลการลงทุนครั้งที่-WIN.png') }}" class="result_role">
                        </div>
                        <div class="row">
                            <p class="col-8 text-center white_text_p5">ผลการลงทุนครั้งที่ 1</p>
                            <p class="col-4 text-center white_text_p5"><img src="{{ url('/home/assets/img/page5/WIN.png') }}" class="mywin" ></p>
                        </div>
                    </div> --}}
                    <div class="box-height-40"></div>
                    
                   

                </div>
        </div>
    </div>
</div>


<div id="winModal" class="modal fade" data-backdrop="true">
    <div class="modal-dialog " style="width: 100%; ">
        <div class="modal-content" style="background-color: transparent;">
          <div class="text-center">
            <img class="img-fluid" src="{{ url('/home/assets/img/heng1g/page 4/logo เวลา ชนะ.png') }}" alt="Reset" style="width: 200px">
          </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>


<div id="loseModal" class="modal fade" data-backdrop="true">
    <div class="modal-dialog " style="width: 100%; ">
        <div class="modal-content " style="background-color: transparent;">
            <img class="img-fluid" onclick="forceReset()" src="{{ url('/img/reset.png') }}" alt="Reset">
            <img class="img-fluid" onclick="restart()" src="{{ url('/img/restart.png') }}" alt="Restart">
        </div>
        <!-- /.modal-content -->
    </div>
</div>


@endsection

@section('scripts')

<script type="text/javascript">


    var casino = "";
    var room = 1;
    var round = 1;
    var coinRound = 1;
    var resultRound = undefined;
    var coin = '';
    var numberOfCoin = 5;
    var shouldIgnore = false;
    var previousCoin = '';
    var sameCoinCount = 0;
  
    $(document).ready(function() {
      randomRoomPercent();
      randomOnlinePercent();
      setInterval(function(){ 
        randomRoomPercent();
        randomOnlinePercent();
      }, 60 * 1000);
  
      $("#wait").hide();
      $('#winModal').on('hidden.bs.modal', function (e) {
         randomExtraCoin();
      })
  
      casino = "sa";
      $('#sidebar').toggleClass('active');
      $('#sidebarCollapse').on('click', function () {
          $('#sidebar').toggleClass('active');
      });
  
      $('#bet').val("");
        randomCoin();
        randomPercent();
      });
  
    function changeRoom(room) {
      $("#loadingMessage").text("กำลังวิเคราะห์ผลห้อง " + room + " ...");
      $('#loadingModal').modal('show');
      setTimeout(function() {
        $('#loadingModal').modal('hide');
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
        window.location = '/game?casino=' + casino + '&room=' + room
      }, 5000);
    }
  
    function win() {
      addRow('WIN');
      nextRound();
      $('#winModal').modal('show');

      setTimeout(function(){
        $('#winModal').modal('hide');      
      }, 2000);

      reset();
    }
  
    function lose() {
      if (coinRound == 4) {
        $('#loseModal').modal('show');
        reset();
        addRow('LOSE');
        nextRound();
        // randomExtraCoin();
      }
    }
  
    function equal() {
      randomCoin();
      randomPercent();
    }
  
    function restart() {
      $('#loseModal').modal('hide');
    }
  
    function nextRound() {
      // playMusic();
      if (!shouldIgnore) {
        round += 1;
        winCount = (round % 5 + 1)
        $('.modal-result-win').attr("src" , "{{ url('/img/win1-bfb68d687690718349afc8080bb468c5e5115a6ca040b04f83490bab8c4c04a3.png') }}" );
      } else {
        shouldIgnore = false;
      }
    }
  
    function nextCoin() {
      if (coinRound < 4) {
        coinRound += 1;
  
        var obj = $('#round').text('รอบที่ ' + coinRound);
        var obj = $('#mround').text('รอบที่ ' + coinRound);
        // obj.html(obj.html().replace(/\n/g,'<br/>'));
  
        randomCoin();
        randomPercent();
      } else {
        coinRound = 1;
        reset();
        addRow('LOSE');
        nextRound();
        $('#loseModal').modal('show');
      }
    }
  
    function randomCoin() {
      var random = Math.floor(Math.random() * 10)
  
      coin = random % 2 == 0 ? 'B' : 'P';
      if (coin == 'B') {
        $('#coin').attr("src" , "{{ url('/home/assets/img/heng1g/page 4/banker_1.png') }}" );
        $('#mcoin').attr("src" , "{{ url('/home/assets/img/heng1g/page 4/text สถานะ banker.png') }}" );
      } else {
        $('#coin').attr("src" , "{{ url('/home/assets/img/heng1g/page 4/player_1.png') }}" );
        $('#mcoin').attr("src" , "{{ url('/home/assets/img/heng1g/page 4/text สถานะ player.png') }}" );
      }
    }
  
    function randomExtraCoin(isWin) {
      $("#ecoin").attr("src" , "{{ url('/home/assets/img/heng1g/page 4/โครงสุ่มสี.gif') }}" );
      setTimeout(function() {
        var randomHasExtraCoin = getRandomInt(1, 100);
        console.log('randomHasExtraCoin', randomHasExtraCoin)
        if (randomHasExtraCoin % 2 == 0) {
          var randomExtraCoin = getRandomInt(1, 3);
          if (randomExtraCoin == 1) {
            $("#ecoin").attr("src" , "{{ url('/home/assets/img/heng1g/page 4/โครงไพ่คู่.png') }}" );
          } else if (randomExtraCoin == 2) {
            $("#ecoin").attr("src" , "{{ url('/home/assets/img/heng1g/page 4/โครงเสมอ.png') }}" );
          } else if (randomExtraCoin == 3) {
            $("#ecoin").attr("src" , "{{ url('/home/assets/img/heng1g/page 4/โครงไพ่ป็อก.png') }}" );
          }
        } else {
          $("#ecoin").attr("src" , "{{ url('/home/assets/img/heng1g/page 4/โครงสีเทา 1.png') }}" );
        }
      }, 5 * 1000);
    }
  
    function randomOnlinePercent() {
      $.ajax("{{ url('/api/game/online_user') }}", {
        contentType: 'application/json',
        dataType: 'json',
        success: function (data) {
          $("#online-user").html('จำนวนผู้ใช้งาน ' + data.count);
        },
      });
    }
  
    function randomRoomPercent() {
      $.ajax("/rooms/room_percents?casino=sa", {
        contentType: 'application/json',
        dataType: 'json',
        success: function (data) {
          let roomIds = $("[id^='room-percent-']").map(function() {
            return this.id;
          }).get();
          for (var i = 0; i < roomIds.length; i++) {
            let percent = data[i]['percent'];
            $('#' + roomIds[i]).html('' + percent + '%');
            $('#m-' + roomIds[i]).html('' + percent + '%');
          }
        },
      });
    }
  
    function randomPercent() {
      var random = getRandomInt(75, 99);
      $('.progress-bar').attr('aria-valuenow', random).css('width', random + '%');
      $('#progress-value').text(random + '%');
      $('#mprogress-value').text(random + '%');
    }
  
    function addRow(status) {
  
      var newRow = $('<tr id="row' + round + '">');
      var cols = "<td class='text-center white d-flex justify-content-center align-items-center' style='border: 0px; font-size: 22px'> ผลการลงทุนครั้งที่ " + round + "</td>";
      if (status == 'WIN') {
        cols += "<td class='text-center' style='border: 0px;'><img src='/assets/result_win-b252a749265cdb906b715523a9736d27c78ad4e0ffa3e6aeb91c569a7c5cf8ec.png' class='mr-0' style='height: 50px;'></td>"
      } else {
        cols += "<td class='text-center' style='border: 0px;'><img src='/assets/result_lose-586a688278c79ad0242b6dc3fe9c1c73477907a940325764eea21988b92632e3.png' class='mr-0' style='height: 50px;'></td>"
      }
      cols += "</tr>"
      newRow.append(cols);

        var bgwin = '{{ url('/home/assets/img/heng1g/page 4/สถิติ-สำเร็จ-copy.png') }}';
        if (status == 'WIN') {
            var sumwin = '{{ url('/home/assets/img/heng1g/page 4/result_win.png') }}';
        }else{
            var sumwin = '{{ url('/home/assets/img/heng1g/page 4/result_lose.png') }}';
        }

    //    var newRowx = '<div class="d-flex flex-column justify-content-center" ><div class="text-center"><img src="'+bgwin+'" class="result_role"></div><div class="row"><p class="col-8 text-center white_text_p5">ผลการลงทุนครั้งที่ '+ round +'</p><p class="col-4 text-center white_text_p5"><img src="'+ sumwin +'" class="mywin" ></p></div></div>'
        var newRowx = '<div><img class="img-fluid w100" src="'+bgwin+'" ><div class="mt-42"><div class="d-flex justify-content-around"><div ></div><div><p class="text-table-name-game-w pt-10"> ไม้ที่ '+ round +'</p></div><div><img class="img-fluid w100 hi30" src="'+ sumwin +'" ></div></div></div></div>'
    
    
        //   var newRowM = $('<tr id="row' + round + '">');
    //   var cols = "<td class='text-center white' style='border: 0px; font-size: 22px'> ผลการลงทุนครั้งที่ " + round + "</td>";
    //   if (status == 'WIN') {
    //     cols += "<td class='text-right p-0' style='border: 0px;'><img src='/assets/result_win-b252a749265cdb906b715523a9736d27c78ad4e0ffa3e6aeb91c569a7c5cf8ec.png' class='mr-0' style='height: 50px;'></td>"
    //   } else {
    //     cols += "<td class='text-right p-0' style='border: 0px;'><img src='/assets/result_lose-586a688278c79ad0242b6dc3fe9c1c73477907a940325764eea21988b92632e3.png' class='mr-0' style='height: 50px;'></td>"
    //   }
    //   cols += "</tr>"
    //   newRowM.append(cols);
  
      $('#tableResultsx').prepend(newRowx);
    //   $('#mtableResults > tbody').prepend(newRowM);
  
       $('#round-count').text('ไม้ที่ ' + (round + 1));
    //   $('#mround-count').text('ครั้งที่ ' + (round + 1));
    }
  
    function reset() {
      $('#loseModal').modal('hide');
      coinRound = 1;
      var obj = $('#round').text('รอบที่ ' + coinRound);
      var obj = $('#mround').text('รอบที่ ' + coinRound);
      // obj.html(obj.html().replace(/\n/g,'<br/>'));
  
      randomCoin();
      randomPercent();
    }
  
    function forceReset() {
      $('#loseModal').modal('hide');
      coinRound = 1;
      var obj = $('#round').text('รอบที่ ' + coinRound);
      var obj = $('#mround').text('รอบที่ ' + coinRound);
  
      round = 1;
      $('#round-count').text('ไม้ที่ ' + round);
      $('#mround-count').text('ไม้ที่ ' + round);
      // obj.html(obj.html().replace(/\n/g,'<br/>'));
  
      $('#tableResultsx').html("");
    //   $('#mtableResults > tbody').html("");
  
      randomCoin();
      randomPercent();
    }
  
    function getRandomInt(min, max) {
      min = Math.ceil(min);
      max = Math.floor(max);
      return Math.floor(Math.random() * (max - min + 1)) + min;
    }
  
  </script>

@stop('scripts')