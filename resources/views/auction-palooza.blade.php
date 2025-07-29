@extends('layouts.app')

@section('title', 'Join Us')

@section('content')
    <div class="min-h-screen flex flex-col md:flex-row">
        <!-- Left Panel -->
        <div class="w-full md:w-1/2 relative left-panel"
            style="background-image: url('storage/images/auction-palooza-bg.jpeg');">
            <div class="absolute inset-0 "></div>
            <div class="relative z-10 flex flex-col justify-between p-8 text-white min-h-[60vh] md:min-h-screen h-full">
                <div class='w-1/1  bg-white/75'>
                    <img src="storage/images/auction-palooza-fw.png" align="right" class="intro-image" />

                    {!! $leftPanel !!}
                </div>
            </div>
        </div>

        <!-- Right Panel -->
        <div class="w-full md:w-1/2 relative flex flex-col justify-center items-center bg-slate-600">
            <div class="absolute inset-0 bg-black/30"></div>
            <div class="relative z-10 w-full p-8">
                <div class="text-white">
                    {{-- {!! $rightPanel !!} --}}
                </div>
            </div>
        </div>
    @endsection
