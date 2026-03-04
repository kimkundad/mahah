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
            <a href="{{ url('/welcome') }}">
                <img class="img-fluid logo_website" src="{{ get_site_logo() }}?v{{ time() }}">
            </a>
                
            @if(isset($objs))
                @foreach($objs as $u)

                    <a href="{{ url('games/'.$u->id) }}">
                        <div class="text-center">
                         <img class="img-fluid contain_img" src="{{ url('images/game/category/'.$u->image) }}">
                        </div>
                        <div class="text-center">
                                <img class="img-fluid" src="{{ url('/home/assets/img/btn_white.png') }}" style="height: 36px; margin-top: -165px;">
                                <p class="text-yello2">{{ $u->cat_name }}</p>
                        </div>
                    </a>

                @endforeach
            @endif

           
            {{-- <a href="./page7.html">
                <img class="img-fluid contain_img_2" src="{{ url('/home/assets/img/Slot.png') }}" >
                <div class="text-center">
                    
                        <img class="img-fluid" src="{{ url('/home/assets/img/btn_white.png') }}" style="height: 36px; margin-top: -165px;">
                        <p class="text-yello2">สูตรแฮกสล็อต</p>
                   
                </div>
            </a> --}}
            <div class="box-height-10"></div>
        </div>
    </div>
</div>


@endsection

@section('scripts')

@stop('scripts')
