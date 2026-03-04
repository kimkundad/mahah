@extends('admin.layouts.template')

@section('title')
<title>สูตรบาคาร่า5ดาว -สูตรบาร์ที่ดีที่สุดและแม่นยำที่สุดในไทย อันดับ 1</title>
<meta name="description" content=" สูตรบาคาร่า5ดาว -สูตรบาร์ที่ดีที่สุดและแม่นยำที่สุดในไทย อันดับ 1">
@stop
@section('stylesheet')

<style>
    .symbol>img {
    width: 70px;
    height: 70px;
}
    </style>

@stop('stylesheet')

@section('content')

    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Toolbar-->
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <!--begin::Toolbar container-->
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                    <!--begin::Page title-->
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <!--begin::Title-->
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            เกมส์ทั้งหมดทั้งหมด</h1>
                        <!--end::Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ url('dashboard') }}" class="text-muted text-hover-primary">จัดการ</a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">เกมส์ทั้งหมด</li>
                            <!--end::Item-->
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page title-->
                    <!--begin::Actions-->
                    <div class="d-flex align-items-center gap-2 gap-lg-3">
                        <a href="{{ url('admin/games/create') }}" class="btn btn-sm fw-bold btn-primary" >
                            <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2023-01-26-051612/core/html/src/media/icons/duotune/arrows/arr017.svg-->
                            <span class="svg-icon svg-icon-muted svg-icon-1hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.3" d="M11 13H7C6.4 13 6 12.6 6 12C6 11.4 6.4 11 7 11H11V13ZM17 11H13V13H17C17.6 13 18 12.6 18 12C18 11.4 17.6 11 17 11Z" fill="currentColor"/>
                            <path d="M21 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H21C21.6 2 22 2.4 22 3V21C22 21.6 21.6 22 21 22ZM17 11H13V7C13 6.4 12.6 6 12 6C11.4 6 11 6.4 11 7V11H7C6.4 11 6 11.4 6 12C6 12.6 6.4 13 7 13H11V17C11 17.6 11.4 18 12 18C12.6 18 13 17.6 13 17V13H17C17.6 13 18 12.6 18 12C18 11.4 17.6 11 17 11Z" fill="currentColor"/>
                            </svg>
                            </span>
                            <!--end::Svg Icon-->
                            สร้างใหม่
                        </a>
                    </div>
                    <!--end::Actions-->
                </div>
                <!--end::Toolbar container-->
            </div>
            <!--end::Toolbar-->
            <!--begin::Content-->
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-xxl">
                    
                    <div class="card card-xl-stretch mb-5 mb-xl-8">
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold fs-3 mb-1">เกมส์ทั้งหมด</span>
                                <span class="text-muted mt-1 fw-semibold fs-7"> เกมส์ {{ count($objs) }}</span>
                            </h3>
                        </div>
                        <div class="card-body py-3">

                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table align-middle gs-0 gy-3">
                                    <!--begin::Table head-->
                                    <thead>
                                        <tr>
                                            <th class="p-0 w-50px"></th>
                                            <th class="p-0 "></th>
                                            <th>หมวดหมู่</th>
                                            <th class="p-0 ">จำนวนห้อง</th>
                                            <th class="p-0 ">status</th>
                                            <th class="p-0 "></th>
                                        </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody>
                                        @isset($objs)
                                            @foreach ($objs as $item)
                                        
                                        <tr id="{{$item->id_q}}">
                                            <td>
                                                <div class="symbol symbol-80px">
                                                  <a href="{{url('admin/games/'.$item->id_q.'/edit')}}">
                                                    <img src="{{ url('images/game/game/'.$item->game_image) }}" alt="" style="height:80px">
                                                  </a>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{url('admin/games/'.$item->id_q.'/edit')}}" class="text-dark fw-bold text-hover-primary mb-1 fs-6">{{ $item->game_name }}</a>
                                            </td>
                                            <td> 
                                                {{ $item->cat_name }}
                                               </td>
                                           <td> 
                                            {{ $item->options }}
                                           </td>
                                           
                                            <td>
                                                <div class="form-check form-check-solid form-switch form-check-custom fv-row">
                                                    <input class="form-check-input w-45px h-30px" type="checkbox" id="allowmarketing" name="status" 
                                                    @if($item->status1 == 1)
                                                    checked="checked"
                                                    @endif
                                                    value="1"/>
                                                    <label class="form-check-label" for="allowmarketing"></label>
                                                </div>
                                            </td>
                                            <td class="text-end">
                                                <div class="d-flex justify-content-end flex-shrink-0">
                                                    <a href="{{url('admin/games/'.$item->id_q.'/edit')}}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                        <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                        <span class="svg-icon svg-icon-3">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
                                                                <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </a>
                                                    <a href="{{ url('api/del_games/'.$item->id_q) }}" onclick="return confirm('Are you sure?')" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                                        <span class="svg-icon svg-icon-3">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
                                                                <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
                                                                <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>

                                            @endforeach

                                        @endisset
                                       
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                            </div>
                       
                            @include('admin.pagination.default', ['paginator' => $objs])
                        
                        </div>
                    </div>
                    
                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Content wrapper-->
        <!--begin::Footer-->
        <div id="kt_app_footer" class="app-footer">
            <!--begin::Footer container-->
            <div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
                
            </div>
            <!--end::Footer container-->
        </div>
        <!--end::Footer-->
    </div>

@endsection

@section('scripts')


<script type="text/javascript">
    $(document).ready(function(){
      $("input:checkbox").change(function() {
        var user_id = $(this).closest('tr').attr('id');
    
        $.ajax({
                type:'POST',
                url:'{{url('api/api_post_status_games')}}',
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                data: { "user_id" : user_id },
                success: function(data){
                  if(data.data.success){
    
    
                    Swal.fire({
                        text: "ระบบได้ทำการอัพเดทข้อมูลสำเร็จ!",
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
    
    
    
                  }
                }
            });
        });
    });
    </script>

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
        if (winCount == 1) {
          $('.modal-result-win').attr("src" , "/assets/win1-bfb68d687690718349afc8080bb468c5e5115a6ca040b04f83490bab8c4c04a3.png" );
        } else if (winCount == 2) {
          $('.modal-result-win').attr("src" , "/assets/win2-cb3327f6be65e408cc0f5b738d8e445932a1c391c4994a4b297a6fc2b6ff9644.png" );
        } else if (winCount == 3) {
          $('.modal-result-win').attr("src" , "/assets/win3-23839659849bd4ef4f046b10a05e1bb54133c7e870059637de36b543d4af83dd.png" );
        } else if (winCount == 4) {
          $('.modal-result-win').attr("src" , "/assets/win4-cf6c85cbcd404a06a28139424e20465f63635b81569dc7cd7c30121f28fe2f80.png" );
        } else if (winCount == 5) {
          $('.modal-result-win').attr("src" , "/assets/win5-34a708d03cb96bf8e38eaa6427c0af262bd1d0ea2772face0688fe0ec6974434.png" );
        }
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
        $('#coin').attr("src" , "/assets/ic_b-304a43368f7b2f6aff6564e4e01154b3d695b9a738b09b40dacbfc9eb9da534b.png" );
        $('#mcoin').attr("src" , "/assets/ic_b-304a43368f7b2f6aff6564e4e01154b3d695b9a738b09b40dacbfc9eb9da534b.png" );
      } else {
        $('#coin').attr("src" , "/assets/ic_p-6ec7d7ab9e1db4235997b06ea124fc56cf65fc0c4a1ffde57c65f96fe7a2e2a9.png" );
        $('#mcoin').attr("src" , "/assets/ic_p-6ec7d7ab9e1db4235997b06ea124fc56cf65fc0c4a1ffde57c65f96fe7a2e2a9.png" );
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
  
      var newRowM = $('<tr id="row' + round + '">');
      var cols = "<td class='text-center white' style='border: 0px; font-size: 22px'> ผลการลงทุนครั้งที่ " + round + "</td>";
      if (status == 'WIN') {
        cols += "<td class='text-right p-0' style='border: 0px;'><img src='/assets/result_win-b252a749265cdb906b715523a9736d27c78ad4e0ffa3e6aeb91c569a7c5cf8ec.png' class='mr-0' style='height: 50px;'></td>"
      } else {
        cols += "<td class='text-right p-0' style='border: 0px;'><img src='/assets/result_lose-586a688278c79ad0242b6dc3fe9c1c73477907a940325764eea21988b92632e3.png' class='mr-0' style='height: 50px;'></td>"
      }
      cols += "</tr>"
      newRowM.append(cols);
  
      $('#tableResults > tbody').prepend(newRow);
      $('#mtableResults > tbody').prepend(newRowM);
  
      $('#round-count').text('ครั้งที่ ' + (round + 1));
      $('#mround-count').text('ครั้งที่ ' + (round + 1));
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
  
      $('#tableResults > tbody').html("");
      $('#mtableResults > tbody').html("");
  
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
