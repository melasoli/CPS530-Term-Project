<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Conclusion | CPS530 Final Project</title>

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
                    <h1>Conclusion</h1>
                </div>
                <div class="mt-4">
                    <div class="mt-4 mb-4">
                        <h2>Did these frameworks perform to your expectations?</h2>
                        <p>These frameworks did perform to my expectations. The only expectation I had for Laravel was for it to perform database interactions, which it is able to do. I only expected Vue to fetch the data from my API, but I was surprised at how easy it was to create reusable components.</p>
                    </div>
                    <div class="mt-4 mb-4">
                        <h2>Were they difficult to install or configure?</h2>
                        <p>Installing and configuring both frameworks was easy. Laravel and Vue could be installed easily on Ubuntu through the command line. Configuring Laravel was straight forward because of the documentation on Nginx.</p>
                    </div>
                    <div class="mt-4 mb-4">
                        <h2>Was it easy to create the page(s) with it?</h2>
                        <p>Creating the API was difficult and time-consuming because it involved many commands and file creations to interact correctly with the database. But once the API was running, displaying the information with Vue was easy.</p>
                    </div>
                    <div class="mt-4 mb-4">
                        <h2>Was the learning curve steep compared with regular HTML/CSS/JavaScript/PHP?</h2>
                        <p>Laravel has a steep learning curve. This project required PHP object-oriented programming, which we did not learn in class. Meanwhile, I had almost no problems at all with Vue. Its syntax is similar to HTML and JavaScript, both of which I have some experience with.</p>
                    </div>
                    <div class="mt-4 mb-4">
                        <h2>Would you have done things differently in retrospect?</h2>
                        <p>I wanted to add more capability to my project. Specifically, I wanted to add buttons to filter the paintings by artist, but with the amount of time I spent implementing the simple gallery in Laravel, I was unable to do exactly what I wanted.</p>
                    </div>
                    <div class="mt-4 mb-4">
                        <h2>Did you regret your choice of frameworks?</h2>
                        <p>Despite the difficulties, I do not regret my choice of frameworks. I think that Laravel is a powerful framework and is worth learning, especially if you have experience with PHP OOP. In addition, I think that Vue was the perfect choice to use with Laravel because of the seamless integration. I learned that Vue was packaged with Laravel in previous versions of Laravel!</p>
                    </div>
                </div>
            </div>
        </div>

    <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
