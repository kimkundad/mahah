@extends('layouts.template')


@section('title')
สูตรบาคาร่า5ดาว
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
    <div class="chakra-container-page5">
        <div id="content" class="flex ">
            <div class="box-height-20"></div>
            <div class="d-flex justify-content-between pad-l-r">
                <a href="{{ url('rooms?casino='.$objs->casino) }}">
                    <img class="img-fluid" src="{{ url('/home/assets/img/page5/change_room.png') }}" style="height: 35px; width:82px;" />
                </a>
                <a href="{{ url('/logout') }}">
                    <img class="img-fluid" src="{{ url('/home/assets/img/page5/Logout.png') }}" style="height: 35px; width:82px;">
                </a>
            </div>
            <a href="{{ url('/welcome') }}">
                <img class="img-fluid logo_website4" src="{{ get_site_logo() }}?v{{ time() }}">
            </a>
            <div class="box-height-20"></div>
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
            
                <div class="card-body" style="padding-top:0px">
                    <div class="d-flex flex-column justify-content-center" >
                        <div class="text-center">
                            <img src="{{ url('/home/assets/img/page5/Rectangle.png') }}" style="width: 100%;">
                        </div>
                        <div class="d-flex justify-content-around">
                            <p class="bar_3_round_p5">{{ $objs->room }}</p>
                            <p class="bar_3_round_p5" id="round-count">ครั้งที่ 1</p>
                            <p class="bar_3_round_p5" id="round">รอบที่ 1</p>
                        </div>
                    </div>
                    <div class="box-height-10"></div>
                    <div class="d-flex justify-content-around">
                        <div>
                            <div class="text-center">
                                <img id="mcoin" class="coin " src="{{ url('/home/assets/img/page5/B.png') }}" >
                            </div>
                        
                            <div class="box-height-10"></div>
                            <div class="progress circle" style="height:12px; ">
                                <div class="progress-bar circle gd-warning" data-toggle="tooltip" title="{{ $objs->percent }}%" style="width: {{ $objs->percent }}%"></div>
                            </div>
                            <div class="text-center">
                                <p id="progress-value" class="percen_p5">{{ $objs->percent }}%</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="text-center">
                                    <a onclick="nextCoin()" >
                                        <img src="{{ url('/home/assets/img/page5/แถบ-ไม้ต่อไป-เสมอ-ชนะ.png') }}" style="width: 80px;" >
                                        <p class="text-yello-p5-stick">ไม้ต่อไป</p>
                                    </a>
                                </div>
                                <div class="text-center">
                                    <a onclick="equal()">
                                        <img src="{{ url('/home/assets/img/page5/แถบ-ไม้ต่อไป-เสมอ-ชนะ.png') }}" style="width: 80px;" >
                                        <p class="text-yello-p5-stick">เสมอ</p>
                                    </a>
                                </div>
                                <div class="text-center">
                                    <a onclick="win()">
                                        <img src="{{ url('/home/assets/img/page5/แถบ-ไม้ต่อไป-เสมอ-ชนะ.png') }}" style="width: 80px;" >
                                        <p class="text-yello-p5-stick">สำเร็จ</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end flex-column">
                            <div class="item_R-p5">
                                <img src="{{ url('/home/assets/img/page5/ไพ่คู่.png') }}" style="width: 55px;">
                            </div>
                            <div class="item_R-p5">
                                <img src="{{ url('/home/assets/img/page5/เสมอ.png') }}" style="width: 55px;">
                            </div>
                            <div class="item_R-p5">
                                <img src="{{ url('/home/assets/img/page5/ไพป็อก.png') }}" style="width: 55px;">
                            </div>
                            <div class="item_R-p5">
                            <div class="box-height-10"></div>
                            <a>
                                <img src="{{ url('/home/assets/img/page5/รองรับทุกระบบ.png') }}" style="width: 75px;">
                            </a>
                            </div>
                        </div>
                    </div>

                    <div class="box-height-10"></div>
                    <div class="d-flex flex-column justify-content-center" >
                        <div class="text-center">
                            <img src="{{ url('/home/assets/img/page5/ครั้งที่-ผลที่ได้.png') }}" style="width: 100%;">
                        </div>
                        <div class="row">
                            <p class="col-8 text-center black_text_p5">ครั้งที่</p>
                            <p class="col-4 text-center black_text_p5">ผลที่ได้</p>
                        </div>
                    </div>
                    <div id="tableResultsx">

                    </div>

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
    <div class="modal-dialog " style="width: 100%; margin:0">
        <div class="modal-content " style="background-color: transparent;">
            <img class="img-fluid" src="{{ url('/img/win.png') }}" alt="Reset">
        </div>
        <!-- /.modal-content -->
    </div>
</div>


<div id="loseModal" class="modal fade" data-backdrop="true">
    <div class="modal-dialog " style="width: 100%;">
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
        // randomExtraCoin();
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
        $('#coin').attr("src" , "{{ url('/img/ic_b-304a43368f7b2f6aff6564e4e01154b3d695b9a738b09b40dacbfc9eb9da534b.png') }}" );
        $('#mcoin').attr("src" , "{{ url('/img/ic_b-304a43368f7b2f6aff6564e4e01154b3d695b9a738b09b40dacbfc9eb9da534b.png') }}" );
      } else {
        $('#coin').attr("src" , "{{ url('/img/ic_p-6ec7d7ab9e1db4235997b06ea124fc56cf65fc0c4a1ffde57c65f96fe7a2e2a9.png') }}" );
        $('#mcoin').attr("src" , "{{ url('/img/ic_p-6ec7d7ab9e1db4235997b06ea124fc56cf65fc0c4a1ffde57c65f96fe7a2e2a9.png') }}" );
      }
    }
  
    function randomExtraCoin(isWin) {
      $("#ecoin").attr("src" , "/assets/e_coin_r-3281a897b4e2791dc71b114b9ed7249a0eb8848c1f1f0ae52c3e1bd0858e80d2.gif" );
      $("#mecoin").attr("src" , "/assets/e_coin_r-3281a897b4e2791dc71b114b9ed7249a0eb8848c1f1f0ae52c3e1bd0858e80d2.gif" );
      setTimeout(function() {
        var randomHasExtraCoin = getRandomInt(1, 100);
        if (randomHasExtraCoin % 2 == 0) {
          var randomExtraCoin = getRandomInt(1, 3);
          if (randomExtraCoin == 1) {
            $("#ecoin").attr("src" , "/assets/e_coin_a_1-6690e5a39edf579b70f03a7a3cad582094fa873e1c7fa78cb3a4b5b0d994ed06.png" );
            $("#mecoin").attr("src" , "/assets/e_coin_a_1-6690e5a39edf579b70f03a7a3cad582094fa873e1c7fa78cb3a4b5b0d994ed06.png" );
          } else if (randomExtraCoin == 2) {
            $("#ecoin").attr("src" , "/assets/e_coin_a_2-61ff201698671236302b518049bc45a8aa660ba9c6778d87743c1201e5cf9556.png" );
            $("#mecoin").attr("src" , "/assets/e_coin_a_2-61ff201698671236302b518049bc45a8aa660ba9c6778d87743c1201e5cf9556.png" );
          } else if (randomExtraCoin == 3) {
            $("#ecoin").attr("src" , "/assets/e_coin_a_3-440f7144192ff79d375918e064097c986dbf94522b09690b22704dd9cacf40fb.png" );
            $("#mecoin").attr("src" , "/assets/e_coin_a_3-440f7144192ff79d375918e064097c986dbf94522b09690b22704dd9cacf40fb.png" );
          }
        } else {
          $("#ecoin").attr("src" , "/assets/e_coin_d-d63d8cc408997aafca540806e7eda73e0917b4749d9ebde6f161ef19f9f0bedf.png" );
          $("#mecoin").attr("src" , "/assets/e_coin_d-d63d8cc408997aafca540806e7eda73e0917b4749d9ebde6f161ef19f9f0bedf.png" );
        }
      }, 5 * 1000);
    }
  
    function randomOnlinePercent() {
      $.ajax("/game/online_user", {
        contentType: 'application/json',
        dataType: 'json',
        success: function (data) {
          $("#online-user").html('จำนวนผู้ใช้งาน ' + data.count);
          $("#m-online-user").html('จำนวนผู้ใช้งาน ' + data.count);
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

        var bgwin = '{{ url('/home/assets/img/page5/ผลการลงทุนครั้งที่-WIN.png') }}';
        if (status == 'WIN') {
            var sumwin = '{{ url('/home/assets/img/page5/WIN.png') }}';
        }else{
            var sumwin = '{{ url('/img/result_lose.png') }}';
        }

        var newRowx = '<div class="d-flex flex-column justify-content-center" ><div class="text-center"><img src="'+bgwin+'" class="result_role"></div><div class="row"><p class="col-8 text-center white_text_p5">ผลการลงทุนครั้งที่ '+ round +'</p><p class="col-4 text-center white_text_p5"><img src="'+ sumwin +'" class="mywin" ></p></div></div>'
  
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
  
       $('#round-count').text('ครั้งที่ ' + (round + 1));
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
      $('#round-count').text('ครั้งที่ ' + round);
      $('#mround-count').text('ครั้งที่ ' + round);
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
