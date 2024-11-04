<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Show | Jokes | LAS-Laravel-Jokes') }}
        </h2>
    </x-slot>
    @include('partials.header')
    @include('partials.navigation')

    <main class="container mx-auto bg-zinc-50 py-8 px-4 shadow shadow-black/25 rounded-b-lg flex flex-col flex-grow">
        <article>
            <header class="bg-zinc-700 text-zinc-200 -mx-4 -mt-8 p-8 mb-8 flex">
                <h1 class="grow text-2xl font-bold">Joke - Detail</h1>

                <p class="text-md flex-0 px-8 py-2 bg-emerald-500 hover:bg-emerald-600 text-white rounded transition ease-in-out duration-500">
                    <a href="{{ route('jokes.create') }}">Add Joke</a>
                </p>

                <form method="GET" action="{{ route('jokes.search') }}" class="block mx-5">
                    <input type="text" name="keywords" placeholder="Search jokes..."
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
                <section class="flex-grow flex flex-row">
                    <section class="grow">
                        <h5 class="text-lg font-bold">Joke:</h5>
                        <p class="grow text-lg text-zinc-600 mb-4">{!! $joke->joke_title !!}</p>

                        <h5 class="text-lg font-bold">Category:</h5>
                        <p class="grow text-lg text-zinc-600 mb-4">{{ $joke->category ?? 'n/a' }}</p>

                        <h5 class="text-lg font-bold">Tags:</h5>
                        <p class="grow text-lg text-zinc-600 mb-4">{{ $joke->tags }}</p>

                        <h5 class="text-lg font-bold">Created At:</h5>
                        <p class="grow text-lg text-zinc-600 mb-4">{{ $joke->created_at }}</p>

                        <h5 class="text-lg font-bold">Last Update:</h5>
                        <p class="grow text-lg text-zinc-600 mb-6">{{ $joke->updated_at ?? 'n/a' }}</p>

                        <h5 class="text-lg font-bold">Author:</h5>
                        <p class="grow text-lg text-zinc-600 mb-6">{{ $joke->author ?? 'n/a' }}</p>
                      
                        
                        @if ($joke->author === auth()->user()->id)
                        <form method="POST" action="{{ route('jokes.destroy', $joke->id) }}"
                              class="border-0 border-t-1 border-zinc-300 text-lg flex flex-row">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('jokes.edit', $joke->id) }}"
                               class="px-16 py-2 bg-sky-500 hover:bg-sky-600 text-white rounded transition ease-in-out duration-500">
                                Edit
                            </a>
                    
                            <button type="submit"
                                    class="ml-8 px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded transition ease-in-out duration-500">
                                Delete
                            </button>
                        </form>
                        @else
   
                    @endif
                    </section>

                    <img class="object-cover"
                         src="https://dummyimage.com/200x200/a1a1aa/fff&text=Image+Here"
                         alt="Joke image">
                </section>
            </section>
        </article>
    </main>
    @include('partials.footer')
</x-guest-layout>
