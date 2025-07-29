@extends('layouts.app')

@section('title', 'Join Us')

@section('content')
    <div class="min-h-screen flex flex-col md:flex-row">
        <!-- Left Panel -->
        <div class="w-full md:w-1/2 relative left-panel"
            style="background-image: url('storage/images/auction-palooza-bg.jpeg');">
            <div class="relative z-10 flex flex-col justify-between p-8 text-white min-h-[60vh] md:min-h-screen h-full">
                <div class='w-1/1 '>
                    <img src="storage/images/auction-palooza-fw.png" align="right" class="intro-image" />

                    {!! $leftPanel !!}


                </div>
            </div>
        </div>

        <!-- Right Panel -->
        <div class="w-full md:w-1/2 relative flex flex-col  bg-white auction-palooza-right-panel"
            style="background-image: url('storage/images/auction-palooza-right-bg.png');">
            {!! $rightPanel !!}

            <img src="storage/images/auction-palooza-high-five.png" class="absolute bottom-0 right-0 w-2/5" />
        </div>
    </div>

    <!-- Bottom Panel -->
    <div>
        {!! $bottomPanel !!}
    </div>
@endsection
