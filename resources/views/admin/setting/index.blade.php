@extends('admin.layouts.template')

@section('title')
<title>Website Settings</title>
@stop

@section('stylesheet')
@stop('stylesheet')

@section('content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Website Settings</h1>
                </div>
            </div>
        </div>

        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <form id="kt_account_profile_details_form" class="form" method="POST" action="{{ url('api/post_setting') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="card card-xl-stretch mb-5 mb-xl-8">
                        <div class="card-body border-top p-9">
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">Site Name</label>
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="name_website" class="form-control form-control-lg form-control-solid" value="{{ $objs->name_website }}">
                                </div>
                            </div>

                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">Page Title</label>
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="facebook_title" class="form-control form-control-lg form-control-solid" value="{{ $objs->facebook_title }}">
                                </div>
                            </div>

                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">Meta Description / OG Description</label>
                                <div class="col-lg-8 fv-row">
                                    <textarea name="facebook_detail" rows="3" class="form-control form-control-lg form-control-solid">{{ $objs->facebook_detail }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">Meta Author</label>
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="meta_author" class="form-control form-control-lg form-control-solid" value="{{ $objs->meta_author }}">
                                </div>
                            </div>

                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">Meta Keywords</label>
                                <div class="col-lg-8 fv-row">
                                    <textarea name="meta_keywords" rows="2" class="form-control form-control-lg form-control-solid">{{ $objs->meta_keywords }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">OG URL</label>
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="og_url" class="form-control form-control-lg form-control-solid" value="{{ $objs->og_url }}">
                                </div>
                            </div>

                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">Banner URL</label>
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="google_analytic" class="form-control form-control-lg form-control-solid" value="{{ $objs->google_analytic }}">
                                </div>
                            </div>

                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">Email</label>
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="email" class="form-control form-control-lg form-control-solid" value="{{ $objs->email }}">
                                </div>
                            </div>

                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">Phone</label>
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="phone" class="form-control form-control-lg form-control-solid" value="{{ $objs->phone }}">
                                </div>
                            </div>

                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">LINE OA Name</label>
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="line_oa" class="form-control form-control-lg form-control-solid" value="{{ $objs->line_oa }}">
                                </div>
                            </div>

                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">LINE OA URL</label>
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="line_oa_url" class="form-control form-control-lg form-control-solid" value="{{ $objs->line_oa_url }}">
                                </div>
                            </div>

                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">Website Logo</label>
                                <div class="col-lg-8">
                                    <div class="image-input image-input-outline" data-kt-image-input="true">
                                        <div class="image-input-wrapper" style="background-image: url({{ get_site_logo() }}); width:380px; height:120px"></div>
                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change">
                                            <i class="bi bi-pencil-fill fs-7"></i>
                                            <input type="file" name="site_logo" accept=".png, .jpg, .jpeg, .gif, .webp" />
                                            <input type="hidden" name="avatar_remove" />
                                        </label>
                                    </div>
                                    <div class="form-text">Allowed: png, jpg, jpeg, gif, webp</div>
                                </div>
                            </div>

                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">Favicon</label>
                                <div class="col-lg-8">
                                    <div class="image-input image-input-outline" data-kt-image-input="true">
                                        <div class="image-input-wrapper" style="background-image: url({{ get_favicon_img() }}); width:120px; height:120px"></div>
                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change">
                                            <i class="bi bi-pencil-fill fs-7"></i>
                                            <input type="file" name="favicon_image" accept=".png, .jpg, .jpeg, .ico, .webp" />
                                            <input type="hidden" name="avatar_remove" />
                                        </label>
                                    </div>
                                    <div class="form-text">Recommended size: 32x32 or 64x64</div>
                                </div>
                            </div>

                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">OG Image</label>
                                <div class="col-lg-8">
                                    <div class="image-input image-input-outline" data-kt-image-input="true">
                                        <div class="image-input-wrapper" style="background-image: url({{ get_facebook_img() }}); width:380px; height:200px"></div>
                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change">
                                            <i class="bi bi-pencil-fill fs-7"></i>
                                            <input type="file" name="facebook_image" accept=".png, .jpg, .jpeg, .webp" />
                                            <input type="hidden" name="avatar_remove" />
                                        </label>
                                    </div>
                                    <div class="form-text">Recommended size: 1200x630</div>
                                </div>
                            </div>

                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">Banner Image</label>
                                <div class="col-lg-8">
                                    <div class="image-input image-input-outline" data-kt-image-input="true">
                                        <div class="image-input-wrapper" style="background-image: url({{ get_banner_img_url() }}); width:380px; height:200px"></div>
                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change">
                                            <i class="bi bi-pencil-fill fs-7"></i>
                                            <input type="file" name="banner_his" accept=".png, .jpg, .jpeg, .webp" />
                                            <input type="hidden" name="avatar_remove" />
                                        </label>
                                    </div>
                                    <div class="form-text">Allowed: png, jpg, jpeg, webp</div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <button type="reset" class="btn btn-light btn-active-light-primary me-2">Reset</button>
                            <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@stop('scripts')
