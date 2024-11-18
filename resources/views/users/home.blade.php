<?php
/**
 * Users Page View
 *
 * Filename:        home.blade.php
 * Location:        resources/views/users
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
            Luis Alvarez's {{ __('User Management') }}
        </h2>
    </x-slot>

    @include('partials.header')
    @include('partials.navigation')

    <main class="container mx-auto bg-zinc-50 py-8 px-4 shadow shadow-black/25 rounded-b-lg flex flex-col flex-grow">
        <article>
            <header class="bg-red-700 text-zinc-200 -mx-4 -mt-8 p-8 mb-8 flex">
                <h1 class="grow text-2xl font-bold">{{ __('Users') }}</h1>
                @can('user add')
                    <p class="text-md flex-0 px-8 py-2 bg-zinc-500 hover:bg-emerald-600 text-white rounded transition ease-in-out duration-500">
                        <a href="{{ route('users.create') }}">{{ __('Add User') }}</a>
                    </p>
                @endcan
                @can('user browse')
                <form method="GET" action="{{ route('users.search') }}" class="block mx-5">
                    <input type="text" name="keywords" placeholder="{{ __('User search...') }}" class="w-full md:w-auto px-4 py-2 focus:outline-none" />
                    <button class="w-full md:w-auto bg-sky-500 hover:bg-sky-600 text-white px-4 py-2 focus:outline-none transition ease-in-out duration-500">
                        <i class="fa fa-search"></i> {{ __('Search') }}
                    </button>
                </form>
                @endcan
                <p><a href="{{ route('users.trashed') }}" class="pb-2 px-1 text-text-zinc-700-200 hover:text-sky-300 hover:border-b-sky-500">Recycle Bin</a></p>
            </header>

            <section class="text-xl text-zinc-500 my-8">
                @if(isset($keywords) && $keywords > "")
                    <p>{{ __('Search Results for:') }} {{ htmlspecialchars($keywords) }} [{{ count($users ?? []) }} {{ __('user(s) found') }}]</p>
                @else
                    <p>{{ __('All Users') }}</p>
                @endif

                @include('partials.message')
            </section>

            <section class="flex flex-col gap-8">
                @foreach($users ?? [] as $user)
                    <article class="w-full bg-white shadow rounded grid grid-cols-12">
                        <header class="col-span-4 bg-zinc-700 text-zinc-200 text-lg p-4 rounded-l flex-0">
                            <h4>{{ $user->given_name }}</h4>
                        </header>
                        <section class="col-span-6 flex flex-row py-4 gap-4 text-zinc-600 justify-items-start">
                            <p class="mr-4 -my-4">
                                <img class="w-16 h-16" src="https://dummyimage.com/200x200/c11111/fff&text=Image+Here" alt="{{ __('Avatar for') }} {{ $user->given_name }} {{ $user->family_name }}">
                            </p>
                            <p class="align-middle">{{ __('Added:') }} {{ $user->created_at }}</p>
                            <p class="align-middle">{{ __('Last Update:') }} {{ $user->updated_at ?? __('n/a') }}</p>
                        </section>
                        @can('user read')
                            <a href="{{ route('users.show', $user->id) }}" class="col-span-2 text-center text-zinc-900 font-medium bg-zinc-200 hover:bg-zinc-300 block py-4 rounded-r transition ease-in-out duration-500">
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
