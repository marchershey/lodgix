<div class="mx-auto tablet:max-w-lg" wire:init="load" x-data="{
    step: $wire.current_step
}">

    {{-- <header class="mb-12 text-center">
        <h1 class="page-title">Welcome to {{ config('app.name') }}</h1>
        <p class="text-gray-500 page-desc">Get started by completing the following steps below.</p>
    </header> --}}

    <div class="w-full" wire:loading.delay>
        <div class="card card-padding text-center">
            <x-spinner color="text-muted" size="w-12 h-12" />
        </div>
    </div>

    <div wire:loading.delay.remove>

        @if ($current_step == 1)
            <div wire:transition.in>
                @livewire('pages.setup.steps.welcome')
            </div>
        @endif

        @if ($current_step == 2)
            <div wire:transition.in>
                @livewire('pages.setup.steps.host-account')
            </div>
        @endif

        @if ($current_step == 3)
            <div wire:transition.in>
                @livewire('pages.setup.steps.site-config')
            </div>
        @endif

        @if ($current_step == 4)
            <div>
                @livewire('pages.setup.steps.first-property')
            </div>
        @endif

        @if ($current_step == 5)
            {{-- wire:transition will not work with @foreach - https://livewire.laravel.com/docs/wire-transition#limitations --}}
            <div wire:transition.in>
                @livewire('pages.setup.steps.property-details')
            </div>
        @endif

        @if ($current_step == 6)
            <div>
                @livewire('pages.setup.steps.property-photos')
            </div>
        @endif

        @if (app()->isLocal())
            <div class="mt-8 flex justify-between">
                <button class="button button-xs button-gray" @click="$dispatch('prev-step')">Back</button>
                <button class="button button-xs button-gray" @click="$dispatch('next-step')">Next</button>
            </div>
        @endif
    </div>
</div>
