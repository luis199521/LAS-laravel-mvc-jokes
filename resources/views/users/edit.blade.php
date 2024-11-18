<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Edit | Users | LAS-Laravel-Jokes') }}
        </h2>
    </x-slot>
    @include('partials.header')
    @include('partials.navigation')
    <main class="container mx-auto bg-zinc-50 py-8 px-4 shadow shadow-black/25 rounded-b-lg flex flex-col flex-grow">
        <article>
            <header class="bg-zinc-700 text-zinc-200 -mx-4 -mt-8 p-8 mb-8 flex">
                <h1 class="grow text-2xl font-bold">Users - Edit</h1>
                @can('user add')
                    <p class="text-md flex-0 px-8 py-2 bg-emerald-500 hover:bg-emerald-600 text-white rounded transition ease-in-out duration-500">
                        <a href="{{ route('users.create') }}">Add User</a>
                    </p>
                @endcan
            </header>

            <section>
                @include('partials.message', ['errors' => $errors ?? []])

                <form method="POST" action="{{ route('users.update', $user->id) }}">
                    @csrf
                    @method('PUT')

                    <h2 class="text-2xl font-bold mb-6 text-left text-gray-500">
                        User Information
                    </h2>

                    <div class="mb-4">
                        <label for="GivenName" class="mt-4 pb-1">Family Name:</label>
                        <input type="text" placeholder="Given Name"
                               id="GivenName" name="given_name"
                               class="w-full px-4 py-2 border rounded focus:outline-none"
                               value="{{ old('given_name', $user->given_name) }}"/>
                    </div>

                    <div class="mb-4">
                        <label for="FamilyName" class="mt-4 pb-1">Given Name:</label>
                        <input type="text" placeholder="Family Name"
                               id="FamilyName" name="family_name"
                               class="w-full px-4 py-2 border rounded focus:outline-none"
                               value="{{ old('family_name', $user->family_name) }}"/>
                    </div>

                    <div class="mb-4">
                        <label for="nickname" class="mt-4 pb-1">Nickname:</label>
                        <input type="text" placeholder="Nickname"
                               id="nickname" name="nickname"
                               class="w-full px-4 py-2 border rounded focus:outline-none"
                               value="{{ old('nickname', $user->nickname) }}"/>
                    </div>

                    <section class="mb-4">
                        <label for="Email" class="mt-4 pb-1">Email:</label>
                        <input type="email" id="Email"
                               name="email" placeholder="Email Address"
                               class="w-full px-4 py-2 border border-b-zinc-300 rounded focus:outline-none"
                               value="{{ old('email', $user->email) }}"/>
                    </section>

                    <section class="mb-4">
                        <label for="Password" class="mt-4 pb-1">Password:</label>
                        <input type="password" id="Password"
                               name="user_password" placeholder="Password"
                               class="w-full px-4 py-2 border border-b-zinc-300 rounded focus:outline-none"/>
                    </section>

                    <section class="mb-4">
                        <label for="PasswordConfirmation" class="mt-4 pb-1">Confirm password:</label>
                        <input type="password" id="PasswordConfirmation"
                               name="password_confirmation" placeholder="Confirm Password"
                               class="w-full px-4 py-2 border border-b-zinc-300 rounded focus:outline-none"/>
                    </section>

                    <section class="mb-4">
                        <label for="Role" class="mt-4 pb-1">Role:</label>
                        <select id="Role" name="role" class="w-full px-4 py-2 border rounded focus:outline-none">
                            @foreach($roles as $role)
                                <option value="{{ $role->name }}" {{ old('role', $user->roles->first()->name) == $role->name ? 'selected' : '' }}>
                                    {{ ucfirst($role->name) }}
                                </option>
                            @endforeach
                        </select>
                    </section>

                    <button type="submit"
                            class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 my-3
                               rounded focus:outline-none">
                        Save
                    </button>

                    <a href="{{ route('users.show', $user->id) }}"
                       class="block text-center w-full bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded
                      focus:outline-none">
                        Cancel
                    </a>
                </form>
            </section>
        </article>
    </main>
    @include('partials.footer')
</x-guest-layout>
