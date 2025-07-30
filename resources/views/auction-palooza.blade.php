@extends('layouts.app')

@section('title', 'Join Us')

@push('scripts')
    <script>
        // Check for messages and scroll to bottom panel if needed
        window.addEventListener('load', function() {
            setTimeout(function() {
                if (document.querySelector('.bg-red-100') || document.querySelector('.bg-green-100')) {
                    const bottomPanel = document.getElementById('bottom-panel');
                    if (bottomPanel) {
                        bottomPanel.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                }
            }, 100); // Small delay to ensure everything is rendered
        });
    </script>
@endpush

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
    <div id="bottom-panel" class="bg-slate-800 text-white p-8">
        {!! $bottomPanel !!}
        @if ($errors->any())
            <div class="max-w-4xl mx-auto mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                <p class="font-bold">{{ __('auction-palooza.error_header') }}</p>
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('error'))
            <div class="max-w-4xl mx-auto mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                {{ session('error') }}
            </div>
        @endif
        @if (session('success'))
            <div class="max-w-4xl mx-auto mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                {{ session('success') }}
            </div>
        @endif
        <form class="max-w-4xl mx-auto" method="POST" action="{{ route('auction-palooza.store') }}"
            enctype="multipart/form-data">
            @csrf
            <x-auction-item-form />
        </form>
    </div>
@endsection
