<div class="flex h-full">
    <flux:sidebar class="border-r bg-slate-800 dark:bg-zinc-900 border-zinc-200 dark:border-zinc-700" sticky stashable>
        <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

        <flux:brand class="px-2 dark:hidden" name="LodgeBoard" href="#" logo="https://fluxui.dev/img/demo/logo.png" />
        <flux:brand class="hidden px-2 dark:flex" name="LodgeBoard" href="#" logo="https://fluxui.dev/img/demo/dark-mode-logo.png" />

        <flux:input as="button" variant="filled" placeholder="Search..." icon="magnifying-glass" />

        <flux:navlist variant="outline">
            <flux:navlist.item href="#" icon="home" current>Dashboard</flux:navlist.item>
            <flux:navlist.item href="#" icon="inbox" badge="12">Inbox</flux:navlist.item>
            <flux:navlist.item href="#" icon="document-text">Documents</flux:navlist.item>
            <flux:navlist.item href="#" icon="calendar">Calendar</flux:navlist.item>

            <flux:navlist.group class="hidden lg:grid" expandable heading="Favorites">
                <flux:navlist.item href="#">Marketing site</flux:navlist.item>
                <flux:navlist.item href="#">Android app</flux:navlist.item>
                <flux:navlist.item href="#">Brand guidelines</flux:navlist.item>
            </flux:navlist.group>
        </flux:navlist>

        <flux:spacer />

        <flux:navlist variant="outline">
            <flux:navlist.item href="#" icon="cog-6-tooth">Settings</flux:navlist.item>
            <flux:navlist.item href="#" icon="information-circle">Help</flux:navlist.item>
        </flux:navlist>

        <flux:dropdown class="max-lg:hidden" position="top" align="start">
            <flux:profile name="Olivia Martin" avatar="https://fluxui.dev/img/demo/user.png" />

            <flux:menu>
                <flux:menu.radio.group>
                    <flux:menu.radio checked>Olivia Martin</flux:menu.radio>
                    <flux:menu.radio>Truly Delta</flux:menu.radio>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.item icon="arrow-right-start-on-rectangle">Logout</flux:menu.item>
            </flux:menu>
        </flux:dropdown>
    </flux:sidebar>

    <flux:header class="!block bg-white lg:bg-zinc-50 dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-700">
        <flux:navbar class="w-full lg:hidden">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <flux:spacer />

            <flux:dropdown position="top" align="start">
                <flux:profile avatar="https://fluxui.dev/img/demo/user.png" />

                <flux:menu>
                    <flux:menu.radio.group>
                        <flux:menu.radio checked>Olivia Martin</flux:menu.radio>
                        <flux:menu.radio>Truly Delta</flux:menu.radio>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.item icon="arrow-right-start-on-rectangle">Logout</flux:menu.item>
                </flux:menu>
            </flux:dropdown>
        </flux:navbar>

        <flux:navbar scrollable>
            <flux:navbar.item href="#" current>Dashboard</flux:navbar.item>
            <flux:navbar.item href="#" badge="32">Orders</flux:navbar.item>
            <flux:navbar.item href="#">Catalog</flux:navbar.item>
            <flux:navbar.item href="#">Configuration</flux:navbar.item>
        </flux:navbar>
    </flux:header>

    <flux:main class="overflow-y-auto">
        @if (isset($heading))
            <flux:heading size="xl" level="1">{{ $heading }}</flux:heading>
            <flux:subheading class="mb-6" size="lg">{{ $subheading }}</flux:subheading>
            <flux:separator variant="subtle" />
        @endif

        {{ $slot }}

    </flux:main>

</div>
