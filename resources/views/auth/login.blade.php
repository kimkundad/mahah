@extends('layouts.template')


@section('title')
สูตรบาคาร่า ใช้ฟรี ตลอดวัน แม่นมาก อัตราชนะสูงสุด 100%
@stop

@section('stylesheet')

@stop('stylesheet')

@section('content')

<div id="main" class="layout-column flex">
    <div class="chakra-container">
        <div id="content" class="flex ">
            <div class="box-height-20"></div>
            <img class="img-fluid logo_website2" src="{{ get_site_logo() }}?v{{ time() }}">
            <form method="POST" id="myForm" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="card-body" style="padding: 1.25rem 0.5rem;">

                @if ($message = Session::get('expired'))
                <div class="d-flex">
                    <div class="alert alert-warning" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12" y2="16"></line></svg>
                        <span class="mx-2">อายุใช้งานของคุณหมด กรุณาติดต่อเจ้าหน้าที่</span>
                    </div>
                </div>
                @endif

                @error('username')
                <div class="text-center">
                <span class="invalid-feedback" role="alert">
                    <strong>ไม่พบยูสเซอร์เนมหรือพาสเวิร์ดผิด </strong>
                </span>
                </div>
                @enderror

                    <div class="d-flex justify-content-center">
                        <div class="bg_login">
                            <div class="d-flex" style="height: 270px">
                                <div class="align-self-center">
                                    <input type="text" class="form-control-img"  name="username" value="{{ old('username') }}" required >
                                    <input type="password" class="form-control-img2"  name="password" required >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center btn_sub">
                        <a href="#" onclick="myFunction()" ><img class="img-fluid" src="{{ url('/home/assets/img/heng1g/page_1/login.png') }}" style="height: 40px;"></a>
                    </div>

                </div>
            </form>
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
