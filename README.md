# Laravel Jokes
<a name="readme-top"></a>


#### Built With

[![PHP][Php.com]][Php-url]
[![Laravel][Laravel.com]][Laravel-url]
[![Tailwindcss][Tailwindcss.com]][Tailwindcss-url]
[![Livewire][Livewire.com]][Livewire-url]
[![Inertia][Inertia.com]][Inertia-url]



## Definitions

| Term | Definition                                                                                                  |
|----|-------------------------------------------------------------------------------------------------------------|
| BREAD | Database operations to Browse, Read, Edit, Add and Delete data                                               |
| CRUD | More commonly used term over BREAD. Create (Add), Retrieve (Browse/Read), Update (Edit) and Delete (Delete) |
| MVC | Model-View-Controller A software design pattern for implementing user interfaces, data, and controlling logic.|
| HTTP Verb | Methods to indicate the desired action to be performed on a resource. Common verbs include GET, POST, PUT, DELETE.|



<p align="right">(<a href="#readme-top">back to top</a>)</p>



## Description

- What was your motivation?
- My motivation was learning more about Laravel because it is a really popular framework that i always wanted to work with
- Why did you build this project? 
  I built it to learn more about Laravel and everything it has to offer
- What problem does it solve?
- We can have a control of jokes, users, perfom operations and manage them
- What did you learn?
- I learnt too many things while doing this app, Laravel was completely new for me so i learnt it, i also learnt about authenticacion with sactum and roles and permissions with Spatie and trash cans

<p align="right">(<a href="#readme-top">back to top</a>)</p>



## Table of Contents



- [Description](#description)
- [Definitions](#definitions)
- [Installation](#installation)
- [Usage](#usage)
- [Credits](#credits)
- [Licence](#licence)
- [Badges](#badges)
- [Features](#features)
- [Tests](#tests)
- [Contact](#contact)

## Installation

Clone the repository: git clone https://github.com/luis199521/LAS-laravel-mvc-jokes

Navigate into the directory: cd your-app

Install dependencies: composer install

Copy the .env.example file to .env and configure your environment variables.

Generate an application key: php artisan key:generate

Run the migrations: php artisan migrate

Seed the database: php artisan db:seed

Start the development server: php artisan serve


<p align="right">(<a href="#readme-top">back to top</a>)</p>


## Usage

In order to use the LAS-LARAVEL-MVC-Jokes, just log in with your user in the login page, from there you will see dashboard navigation with options
to manage users and jokes it is very easy to use just access the module you want to perfom the desired action.
    
   

<p align="right">(<a href="#readme-top">back to top</a>)</p>


## Credits
- Adrian Gould https://github.com/PWA-GouldA
- Font Awesome. (n.d.). Fontawesome.com. https://fontawesome.com
- Laravel - The PHP Framework For Web Artisans. (2011). Laravel.com. https://laravel.com
- Laravel Bootcamp - Learn the PHP Framework for Web Artisans. (n.d.). Bootcamp.laravel.com. https://bootcamp.laravel.com/
- PHP: Hypertext Preprocessor. (n.d.). Www.php.net. https://php.net
- Professional README Guide. (n.d.). Coding-Boot-Camp.github.io. Retrieved April 15, 2024, from https://coding-boot-camp.github.io/full-stack/github/professional-readme-guide
- TailwindCSS. (2023). Tailwind CSS - Rapidly build modern websites
  without ever leaving your HTML. Tailwindcss.com. https://tailwindcss.com/


<p align="right">(<a href="#readme-top">back to top</a>)</p>



## Badges

<!-- PROJECT SHIELDS -->
<!--
*** I'm using markdown "reference style" links for readability.
*** Reference links are enclosed in brackets [ ] instead of parentheses ( ).
*** See the bottom of this document for the declaration of the reference variables
*** for contributors-url, forks-url, etc. This is an optional, concise syntax you may use.
*** https://www.markdownguide.org/basic-syntax/#reference-style-links
***
*** Forks, Issues and Licence Shields will NOT appear for Private Repos.
*** You may want to remove this section for this assessment.
*** Delete this block of comments once you have edited this ReadMe.
***
***
-->

[![Forks][forks-shield]][forks-url]
[![Issues][issues-shield]][issues-url]
[![Educational Community Licence][licence-shield]][licence-url]


<p align="right">(<a href="#readme-top">back to top</a>)</p>

## Features

Workopia features include, but are not limited to:

#### Work Listings
Work listings have the usual CRUD/BREAD operations including:

* Browse Listings [Guest, User, Admin]
* Retrieve Listing [Guest, User, Admin]
    * includes search
* Edit Listing [Admin, Owner]
* Update Listing [Admin, Owner]
* Delete Listing [Admin, Owner]

#### Users
* User self registration [Guest]
* Login [Registered User]
* Logout [Registered User]
* Profile Edit [Admin, Owner]
* Account admin [Admin, Owner]

#### Administration
* Work BREAD [Admin]
* User BREAD [Admin]
* Permissions Admin [Admin]

<p align="right">(<a href="#readme-top">back to top</a>)</p>

## Tests

Go the extra mile and write tests for your application. Then provide examples on how to run them here.


<p align="right">(<a href="#readme-top">back to top</a>)</p>


## Contact

Luis Alvarez Suarez - 20114831@tafe.wa.edu.au

Project Link: https://github.com/luis199521/LAS-laravel-mvc-jokes

<p align="right">(<a href="#readme-top">back to top</a>)</p>



## Licence

This project is licensed under the MIT License. See the LICENSE file for more details.

<p align="right">(<a href="#readme-top">back to top</a>)</p>



---




<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->

[forks-shield]: http://img.shields.io/github/forks/adygcode/workopia-laravel-v11.svg?style=for-the-badge

[forks-url]: https://github.com/AdyGCode/workopia-laravel-v11/network/members

[issues-shield]: http://img.shields.io/github/issues/adygcode/workopia-laravel-v11.svg?style=for-the-badge

[issues-url]: https://github.com/adygcode/workopia-laravel-v11/issues

[licence-shield]: https://img.shields.io/github/license/adygcode/workopia-laravel-v11.svg?style=for-the-badge

[licence-url]: https://github.com/adygcode/workopia-laravel-v11/blob/main/License.md

[product-screenshot]: images/screenshot.png

[Laravel.com]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white

[Laravel-url]: https://laravel.com

[Tailwindcss.com]: https://img.shields.io/badge/Tailwindcss-06B6D4?style=for-the-badge&logo=tailwindcss&logoColor=white

[Tailwindcss-url]: https://tailwindcss.com

[Livewire.com]: https://img.shields.io/badge/Livewire-4E56A6?style=for-the-badge&logo=livewire&logoColor=white

[Livewire-url]: https://livewire.laravel.com

[Inertia.com]: https://img.shields.io/badge/Inertia-9553E9?style=for-the-badge&logo=inertia&logoColor=white

[Inertia-url]: https://inertiajs.com

[Php.com]: https://img.shields.io/badge/Php-777BB4?style=for-the-badge&logo=php&logoColor=white

[Php-url]: https://inertiajs.com

[VSCode.com]: ...
