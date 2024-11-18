<?php
/**
 * Joke Page View
 *
 * Filename:        index.blade.php
 * Location:        resources/views/jokes
 * Project:         LAS-LARAVEL-MVC-Jokes
 * Date Created:    01/11/2024
 *
 * Author:          Luis Alvarez Suarez<20114831@tafe.wa.edu.au>
 *
 */
?>
<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            Luis Alvarez's {{ __('Jokes Management') }}
        </h2>
    </x-slot>

    @include('partials.header')
    @include('partials.navigation')

    <main class="container mx-auto bg-zinc-50 py-8 px-4 shadow shadow-black/25 rounded-b-lg flex flex-col flex-grow">
        <article>
            <header class="bg-red-700 text-zinc-200 -mx-4 -mt-8 p-8 mb-8 flex">
                <h1 class="grow text-2xl font-bold">{{ __('Jokes') }}</h1>
                @can('joke add')
                    <p class="text-md flex-0 px-8 py-2 bg-zinc-500 hover:bg-emerald-600 text-white rounded transition ease-in-out duration-500">
                        <a href="{{ route('jokes.create') }}">{{ __('Add Joke') }}</a>
                    </p>
                @endcan
                @can('joke browse')
                    <form method="GET" action="{{ route('jokes.search') }}" class="block mx-5">
                        <input type="text" name="keywords" placeholder="{{ __('Joke search...') }}" class="w-full md:w-auto px-4 py-2 focus:outline-none" />
                        <button class="w-full md:w-auto bg-sky-500 hover:bg-sky-600 text-white px-4 py-2 focus:outline-none transition ease-in-out duration-500">
                            <i class="fa fa-search"></i> {{ __('Search') }}
                        </button>
                    </form>
                @endcan
                <p><a href="{{ route('jokes.trashed') }}" class="pb-2 px-1 text-text-zinc-700-200 hover:text-sky-300 hover:border-b-sky-500">Recycle Bin</a></p>
            </header>

            <section class="text-xl text-zinc-500 my-8">
                @if(isset($keywords) && $keywords > "")
                    <p>{{ __('Search Results for:') }} {{ htmlspecialchars($keywords) }} [{{ count($jokes ?? []) }} {{ __('jokes(s) found') }}]</p>
                @else
                    <p>{{ __('All Jokes') }}</p>
                @endif

                @include('partials.message')
            </section>

            <section class="flex flex-col gap-8">
                @foreach($jokes ?? [] as $joke)
                    <article class="w-full bg-white shadow rounded grid grid-cols-12">
                        <header class="col-span-4 bg-zinc-700 text-zinc-200 text-lg p-4 rounded-l flex-0">
                            <h4>{!! $joke->joke !!} </h4>
                        </header>
                        <section class="col-span-6 flex flex-row py-4 gap-4 text-zinc-600 justify-items-start">
                            <p class="align-middle">{{ __('Added:') }} {{ $joke->created_at }}</p>
                            <p class="align-middle">{{ __('Last Update:') }} {{ $joke->updated_at ?? __('n/a') }}</p>
                        </section>
                        @can('joke read')
                            <a href="{{ route('jokes.show', $joke->id) }}" class="col-span-2 text-center text-zinc-900 font-medium bg-zinc-200 hover:bg-zinc-300 block py-4 rounded-r transition ease-in-out duration-500">
                                {{ __('Details...') }}
                            </a>
                        @endcan
                    </article>
                @endforeach
            </section>
        </article>
    </main>

    @include('partials.footer')
</x-guest-layout>
