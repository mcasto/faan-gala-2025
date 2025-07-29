@extends('layouts.app')

@section('title', 'Join Us')

@section('content')
    <div class="min-h-screen flex flex-col md:flex-row">
        <!-- Left Panel -->
        <div class="w-full md:w-1/2 relative left-panel" style="background-image: url('storage/images/join-us-bg.jpeg');">
            <div class="absolute inset-0 "></div>
            <div class="relative z-10 flex flex-col justify-between p-8 text-white min-h-[60vh] md:min-h-screen h-full">
                <div class="join-us-upper-right self-end bg-blue-300/60 p-4 circle-bg mb-4">
                    {!! $upperRight !!}
                </div>
                {{-- <div class="join-us-lower-left circle-bg  bg-blue-800/60">
                    {!! $lowerLeft !!}
                </div> --}}
            </div>
        </div>

        <!-- Right Panel -->
        <div class="w-full md:w-1/2 relative flex flex-col justify-center items-center bg-slate-600">
            <div class="absolute inset-0 bg-black/30"></div>
            <div class="relative z-10 w-full p-8">
                <div class="text-white">
                    {!! $rightPanel !!}
                </div>
            </div>
        </div>
    </div>
@endsection
