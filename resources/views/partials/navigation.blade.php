<?php
/**
 * Assessment Title: Portfolio Part 3
 * Cluster:          SaaS: Part 1 – Front End Development 
 * Qualification:    ICT50220 Diploma of Information Technology (Advanced Programming)
 * Name:             Luis Alvarez Suarez
 * Student ID:       20114831
 * Year/Semester:    2024/S2
 * Header
* Filename: navigation.blade.php
 * Location: resources/views/partials
 * Project: LAS-LARAVEL-MVC-Jokes
 * Date Created: 23/09/2024
 *
 * Author: Luis Alvarez Suarez <20114831@tafe.wa.edu.au>
 *
 */

?>

<header class="bg-black text-white p-4 flex-grow-0 flex flex-row align-middle content-center">
    <h1 class="flex-0 w-32 text-xl p-4">
        <a href="/" class="py-4 px-4 -mx-4 -my-4 font-bold rounded text-sky-300 hover:text-sky-700 hover:bg-sky-300 transition ease-in-out duration-500">MVC</a>
    </h1>
    <nav class="flex flex-row gap-4 py-4 ml-auto">
        @auth  
            <p><a href="{{ route('auth.home') }}" class="pb-2 px-1 text-text-zinc-700-200 hover:text-black-300 hover:border-b-sky-500">Home</a></p>
            <p><a href="{{ route('jokes.home') }}" class="pb-2 px-1 text-text-zinc-700-200 hover:text-sky-300 hover:border-b-sky-500">Jokes</a></p>
            <p><a href="{{ route('users.home') }}" class="pb-2 px-1 text-text-zinc-700-200 hover:text-sky-300 hover:border-b-sky-500">Users</a></p>
            <p class="pb-2 px-1 text-text-zinc-700-200">{{ Auth::user()->given_name }}</p>
            @can('user logout')
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="pb-2 px-1 text-text-zinc-700-200 hover:text-sky-300 hover:border-b-sky-500">Logout</button>
                </form>
            @endcan
        @else
            <p><a href="{{ route('login') }}" class="pb-2 px-1 text-text-zinc-700-200 hover:text-sky-300 hover:border-b-sky-500">Login</a></p>
            @can('user register')
                <p><a href="{{ route('register') }}" class="pb-2 px-1 text-text-zinc-700-200 hover:text-sky-300 hover:border-b-sky-500">Register</a></p>
            @endcan
            <p><a href="{{ route('static.about') }}" class="pb-2 px-1 text-text-zinc-700-200 hover:text-sky-300 hover:border-b-sky-500">About</a></p>
            <p><a href="{{ route('static.contact') }}" class="pb-2 px-1 text-text-zinc-700-200 hover:text-sky-300 hover:border-b-sky-500">Contact</a></p>
            <form method="GET" action="/joke/search" class="block mx-5">
                <input type="text" name="keywords" placeholder="Joke search..." class="w-full md:w-auto px-4 py-2 text-black"/>
                <button class="bg-sky-500 hover:bg-sky-600 text-black px-4 py-2">Search</button>
            </form>
        @endguest
    </nav>
</header>
