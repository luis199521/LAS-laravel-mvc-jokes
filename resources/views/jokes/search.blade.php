{{-- 
    Search Joke View

    Display jokes when the user uses the search box

    Filename:        search.blade.php
    Location:        resources/views/jokes
    Project:         LAS-Laravel-Jokes
    Date Created:    04/11/2024

    Author:          Luis Alvarez <20114831@tafe.wa.edu.au>
--}}

<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Search | Jokes | LAS-Laravel-Jokes') }}
        </h2>
    </x-slot>
    @include('partials.header')
    @include('partials.navigation')
    <main class="container mx-auto bg-zinc-50 py-8 px-4 shadow shadow-black/25 rounded-b-lg">
        <div class="flex flex-col flex-wrap my-4 mt-8">
        <article>
            <header class="bg-sky-500 text-zinc-200 -mx-4 -mt-8 p-8 mb-8 flex">
                <h1 class="grow text-2xl font-bold">Results</h1>
            </header>
       
            <section class="text-xl text-zinc-500 my-8">
                @if(isset($keywords) && $keywords !== "")
                    <p>Search Results for: {{ htmlspecialchars($keywords) }} [{{ count($jokes ?? []) }} Jokes(s) found]</p>
                 
                    @foreach($jokes as $joke)
                    <p>Joke: {!! $joke->joke !!}</p>
                        <p>Tag: {{ $joke->tags }}</p>     
                    @endforeach
                @else
                    <p>All Jokes</p>
                @endif

                @include('partials.message')
            </section>
       
        </article>
    </div>
    </main>
    @include('partials.footer')
</x-guest-layout>
