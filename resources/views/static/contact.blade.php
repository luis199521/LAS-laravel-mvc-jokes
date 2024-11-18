<?php
/**
 * Assessment Title: Portfolio Part 3
 * Cluster:          SaaS: Part 1 – Front End Development 
 * Qualification:    ICT50220 Diploma of Information Technology (Advanced Programming)
 * Name:             Luis Alvarez Suarez
 * Student ID:       20114831
 * Year/Semester:    2024/S2
 * 
 * Contact
 * 
 * Filename: contact.blade.php
 * Location: resources/views/static
 * Project: LAS-LARAVEL-MVC-Jokes
 * Date Created: 23/09/2024
 *
 * Author: Luis Alvarez Suarez <20114831@tafe.wa.edu.au>
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
    <article class="-mx-4">
        <header class="bg-zinc-700 text-zinc-200 rounded-t-lg -mx-4 -mt-8 p-8 text-2xl font-bold mb-8">
            <h2>Welcome</h2>
        </header>

        <div class="flex flex-col flex-wrap my-4 mt-8">
            <section class="w-full max-w-lg mx-auto bg-white shadow-md rounded-lg p-6">
                <h3 class="text-2xl font-bold mb-4 text-gray-700">Contact Us</h3>
                <form method="POST" action="#">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                        <input type="text" id="name" name="name" placeholder="Your Name"
                               class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-500"
                               required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                        <input type="email" id="email" name="email" placeholder="Your Email"
                               class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-500"
                               required>
                    </div>
                    <div class="mb-4">
                        <label for="subject" class="block text-gray-700 text-sm font-bold mb-2">Subject:</label>
                        <input type="text" id="subject" name="subject" placeholder="Subject"
                               class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-500"
                               required>
                    </div>
                    <div class="mb-4">
                        <label for="message" class="block text-gray-700 text-sm font-bold mb-2">Message:</label>
                        <textarea id="message" name="message" rows="4" placeholder="Your Message"
                                  class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-500"
                                  required></textarea>
                    </div>
                    <div>
                        <button type="submit"
                                class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg transition ease-in-out duration-500">
                            Send Message
                        </button>
                    </div>
                </form>
            </section>

            @include('partials.footer')
        </div>
    </article>
</x-guest-layout>

