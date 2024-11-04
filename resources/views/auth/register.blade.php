<x-guest-layout>
    <div class="flex flex-col min-h-screen"> 
        @include('partials.header')
        @include('partials.navigation')
        
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <main class="flex-grow container mx-auto bg-zinc-50 py-8 mt-8 px-4 shadow shadow-black/25 rounded-b-lg flex justify-center items-center">
            <section class="bg-white p-8 rounded-lg shadow-md md:w-500 mx-6 w-full">    
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                   
                    <div>
                        <x-input-label for="given_name" :value="__('Given Name')" />
                        <x-text-input id="given_name" class="block mt-1 w-full" type="text" name="given_name" :value="old('given_name')" required autofocus autocomplete="given_name" />
                        <x-input-error :messages="$errors->get('given_name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="nickname" :value="__('Nickname')" />
                        <x-text-input id="nickname" class="block mt-1 w-full" type="text" name="nickname" :value="old('nickname')" required autocomplete="nickname" />
                        <x-input-error :messages="$errors->get('nickname')" class="mt-2" />
                    </div>

                   
                    <div class="mt-4">
                        <x-input-label for="family_name" :value="__('Family Name')" />
                        <x-text-input id="family_name" class="block mt-1 w-full" type="text" name="family_name" :value="old('family_name')" autocomplete="family_name" />
                        <x-input-error :messages="$errors->get('family_name')" class="mt-2" />
                    </div>

                  
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                 
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <x-primary-button class="ms-4">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </form>
            </section>
        </main>

        @include('partials.footer')
    </div>
</x-guest-layout>
