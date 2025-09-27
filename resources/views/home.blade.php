
@extends('layout.master')
@section('content')
    <div class="relative min-h-screen bg-cover flex items-center justify-center" style="background-image: url('{{ asset('images/back.jpg') }}')">
<div class="absolute w-full h-[50px] top-0 left-0 z-40 bg-cover bg-center" style="background-image: url('{{ asset('images/Layer_1.png') }}')">
            </div>
            <div>
                <a href="{{route( "lang.switch", "en" )}}">Eng</a>
                <a href="{{route ("lang.switch", "kh") }}">kh</a>
            </div>
        <div class="text-center mt-50">
            <p>{{ __('message.home') }}</p>

        </div>

    </div>
@endsection
