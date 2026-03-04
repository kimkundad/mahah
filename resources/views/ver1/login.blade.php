@extends('layouts.template')


@section('title')
สูตรบาคาร่า5ดาว
@stop

@section('stylesheet')

@stop('stylesheet')

@section('content')

<div id="main" class="layout-column flex">
    <div class="chakra-container">
        <div id="content" class="flex ">
            <div class="box-height-20"></div>
            <img class="img-fluid logo_website" src="{{ get_site_logo() }}?v{{ time() }}">
            <div class="box-height-20"></div>
            <form method="POST" id="myForm" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="card-body">

                @if ($message = Session::get('expired'))
                <div class="d-flex">
                    <div class="alert alert-warning" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12" y2="16"></line></svg>
                        <span class="mx-2">อายุใช้งานของคุณหมด กรุณาติดต่อเจ้าหน้าที่</span>
                    </div>
                </div>
                @endif
                <div class="box-height-10"></div>

                    <div class="d-flex">
                        <label class="width-25 col-form-label"><img class="img-fluid" src="{{ url('/home/assets/img/User.png') }}" style="height: 36px;"></label>
                        <div class="width-75">
                            <input type="text" class="form-control" placeholder="ป้อนยูสเซอร์เนม" name="username" value="{{ old('username') }}" required autofocus>
                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>ไม่พบยูสเซอร์เนมหรือพาสเวิร์ดผิด </strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="box-height-10"></div>
                    <div class="d-flex">
                        <label class="width-25 col-form-label"><img class="img-fluid" src="{{ url('/home/assets/img/Password.png') }}" style="height: 36px;"></label>
                        <div class="width-75">
                            <input type="password" class="form-control" placeholder="รหัสผ่าน" name="password" required >
                            <div class="box-height-10"></div>
                            <div class="d-flex justify-content-end">
                                <a href="#" onclick="myFunction()" ><img class="img-fluid" src="{{ url('/home/assets/img/LOGIN.png') }}" style="height: 36px;"></a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </form>
        </div>
        <div class="d-footer">
       
            <div class="chakra-container-f">
                <div class="bg-footer">
                    <div class="d-flex justify-content-between">
                        <a class="nav-footer-a">
                            <i class="fa fa-home"></i>
                            <p class="chakra-text-footer">หน้าแรก</p>
                        </a>
                        <a href="{{ get_line_url() }}" class="nav-footer-a" target="_blank">
                            <i class="fa fa-user"></i>
                            <p class="chakra-text-footer">สมัครสมาชิก</p>
                        </a>
                    </div>
                </div>
                <a href="{{ get_banner_url() }}">
                    <img class="img-fluid" src="{{ get_banner_img_url() }}">
                </a>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')

    <script>
        function myFunction() {
            document.getElementById("myForm").submit();
        }
</script>

@stop('scripts')
