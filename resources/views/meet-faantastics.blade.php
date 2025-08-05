@extends('layouts.app')

@section('title', __('meet-faantastics.title'))

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-slate-700 to-slate-900">
        <div class="container mx-auto px-4 py-8">
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-6xl font-bold text-white mb-4">
                    {!! $header !!}
                </h1>
            </div>

            <!-- Board Section -->
            <section class="mb-16">
                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-8">
                    <h2 class="text-3xl font-bold text-white mb-8 text-center">Board Members</h2>
                    <div class="text-white">
                        {!! $boardSection !!}
                    </div>
                </div>
            </section>

            <!-- Team Section -->
            <section class="mb-16">
                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-8">
                    <h2 class="text-3xl font-bold text-white mb-8 text-center">Shelter Team & Volunteers</h2>
                    <div class="text-white">
                        {!! $teamSection !!}
                    </div>
                </div>
            </section>

            <!-- Committee Section -->
            <section class="mb-16">
                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-8">
                    <h2 class="text-3xl font-bold text-white mb-8 text-center">2025 Gala Committee</h2>
                    <div class="text-white">
                        {!! $committeeSection !!}
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
