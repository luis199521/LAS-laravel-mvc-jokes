<!-- resources/views/jokes/trashed.blade.php -->

<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Trashed Jokes') }}
        </h2>
    </x-slot>

    @include('partials.header')
    @include('partials.navigation')

    <main class="container mx-auto py-8 px-4">
        <h1>Recycle Bin</h1>

        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2">Users</th>
                    <th class="py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="border px-4 py-2">{{ $user->given_name }}</td>
                        <td class="border px-4 py-2">
                            <form action="{{ route('users.restore', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Restore</button>
                            </form>
                            <form action="{{ route('users.forceDelete', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete Permanently</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>

    @include('partials.footer')
</x-guest-layout>
