<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Credits | CPS530 Final Project</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body class="antialiased">
        <div id="app">
            <navi></navi>

            <div class="container">
                <div class="mt-4">
                    <h1>Credits</h1>
                </div>
                <div class="mt-4">
                    <h2>Roles</h2>
                    <h3>Melanie Soliven</h3>
                    <h4>Student #: 500874730, Section 5</h4>
                    <p>Installation, database, Laravel backend, Vue.js and Bootstrap frontend, and all writing components.</p>
                </div>
                <div class="mt-4">
                    <h2>References</h2>
                    <ul>
                        <li><a href="https://medium.com/geekculture/best-front-end-frameworks-for-web-development-of-2021-the-complete-guide-ec30098fd1d0">Best Front End Frameworks for Web Development of 2021: The Complete Guide</a></li>
                        <li><a href="https://trio.dev/blog/websites-using-vue">15 Examples of Global Websites Using Vue.js in 2022</a></li>
                        <li><a href="https://ddi-dev.com/blog/programming/the-good-and-the-bad-of-vue-js-framework-programming/">Pros and Cons of Vue.js Framework Programming</a></li>
                        <li><a href="https://trends.builtwith.com/websitelist/Laravel">Websites using Laravel</a></li>
                        <li><a href="https://medium.com/@atharva_89054/most-popular-backend-framework-of-2021-26ba2fb97b3c">Most Popular Backend Framework of 2021</a></li>
                        <li><a href="https://ddi-dev.com/blog/programming/pros-and-cons-of-laravel-framework-for-web-app-development/">Advantages and disadvantages of Laravel Framework for web Development</a></li>
                        <li><a href="https://www.digitalocean.com/community/tutorials/how-to-install-and-configure-laravel-with-nginx-on-ubuntu-20-04">How to Install and Configure Laravel 8 with Nginx on Ubuntu 20.04 (LEMP)</a></li>
                        <li><a href="https://www.digitalocean.com/community/tutorials/how-to-install-php-7-4-and-set-up-a-local-development-environment-on-ubuntu-20-04">How To Install PHP 7.4 and Set Up a Local Development Environment on Ubuntu 20.04</a></li>
                        <li><a href="https://www.digitalocean.com/community/tutorials/how-to-install-node-js-on-ubuntu-20-04">How To Install Node.js on Ubuntu 20.04</a></li>
                        <li><a href="https://www.digitalocean.com/community/tutorials/how-to-install-mysql-on-ubuntu-20-04">How To Install MySQL on Ubuntu 20.04</a></li>
                        <li><a href="https://ubuntu.com/tutorials/install-and-configure-nginx#1-overview">Install and configure Nginx</a></li>
                    </ul>
                </div>
            </div>
        </div>

    <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
