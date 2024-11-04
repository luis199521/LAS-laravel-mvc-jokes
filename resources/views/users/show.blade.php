
<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Show | Users | LAS-Laravel-Jokes') }}
        </h2>
    </x-slot>
    @include('partials.header')
    @include('partials.navigation')

    <main class="container mx-auto bg-zinc-50 py-8 px-4 shadow shadow-black/25 rounded-b-lg flex flex-col flex-grow">
        <article>
            <header class="bg-zinc-700 text-zinc-200 -mx-4 -mt-8 p-8 mb-8 flex">
                <h1 class="grow text-2xl font-bold ">Users - Detail</h1>

                <p class="text-md flex-0 px-8 py-2 bg-emerald-500 hover:bg-emerald-600 text-white rounded transition ease-in-out duration-500">
                    <a href="{{ route('users.create') }}">Add User</a>
                </p>

                <form method="GET" action="{{ route('users.search') }}" class="block mx-5">
                    <input type="text" name="keywords" placeholder="User search..."
                           class="w-full md:w-auto px-4 py-2 focus:outline-none"/>
                    <button class="w-full md:w-auto
                               bg-sky-500 hover:bg-sky-600
                               text-white
                               px-4 py-2
                               focus:outline-none transition ease-in-out duration-500">
                        <i class="fa fa-search"></i> Search
                    </button>
                </form>
            </header>

            @include('partials.message') 
            <section class="w-1/2 mx-auto bg-white shadow rounded p-4 flex flex-col">
                <h4 class="-mx-4 bg-zinc-700 text-zinc-200 text-2xl p-4 -mt-4 mb-4 rounded-t flex-0 flex justify-between">
                    {{ $user->given_name }} {{ $user->family_name }}
                </h4>

                <section class="flex-grow flex flex-row">
                    <section class="grow">
                        <h5 class="text-lg font-bold">Nickname:</h5>
                        <p class="grow text-lg text-zinc-600 mb-4">{{ $user->nickname }}</p>
                        <h5 class="text-lg font-bold">Name:</h5>
                        <p class="grow text-lg text-zinc-600 mb-4">{{ $user->given_name }}</p>
                        <h5 class="text-lg font-bold">Family Name:</h5>
                        <p class="grow text-lg text-zinc-600 mb-4">{{ $user->family_name }}</p>

                        <h5 class="text-lg font-bold">Email:</h5>
                        <p class="grow text-lg text-zinc-600 mb-4">{{ $user->email }}</p>

                        <h5 class="text-lg font-bold">Joined:</h5>
                        <p class="grow text-lg text-zinc-600 mb-4">{{ $user->created_at }}</p>

                        <h5 class="text-lg font-bold">Last Update:</h5>
                        <p class="grow text-lg text-zinc-600 mb-6">{{ $user->updated_at ?? 'n/a' }}</p>
                      
                        @if (auth()->user()->can('update', $user) || auth()->user()->can('delete', $user))
                        <form method="POST" action="{{ route('users.destroy', $user->id) }}"
                              class="border-0 border-t-1 border-zinc-300 text-lg flex flex-row">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('users.edit', $user->id) }}"
                               class="px-16 py-2 bg-sky-500 hover:bg-sky-600 text-white rounded transition ease-in-out duration-500">
                                Edit
                            </a>
                    
                            <button type="submit"
                                    class="ml-8 px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded transition ease-in-out duration-500">
                                Delete
                            </button>
                        </form>
                    @endif
                    </section>

                    <img class="object-cover"
                         src="https://dummyimage.com/200x200/a1a1aa/fff&text=Image+Here"
                         alt="">
                </section>
            </section>
        </article>
    </main>
    @include('partials.footer')
</x-guest-layout>
