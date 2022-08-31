<aside class="fixed right-0 overflow-hidden shadow-md bg-white border-r mt-14">
    <!-- Mini column -->
    <div class="flex flex-col flex-shrink-0 h-full px-2 py-4 border-r">
        <!-- Brand -->
        {{-- <div class="flex-shrink-0">
            <a href="/tournaments" class="inline-block text-xl font-bold tracking-wider uppercase">
                K-WD
            </a>
        </div> --}}
        <div class="flex flex-col items-center justify-center flex-1 space-y-4">
            <!-- Search button -->
            <a href="/tournaments/{{ $tournament->slug }}" class="px-1 bg-black text-white font-bold inline-block text-lg font-mono tracking-wider uppercase">
                Rule
            </a>
            <a href="/tournaments/{{ $tournament->slug }}/team" class="px-1 bg-black text-white font-bold inline-block text-lg font-mono tracking-wider uppercase">
                Team
            </a>
            <a href="/tournaments/{{ $tournament->slug }}/schedule" class="px-1 bg-black text-white font-bold inline-block text-lg font-mono tracking-wider uppercase">
                Schedule
            </a>
            <a href="/tournaments/{{ $tournament->slug }}/standing" class="px-1 bg-black text-white font-bold inline-block text-lg font-mono tracking-wider uppercase">
                Standing
            </a>
            <p class="px-1 text-Black font-bold inline-block text-2xl font-mono tracking-wider uppercase">
                {{$slot . '/' . $tournament->slot }}
            </p>
        </div>
    </div>
</aside>