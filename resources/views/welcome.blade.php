<x-page-container>
    <div class="min-h-screen flex flex-col md:flex-row">
        <!-- Left Panel -->
        <div class="w-full md:w-1/2 relative left-panel"
            style="background-image: url('storage/images/page-01-background.jpeg');">
            <div class="absolute inset-0 bg-black/50"></div>
            <div class="relative z-10 flex flex-col justify-between p-8 text-white min-h-[60vh] md:min-h-screen h-full">
                <div class="self-start bg-black/30 p-4 rounded mb-4">
                    {!! $upperLeft !!}
                </div>
                <div class="self-center bg-black/30 p-4 rounded mb-4">
                    {!! $centered !!}
                </div>
                <div class="self-start bg-black/30 p-4 rounded">
                    {!! $lowerLeft !!}
                </div>
            </div>
        </div>

        <!-- Right Panel -->
        <div class="w-full md:w-1/2 relative flex flex-col justify-center items-center bg-slate-600">
            <div class="absolute inset-0 bg-black/30"></div>
            <div class="relative z-10 w-full p-8">
                <div class="text-white">
                    {!! $introduction !!}
                </div>
            </div>
        </div>
    </div>
</x-page-container>
