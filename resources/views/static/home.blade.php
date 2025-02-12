<?php
/**
 * Assessment Title: Portfolio Part 3
 * Cluster:          SaaS: Part 1 – Front End Development 
 * Qualification:    ICT50220 Diploma of Information Technology (Advanced Programming)
 * Name:             Luis Alvarez Suarez
 * Student ID:       20114831
 * Year/Semester:    2024/S2
 * 
 * Home page
 * 
 * Filename: home.blade.php
 * Location: resources/views/static
 * Project: LAS-LARAVEL-MVC-Jokes
 * Date Created: 28/10/2024
 *
 * Author: Luis Alvarez Suarez <20114831@tafe.wa.edu.au>
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
    <article class="container mx-auto bg-zinc-50 py-8 px-4 shadow shadow-black/25 rounded-b-lg">
        <header class="bg-zinc-700 text-blue-200 rounded-t-lg -mx-4 -mt-8 p-8 text-2xl font-bold mb-8">
            <h2>Welcome</h2>
        </header>

        <div class="flex flex-col flex-wrap my-4 mt-8">
            <section class="grid grid-cols-1 gap-4 px-4 mt-4 sm:grid-cols-3 sm:px-8">
                <section class="rounded flex items-center bg-lime-200 border border-lime-600 overflow-hidden">
                    <div class="rounded-l p-6 bg-lime-600">
                        <i class="fa-solid fa-exclamation"></i>
                    </div>
                    <div class="rounded-r px-6 text-lime-800">
                        <h3 class="tracking-wider">Total Members</h3>
                        <p class="text-3xl">12,768</p>
                    </div>
                </section>
            </section>

            <section class="grid grid-cols-1 gap-4 px-4 mt-4 sm:grid-cols-3 sm:px-8">
                <article class="bg-white shadow rounded p-2 flex flex-col">
                    <header class="-mx-2 bg-zinc-700 text-zinc-200 text-lg p-4 -mt-2 mb-4 rounded-t flex-0">
                        <h4>Time for a Random Joke</h4>
                    </header>
                    @if (!empty($jokes))
                    @foreach ($jokes as $joke)
                        <article class="max-w-96 min-w-64 bg-white shadow rounded p-2 flex flex-col">
                            <header class="-mx-2 bg-zinc-700 text-zinc-200 text-lg p-4 -mt-2 mb-4 rounded-t flex-0">
                                <h4>{!! $joke->joke!!}</h4> 
                            </header>
                        </article>
                    @endforeach
                
                @endif
                </article>
                <form action="{{ route('static.home') }}" method="GET">
                    <button class="w-full md:w-auto
                                   bg-sky-500 hover:bg-sky-600
                                   text-black
                                   px-4 py-2
                                   focus:outline-none transition ease-in-out duration-500">
                        <i class="fa fa-search"></i> New Joke
                    </button>
                    </form>
            </section>
            
        </div>
    </article>
    </main>
    @include('partials.footer')
</x-guest-layout>



