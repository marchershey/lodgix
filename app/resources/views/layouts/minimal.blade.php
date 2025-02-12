<x-layouts.base title="{{ $title }}">

    <div class="flex flex-col w-full bg-gray-200">

        {{-- Header --}}
        {{-- Fix this stupid shit with hiding header... --}}
        @if ($header ?? true)
            <div class="flex py-1 bg-white border-b border-gray-300 page-padding">
                <div class="flex h-[49px] items-center">
                    <a href="{{ route('host.dashboard') }}" wire:navigate>
                        <x-logo textSize="text-xl tablet:text-2xl" iconSize="w-4 h-4" />
                    </a>
                </div>
                {{-- <div class="flex items-center justify-end w-full p-3">
            </div> --}}
            </div>
        @endif

        {{-- Content --}}
        <div class="h-full overflow-y-auto">

            <div class="flex flex-col justify-between h-full space-y-5">
                <div class="flex-1 page-padding">
                    {{ $slot }}
                </div>

                {{-- Footer --}}
                <x-layouts.footer />
            </div>
        </div>

    </div>

    @stack('scripts')
</x-layouts.base>
