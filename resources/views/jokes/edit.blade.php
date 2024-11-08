
<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Edit | Jokes | LAS-Laravel-Jokes') }}
        </h2>
    </x-slot>
    @include('partials.header')
    @include('partials.navigation')

    <main class="container mx-auto bg-zinc-50 py-8 px-4 shadow shadow-black/25 rounded-b-lg flex flex-col flex-grow">
        <article>
            <header class="bg-zinc-700 text-zinc-200 -mx-4 -mt-8 p-8 mb-8 flex">
                <h1 class="grow text-2xl font-bold">Joke - Edit</h1>
                @can('joke add')
                    <p class="text-md flex-0 px-8 py-2 bg-emerald-500 hover:bg-emerald-600 text-white rounded transition ease-in-out duration-500">
                        <a href="{{ route('jokes.create') }}">Add Joke</a>
                    </p>
                @endcan
            </header>

            <section>
                @include('partials.message', ['errors' => $errors ?? []])

                <form method="POST" action="{{ route('jokes.update', $joke->id) }}" id="jokeUpdateForm" novalidate>
                    @csrf
                    @method('PUT')

                    <h2 class="text-2xl font-bold mb-6 text-left text-gray-500">
                        Joke Information
                    </h2>

                    <section class="mb-4">
                        <label for="joke_title" class="mt-4 pb-1">Joke Title:</label>
                        <input type="text" placeholder="Joke Title"
                               id="joke" name="joke"
                               class="w-full px-4 py-2 border rounded focus:outline-none"
                               value="{{ old('joke', $joke->joke) }}"/>
                    </section>

                    <section class="mb-4">
                        <label for="Category" class="mt-4 pb-1">Category:</label>
                        <input type="text" id="Category"
                            name="category_id" placeholder="Category"
                            class="w-full px-4 py-2 border border-b-zinc-300 rounded focus:outline-none"
                            value="{{ old('category_id', $joke->category_id ?? '') }}" />
                    </section>

                    <section class="mb-4">
                        <label for="tags" class="mt-4 pb-1">Tags:</label>
                        <input type="text" placeholder="Tags"
                               id="tags" name="tags"
                               class="w-full px-4 py-2 border rounded focus:outline-none"
                               value="{{ old('tags', $joke->tags) }}"/>
                    </section>

                    @can('joke edit', $joke)
                        <button type="submit"
                                class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 my-3 rounded focus:outline-none">
                            Save
                        </button>
                    @endcan

                    <a href="{{ route('jokes.show', $joke->id) }}"
                       class="block text-center w-full bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded focus:outline-none">
                        Cancel
                    </a>

                </form>
            </section>
        </article>
    </main>
    @include('partials.footer')
</x-guest-layout>

<script>
    document.addEventListener("DOMContentLoaded", function() {


        // Initialize SimpleMDE
        var simplemde = new SimpleMDE({
            element: document.getElementById("joke"),
            spellChecker: false,
            autofocus: true,
            autosave: {
                enabled: true,
                uniqueId: "joke",
                delay: 1000,
            },
        });

        // Handle form submission
        document.getElementById('jokeUpdateForm').addEventListener('submit', function(event) {
            event.preventDefault();
            var jokeMarkdown = simplemde.value();
            // Here you would typically send the jokeMarkdown to your server via AJAX
            console.log(jokeMarkdown);
            var formData = new FormData(this);
            formData.set('joke', jokeMarkdown);
            var jokeId = <?= $joke->id ?>;
            console.log(formData);
            console.log(jokeId);
            $.ajax({
                url: '/jokes/'+ jokeId,
                type: 'POST',
                // https://stackoverflow.com/questions/25390598/append-called-on-an-object-that-does-not-implement-interface-formdata
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    alert('Joke Updated successfully');
                    window.location.href = '/jokes/' + jokeId;
                },
                error: function(xhr, status, error) {
                    alert('Error Updating joke:', error);
                }
            });

        });

    });
</script>