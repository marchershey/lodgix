@props(['size' => 'md'])

<div class="flex flex-col flex-1 overflow-hidden">

    @php
        switch ($size) {
            case 'sm':
                $pageSize = 'max-w-3xl mx-auto';
                break;
            case 'md':
                $pageSize = 'max-w-5xl mx-auto';
                break;
            case 'lg':
                $pageSize = 'max-w-screen-desktop mx-auto';
                break;
        }
    @endphp

    {{-- Topbar --}}
    <div class="flex-none py-1 shadow-xl">
        <div class="flex justify-between">
            {{-- Menu Button --}}
            <div class="laptop:hidden">
                <button class="p-3" x-on:click="$store.sidebar.toggle()">
                    <svg class="w-8 h-8 text-muted" x-show="!$store.sidebar.open" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M4 6l16 0"></path>
                        <path d="M4 12l16 0"></path>
                        <path d="M4 18l16 0"></path>
                    </svg>
                    <svg class="w-8 h-8 text-muted" x-show="$store.sidebar.open" x-cloak xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M18 6l-12 12"></path>
                        <path d="M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            {{-- Logo --}}
            <div class="flex items-center laptop:min-w-80 laptop:justify-center">
                <a href="{{ route('host.dashboard') }}" wire:navigate>
                    <x-logo bgDark textSize="text-xl laptop-sm:text-2xl" iconSize="w-4 h-4" />
                </a>
            </div>

            {{-- Profile Dropdown --}}
            {{-- Need to persist the profile dropdown to prevent content flash --}}
            @persist('profile-dropdown')
                <div class="relative z-40 shrink-0" x-data="{ profile: false }">
                    <button class="p-3" x-on:click="profile = !profile">
                        <img class="w-8 h-8" src="https://ui-avatars.com/api/?size=512&rounded=true&bold=true&color=ffffff&background=2563eb&format=svg&name={{ auth()->user()->full_name() }}" alt="">
                    </button>
                    <div class="absolute right-0 z-40 -mt-1.5 w-64" x-cloak x-show="profile" x-on:click.away="profile = false" x-transition>
                        <div class="mx-3 overflow-hidden bg-white border border-gray-200 rounded-lg drop-shadow-xl">
                            <nav class="flex flex-col divide-y divide-gray-200">
                                <a class="flex items-center p-2 space-x-3" href="#" wire:navigate.hover>
                                    <svg class="w-5 h-5 text-gray-300" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                        <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                                        <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855"></path>
                                    </svg>
                                    <span>Your profile</span>
                                </a>
                                <a class="flex items-center p-2 space-x-3" href="#" wire:navigate.hover>
                                    <svg class="w-5 h-5 text-gray-300" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z"></path>
                                        <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                                    </svg>
                                    <span>Settings</span>
                                </a>
                                <a class="flex items-center p-2 space-x-3" href="{{ route('logout') }}" wire:navigate>
                                    <svg class="-ml-0.5 mr-0.5 h-5 w-5 text-gray-300" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M10 8v-2a2 2 0 0 1 2 -2h7a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-2" />
                                        <path d="M15 12h-12l3 -3" />
                                        <path d="M6 15l-3 -3" />
                                    </svg>
                                    <span class="text-red-500">Sign out</span>
                                </a>
                            </nav>
                        </div>
                    </div>
                </div>
            @endpersist
        </div>
    </div>

    {{-- Container --}}
    <div class="relative flex w-full h-full overflow-hidden bg-gray-800">

        {{-- Mobile Sidebar Overlay --}}
        <div class="absolute inset-0 z-20 bg-gray-800/60 animate-in fade-in laptop:hidden" x-show="$store.sidebar.open" x-cloak x-on:click="$store.sidebar.toggle()"></div>

        {{-- Sidebar --}}
        <div class="fixed z-30 hidden w-auto h-full -mt-1 duration-500 animate-in slide-in-from-left laptop:static laptop:flex laptop:flex-none laptop:animate-none" :class="$store.sidebar.open ? '!flex' : 'hidden'">
            <div class="flex flex-col pt-1 space-y-3 bg-gray-800 w-80">

                {{-- Property Selector --}}
                <div>
                    @livewire('components.host.dashboard.property-selector')
                </div>

                {{-- Navigation --}}
                <nav class="flex flex-col flex-1 px-3">
                    <ul class="flex flex-col space-y-3 text-gray-400">
                        <li class="">
                            <a class="flex items-center p-2 space-x-4 bg-gray-800 rounded-lg group hover:bg-gray-700" href="{{ route('host.dashboard') }}" wire:navigate.hover>
                                <svg class="h-7 w-7 group-hover:text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                </svg>
                                <span class="mt-px text-lg font-medium leading-4 group-hover:text-white">Dashboard</span>
                            </a>
                        </li>
                        <li class="">
                            <a class="flex items-center p-2 space-x-4 bg-gray-800 rounded-lg group hover:bg-gray-700" href="{{ route('host.dashboard') }}" wire:navigate.hover>
                                <svg class="h-7 w-7 group-hover:text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" />
                                    <path d="M16 3v4" />
                                    <path d="M8 3v4" />
                                    <path d="M4 11h16" />
                                    <path d="M11 15h1" />
                                    <path d="M12 15v3" />
                                </svg>
                                <span class="mt-px text-lg font-medium leading-4 group-hover:text-white">Calendar</span>
                            </a>
                        </li>
                        <li class="">
                            <a class="flex items-center p-2 space-x-4 bg-gray-800 rounded-lg group hover:bg-gray-700" href="{{ route('host.properties.index') }}" wire:navigate.hover>
                                <svg class="h-7 w-7 group-hover:text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8" />
                                    <path d="M13 7l0 .01" />
                                    <path d="M17 7l0 .01" />
                                    <path d="M17 11l0 .01" />
                                    <path d="M17 15l0 .01" />
                                </svg>
                                <span class="mt-px text-lg font-medium leading-4 group-hover:text-white">Properties</span>
                            </a>
                        </li>
                        <li class="" x-on:click="$store.sidebar.toggle()">
                            <a class="flex items-center p-2 space-x-4 bg-gray-800 rounded-lg group hover:bg-gray-700" href="{{ route('host.settings.index') }}" wire:navigate.hover>
                                <svg class="h-7 w-7 group-hover:text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                                    <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                </svg>
                                <span class="mt-px text-lg font-medium leading-4 group-hover:text-white">Settings</span>
                            </a>
                        </li>
                    </ul>
                </nav>

            </div>
        </div>

        {{-- Content --}}
        <div class="w-full h-full overflow-hidden bg-gray-800 rounded-none laptop:rounded-tl-2xl">
            <div class="flex flex-col h-full overflow-y-auto bg-gray-200">

                {{-- Banner --}}
                @livewire('components.banner', ['location' => 'host'])

                {{-- Content Container --}}
                <div class="relative flex-1">
                    @if (isset($pageTitle))
                        <div class="sticky top-0 z-10 page-header">
                            <div class="flex items-center justify-between {{ $pageSize }} page-padding">
                                <h1 class="page-title">{{ $pageTitle }}</h1>
                                @if (isset($pageActions))
                                    <div class="pt-1 page-actions">
                                        {{ $pageActions }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif

                    <div class="{{ $pageSize }} relative flex-1 page-x-padding">
                        <div class="relative overflow-y-hidden">
                            {{ $slot }}
                        </div>
                    </div>
                </div>

                {{-- Footer --}}
                <div class="flex-none">
                    <x-layouts.footer />
                </div>
            </div>
        </div>
    </div>
</div>
