<?php
/**
 * Home Page View
 *
 * Filename:        home.blade.php
 * Location:        resources/views/auth
 * Project:         LAS-LARAVEL-MVC-Jokes
 * Date Created:    31/10/2024
 *
 * Author:          Luis Alvarez Suarez<20114831@tafe.wa.edu.au>
 *
 */
?>

<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            Luis Alvarez's {{ __('Joke DB') }}
        </h2>
    </x-slot>

    @include('partials.header')
    @include('partials.navigation')
    <main class="container mx-auto bg-zinc-50 py-8 px-4 shadow shadow-black/25 rounded-b-lg">
        <article>
            <header class="bg-zinc-700 text-zinc-200 -mx-4 -mt-8 p-8 text-2xl font-bold mb-8">
                <h1>{{ __('Luis\'s Joke DB') }}</h1>
            </header>
    
           
            <section class="flex flex-row flex-wrap justify-center my-8 gap-8">
                <section class="w-1/4 bg-sky-800 text-white shadow rounded p-2 flex flex-row">
                    <h4 class="flex-0 w-1/2 -ml-2 mr-6 bg-sky-400 text-black text-lg p-4 -my-2 rounded-l">
                        {{ __('Jokes:') }}
                    </h4>
                    <p class="grow text-4xl ml-6">
                         {{ $totalJokes }} 
                    </p>
                </section>

                
    
                <section class="w-1/4 bg-red-700 text-white shadow rounded p-2 flex flex-row">
                    <h4 class="flex-0 w-1/2 -ml-2 mr-6 bg-red-400 text-black text-lg p-4 -my-2 rounded-l">
                        {{ __('Users:') }}
                    </h4>
                    <p class="grow text-4xl ml-6">
                         {{ $totalUsers }} 
                    </p>
                </section>
            </section>
    
            
            <section class="my-8 flex flex-wrap gap-8 justify-center">
                @if (!empty($randomJoke))
                    @foreach ($randomJoke as $joke)
                    <article class="max-w-96 min-w-64 bg-white shadow rounded p-4 flex flex-col items-center justify-center text-center">
                        <section class="flex-grow grid place-items-center">
                            <p class="text-zinc-600 break-words">{!! $joke->joke !!}</p>
                        </section>
                    </article>
                    
                    @endforeach
                @else
                    <article class="max-w-96 min-w-64 bg-white shadow rounded p-2 flex flex-col text-center text-xl">
                        <h4>{{ __('Sorry, no joke this time.') }}</h4>
                    </article>
                @endif
            </section>
        </article>
    </main>
    
    </main>
    @include('partials.footer')
</x-guest-layout>
