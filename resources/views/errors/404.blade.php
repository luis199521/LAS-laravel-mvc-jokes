<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('404 - Page Not Found') }}
        </h2>
    </x-slot>

    @include('partials.header')
    @include('partials.navigation')

    <main class="container mx-auto py-8 px-4">
        <h1>404 - Page Not Found</h1>
    </main>

    @include('partials.footer')
</x-guest-layout>
