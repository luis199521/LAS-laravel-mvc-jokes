<?php
/**
 * Assessment Title: Portfolio Part 3
 * Cluster:          SaaS: Part 1 – Front End Development 
 * Qualification:    ICT50220 Diploma of Information Technology (Advanced Programming)
 * Name:             Luis Alvarez Suarez
 * Student ID:       20114831
 * Year/Semester:    2024/S2
 * 
 * About
 * 
 * Filename: about.blade.php
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
        <div class="flex flex-col flex-wrap my-4 mt-8">
            <main class="container mx-auto bg-zinc-50 py-8 px-4 shadow shadow-black/25 rounded-b-lg flex flex-col flex-grow">
                <article>
                    <header class="bg-sky-500 text-zinc-200 -mx-4 -mt-8 p-8 mb-8 flex">
                        <h1 class="grow text-2xl font-bold">About</h1>
                    </header>
            
                    <section class="text-xl text-zinc-500 my-8">
                        <h2 class="text-xl font-bold mb-4">Developer's Information</h2>
                        <table class="min-w-full border-collapse border border-gray-400 text-left">
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">Name</td>
                                <td class="border border-gray-300 px-4 py-2">Luis Alvarez Suarez</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">Email</td>
                                <td class="border border-gray-300 px-4 py-2">20114831@tafe.wa.edu.au</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">Contact Phone</td>
                                <td class="border border-gray-300 px-4 py-2">+61 0414539022</td>
                            </tr>
                        </table>
            
                        <h2 class="text-xl font-bold mt-6 mb-4">Application's Overview</h2>
                        <p class="mb-4">
                            LAS-LARAVEL-MVC-JOKES helps create an easy joke system using Laravel . This system
                            allows users to sign up, log in, and handle jokes as well as manage other users. They can add, change,
                            and remove jokes and users that they have created.
                        </p>
            
                        <h2 class="text-xl font-bold mt-6 mb-4">Technical Information</h2>
                        <table class="min-w-full border-collapse border border-gray-400 text-left">
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">Programming Languages</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <ul class="list-disc pl-5">
                                        <li>PHP 8.3.11</li>
                                        <li>Laravel Framework 11.29.0</li>
                                        <li>SQlite 3.19.1</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">Servers</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <ul class="list-disc pl-5">
                                        <li>Apache 2.4.54</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">Supporting Systems</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <ul class="list-disc pl-5">
                                        <li>Git</li>
                                        <li>Laragon</li>
                                    </ul>
                                </td>
                            </tr>
                        </table>
            
                        
                    </section>
                </article>
            </main>
        

            @include('partials.footer')
            


        </div>

    </article>

</x-guest-layout>
