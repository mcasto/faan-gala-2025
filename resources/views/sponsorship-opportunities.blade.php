@extends('layouts.app')
@section('title', 'Sponsorship Opportunities')
@section('content')
    <div
        style="background-image:url('storage/images/sponsorship-bg.jpeg'); background-size: cover; height: 100vh; display: flex; align-items: center; justify-content: center;">
        <div class="text-left sponsorship-bg">
            <div class='sponsorship-banner' style='background-image: url("storage/images/sponsorship-banner.jpg")'>
                <div class='flex flex-col  items-center justify-center h-full text-white p-4'
                    style='background-color: rgba(0,0,0,0.7)'>
                    <h1 class='text-3xl font-thin md:text-4xl'>{{ $header }}</h1>
                    <div>{{ $date }}</div>
                    <div>{{ $location }}</div>
                </div>
            </div>

            <div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @foreach ($levels as $level)
                        <div class="sponsorship-level">
                            <h2 class="text-xl font-weight-bold">{{ $level['title'] }}
                                <span class='ml-3'>{{ $level['amount'] }}</span>
                            </h2>
                            <ul>
                                @foreach ($level['benefits'] as $benefit)
                                    <li class='flex items-start gap-2 pl-4'>
                                        <svg class="text-yellow-600 flex-shrink-0 mt-[2px]" width="18" height="18"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <defs>
                                                <filter id="star-shadow" x="-20%" y="-20%" width="140%" height="140%">
                                                    <feDropShadow dx="1" dy="1" stdDeviation="1"
                                                        flood-color="black" flood-opacity="0.5" />
                                                </filter>
                                            </defs>
                                            <polygon
                                                points="10,1 12.59,7.36 19.51,7.36 13.96,11.64 16.55,18 10,13.72 3.45,18 6.04,11.64 0.49,7.36 7.41,7.36"
                                                stroke="black" stroke-width="0.7" filter="url(#star-shadow)" />
                                        </svg>
                                        <span>{{ $benefit }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class='text-lg font-thin mt-5 text-center mx-auto md:max-w-[60dvw]'>
                {{ $note }}
            </div>
        </div>
    @endsection
