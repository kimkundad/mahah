@extends('admin.layouts.template')

@section('title')
<title>สูตรบาคาร่า5ดาว -สูตรบาร์ที่ดีที่สุดและแม่นยำที่สุดในไทย อันดับ 1</title>
    <meta name="description" content=" สูตรบาคาร่า5ดาว -สูตรบาร์ที่ดีที่สุดและแม่นยำที่สุดในไทย อันดับ 1">
@stop
@section('stylesheet')

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
                            แก้ไข User</h1>
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
                            <li class="breadcrumb-item text-muted">แก้ไข User</li>
                            <!--end::Item-->
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page title-->
                    
                    
                </div>
                <!--end::Toolbar container-->
            </div>
            <!--end::Toolbar-->
            <!--begin::Content-->
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <form id="kt_account_profile_details_form" class="form" method="POST" action="{{$url}}" enctype="multipart/form-data">
                        {{ method_field($method) }}
                        {{ csrf_field() }}
                        <div class="card card-xl-stretch mb-5 mb-xl-8">
                            
                            <div class="card-body border-top p-9">

                                <!--begin::Row-->
                                <div class="row mb-5" data-kt-buttons="true" data-kt-buttons-target=".form-check-image, .form-check-input">
                                    <!--begin::Col-->
                                    <div class="col-3">
                                        <label class="form-check-image 
                                        @if ($objs->avatar == '300-2.jpg')
                                        active
                                                @endif
                                                ">
                                            <div class="form-check-wrapper">
                                                <img src="{{ url('admin/assets/media/avatars/300-2.jpg') }}"/>
                                            </div>

                                            <div class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="radio" 
                                                @if ($objs->avatar == '300-2.jpg')
                                                    checked
                                                @endif
                                                value="300-2.jpg" name="option2"/>
                                                <div class="form-check-label">
                                                    Avatar 1
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                    <!--end::Col-->

                                    <!--begin::Col-->
                                    <div class="col-3">
                                        <label class="form-check-image @if ($objs->avatar == '300-1.jpg')
                                            active
                                                    @endif">
                                            <div class="form-check-wrapper">
                                                <img src="{{ url('admin/assets/media/avatars/300-1.jpg') }}"/>
                                            </div>

                                            <div class="form-check form-check-custom form-check-solid me-10">
                                                <input class="form-check-input" type="radio" value="300-1.jpg" 
                                                @if ($objs->avatar == '300-1.jpg')
                                                    checked
                                                @endif
                                                 name="option2" id="text_wow"/>
                                                <div class="form-check-label">
                                                    Avatar 2
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                    <!--end::Col-->

                                    <!--begin::Col-->
                                    <div class="col-3">
                                        <label class="form-check-image @if ($objs->avatar == '300-16.jpg')
                                            active
                                                    @endif">
                                            <div class="form-check-wrapper">
                                                <img src="{{ url('admin/assets/media/avatars/300-16.jpg') }}"/>
                                            </div>

                                            <div class="form-check form-check-custom form-check-solid me-10">
                                                <input class="form-check-input" type="radio" 
                                                @if ($objs->avatar == '300-16.jpg')
                                                    checked
                                                @endif
                                                 value="300-16.jpg" name="option2"/>
                                                <div class="form-check-label">
                                                    Avatar 3
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                    <!--end::Col-->

                                    <!--begin::Col-->
                                    <div class="col-3">
                                        <label class="form-check-image @if ($objs->avatar == '300-9.jpg')
                                            active
                                                    @endif">
                                            <div class="form-check-wrapper">
                                                <img src="{{ url('admin/assets/media/avatars/300-9.jpg') }}"/>
                                            </div>

                                            <div class="form-check form-check-custom form-check-solid me-10">
                                                <input class="form-check-input" type="radio" 
                                                @if ($objs->avatar == '300-9.jpg')
                                                    checked
                                                @endif
                                                value="300-9.jpg" name="option2"/>
                                                <div class="form-check-label">
                                                    Avatar 4
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                    <!--end::Col-->

                                </div>
                                <!--end::Row-->

                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">UserName </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="text" name="name" class="form-control form-control-lg form-control-solid" placeholder="Sangsom, Hongthong" value="{{ $objs->name }}">
                                    
                                        @if ($errors->has('name'))
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <div>{{ $errors->first('name') }}</div>
                                            </div>
                                        @endif
                                    </div>
                                    <!--end::Col-->
                                </div>

                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">เลือกวันหมดอายุ</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">

                                    

                                        <div class="input-group" id="kt_td_picker_custom_icons" data-td-target-input="nearest" data-td-target-toggle="nearest">
                                            <input id="kt_td_picker_custom_icons_input" name="startdate" value="{{ $objs->birthday }}" type="text" class="form-control" data-td-target="#kt_td_picker_custom_icons"/>
                                            <span class="input-group-text" data-td-target="#kt_td_picker_custom_icons" data-td-toggle="datetimepicker">
                                                <i class="bi bi-calendar-check fs-2"><span class="path1"></span><span class="path2"></span></i>
                                            </span>
                                        </div>
                                    
                                        @if ($errors->has('startdate'))
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <div>กรุณาเลือกวันหมดอายุ</div>
                                            </div>
                                        @endif
                                    </div>
                                    <!--end::Col-->
                                </div>


                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">เบอร์ติดต่อ</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="text" name="phone" class="form-control form-control-lg form-control-solid" placeholder="0958254752" value="{{ $objs->phone }}">
                                    
                                    </div>
                                    <!--end::Col-->
                                </div>


                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Role User</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <select class="form-select" name="role" aria-label="Select example">
                                            @isset($Role)
                                                @foreach ($Role as $item)
                                                    <option value="{{ $item->id }}" 
                                                        @if( $get_role->role_id == $item->id)
                                                        selected='selected'
                                                        @endif
                                                        >{{ $item->name }}</option>
                                                @endforeach
                                            @endisset
                                            
                                        </select>
                                        @if ($errors->has('email'))
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <div>กรุณากำหนด Role User</div>
                                            </div>
                                        @endif
                                    </div>
                                    <!--end::Col-->
                                </div>


                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">password</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <div class="input-group">
                                            <!--begin::Input-->
                                            <input id="kt_clipboard_1" type="text" class="form-control" placeholder="name@example.com" value="{{ $objs->code_user }}" />
                                            <!--end::Input-->
                                
                                            <!--begin::Button-->
                                            <a class="btn btn-light-primary" data-clipboard-target="#kt_clipboard_1">
                                                Copy
                                            </a>
                                            <!--end::Button-->
                                        </div>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <br>
                                <hr>
                                <br>
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">กรอกเมื่อจะเปลี่ยน password</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="password" name="password" class="form-control form-control-lg form-control-solid" placeholder="password กำหนด 8 ตัวขึ้นไป" value="{{old('password') ? old('password') : ''}}">
                                        @if ($errors->has('password'))
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <div>{{ $errors->first('password') }}</div>
                                            </div>
                                        @endif
                                    </div>
                                    <!--end::Col-->
                                </div>


                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6"> ยืนยัน password</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="password" name="password_confirmation" class="form-control form-control-lg form-control-solid" placeholder="password กำหนด 8 ตัวขึ้นไป" >
                                        @if ($errors->has('password_confirmation'))
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <div>{{ $errors->first('password_confirmation') }}</div>
                                            </div>
                                        @endif
                                    </div>
                                    <!--end::Col-->
                                </div>
                            

                            </div>
                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <button type="reset" class="btn btn-light btn-active-light-primary me-2">ยกเลิก</button>
                                <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">บันทึกข้อมูล</button>
                            </div>
                        </div>
                    </form>
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
                
                <!--end::Menu-->
            </div>
            <!--end::Footer container-->
        </div>
        <!--end::Footer-->
    </div>

@endsection

@section('scripts')

<!-- Popperjs -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha256-BRqBN7dYgABqtY9Hd4ynE+1slnEw+roEPFzQ7TRRfcg=" crossorigin="anonymous"></script>
<!-- Tempus Dominus JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/@eonasdan/tempus-dominus@6.7.7/dist/js/tempus-dominus.min.js" crossorigin="anonymous"></script>

<!-- Tempus Dominus Styles -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@eonasdan/tempus-dominus@6.7.7/dist/css/tempus-dominus.min.css" crossorigin="anonymous">

<script>
    
    new tempusDominus.TempusDominus(document.getElementById("kt_td_picker_custom_icons"), {
        localization: {
        locale: "de",
        startOfTheWeek: 1,
        format: "yyyy-MM-dd H:mm"
    },
    display: {
    icons: {
        time: "bi bi-alarm-fill fs-1",
        date: "bi bi-calendar-check fs-1",
        up: "bi bi-caret-up fs-1",
        down: "bi bi-caret-down fs-1",
        previous: "bi bi-arrow-left-circle-fill fs-1",
        next: "bi bi-arrow-right-circle-fill fs-1",
        today: "bi bi-calendar-heart fs-1",
        clear: "bi bi-trash3-fill fs-1",
        close: "bi bi-calendar-x fs-1",
    },
    buttons: {
        today: true,
        clear: true,
        close: true,
    },
    }
});

    const target = document.getElementById('kt_clipboard_1');
const button = target.nextElementSibling;

// Init clipboard -- for more info, please read the offical documentation: https://clipboardjs.com/
var clipboard = new ClipboardJS(button, {
    target: target,
    text: function() {
        return target.value;
    }
});

// Success action handler
clipboard.on('success', function(e) {
    const currentLabel = button.innerHTML;

    // Exit label update when already in progress
    if(button.innerHTML === 'Copied!'){
        return;
    }

    // Update button label
    button.innerHTML = 'Copied!';

    // Revert button label after 3 seconds
    setTimeout(function(){
        button.innerHTML = currentLabel;
    }, 3000)
});
</script>




@stop('scripts')
