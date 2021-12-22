<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CPS530 Final Project</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body class="antialiased">
        <div id="app">
            <navi></navi>

            <div class="container">
                <div class="row mt-4">
                    <h1>Summary</h1>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-6">
                        <h2>Frontend: Vue.js</h2>
                        <img width="20%" src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Vue.js_Logo_2.svg/1200px-Vue.js_Logo_2.svg.png" alt="Vue logo"><br>
                        <p class="mt-4">
                            Vue.js is a frontend JavaScript framework used to build user interfaces. Vue.js is used by Netflix, Adobe, and GitLab developers.<br><br>

                            <b>Popularity:</b> Vue.js has become more popular in recent years. It is up there for one of the most popular frameworks with React and Angular.</p>

                            <b>Strengths:</b>
                            <ul>
                                <li>Beginner-friendly - It is easy to pick up</li>
                                <li>Compatibility - Vue can be used with many backend frameworks, including Laravel and Django</li>
                                <li>Lightweight</li>
                            </ul>

                            <b>Weaknesses:</b>
                            <ul>
                                <li>Lack of scalability - Managed by a small team</li>
                                <li>Lack of plugins - Small community</li>
                            </ul>
                    </div>
                    <div class="col-lg-6">
                        <h2>Backend: Laravel</h2>
                        <img width="20%" src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/1200px-Laravel.svg.png" alt="Laravel logo"><br>
                        <p class="mt-4">
                            Laravel is a backend PHP framework. Because of its database interaction capabilities, it is used on sites that use authentication. It is also used to build APIs. Sites that use Laravel include Weibo, Laracasts, and Puppyspot.</p>

                            <b>Popularity:</b> Laravel is one of the most popular backend frameworks, alongside Express.js and Django. It is the most popular PHP framework.<br><br>

                            <b>Strengths:</b>
                            <ul>
                                <li>Built-in authentication system</li>
                                <li>MVC architecture - Easily maintain parts of your software</li>
                                <li>Cache support</li>
                                <li>Large community</li>
                            </ul>

                            <b>Weaknesses:</b>
                            <ul>
                                <li>Steep learning curve</li>
                                <li>Complicated documentation - Not easy to pick up by beginners</li>
                            </ul>
                    </div>
                </div>
            </div>
        </div>

    <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
