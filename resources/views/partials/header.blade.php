<?php
/**
 * Header template
 * 
 * Filename: header.blade.php
 * Location: resources/views/partials
 * Project: LAS-LARAVEL-MVC-Jokes
 * Date Created: 27/10/2024
 *
 * Author: Luis Alvarez Suarez <20114831@tafe.wa.edu.au>
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $pageTitle ?? 'Joker' }}</title>
    <link rel="stylesheet" href="/assets/css/site.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
</head>
<body class="bg-zinc-800 flex flex-col h-screen justify-between">
