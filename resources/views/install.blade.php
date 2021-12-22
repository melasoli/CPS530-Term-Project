<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Installation | CPS530 Final Project</title>

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
                    <h1>How to Install Laravel and Vue.js + Bootstrap on Ubuntu 20.04.3 LTS</h1>
                </div>
                <div class="mt-4">

                    <h2>Prerequisites</h2>
                    <ul>
                        <li>Ubuntu sudo user account</li>
                        <li><a href="https://www.digitalocean.com/community/tutorials/how-to-install-php-7-4-and-set-up-a-local-development-environment-on-ubuntu-20-04">PHP</a></li>
                        <li><a href="https://getcomposer.org/download/">Composer</a></li>
                        <li><a href="https://www.digitalocean.com/community/tutorials/how-to-install-node-js-on-ubuntu-20-04">Node.js/npm</a></li>
                        <li><a href="https://www.digitalocean.com/community/tutorials/how-to-install-nginx-on-ubuntu-20-04">Nginx</a></li>
                        <li><a href="https://www.digitalocean.com/community/tutorials/how-to-install-mysql-on-ubuntu-20-04">MySQL</a></li>
                    </ul>
                    
                    <div class="mt-4 mb-4">
                        <h2>Part 1: Laravel</h2>
                        <div class="mt-4">
                            <!-- PHP modules -->
                            <h3>Install required PHP modules</h3>
                            <p>Laravel requires <a href="https://laravel.com/docs/5.8/installation#server-requirements">a few modules</a> to be installed on a server. First, make sure that the list of packages on the system are up to date:</p>

                            <pre><code>
                                sudo apt update
                            </code></pre>

                            <p>Next, install the modules:</p>

                            <pre><code>
                                sudo apt install php7.4-fpm php7.4-mysql php7.4-mbstring php7.4-xml php7.4-bcmath
                            </code></pre>
                        </div>

                        <div class="mt-4">
                            <!-- Laravel -->
                            <h3>Install Laravel</h3>
                            <p>Go to your home folder:</p>

                            <pre><code>
                                cd ~
                            </code></pre>

                            <p>Create a laravel project, replacing <code>project_name</code> with the name of your project.</p>

                            <pre><code>
                                composer create-project laravel/laravel --prefer-dist project_name
                            </code></pre>

                            <p>Go into the project directory and make sure the components were installed successfully:</p>

                            <pre><code>
                                cd project_name
                                php artisan
                            </code></pre>

                            <p>The output should look similar to this:</p>

                            <pre><code>
                                Laravel Framework 8.74.0
                                Usage:
                                command [options] [arguments]

                                Options:
                                -h, --help            Display help for the given command. When no command is given display help for the list command
                                …
                            </code></pre>
                        </div>

                        <div class="mt-4">
                            <!-- Configure -->
                            <h3>Configure Laravel</h3>
                            <p>In the project root folder, open the .env file and customize the environment variables:</p>

                            <pre><code>
                                nano .env
                            </code></pre>

                            <p>The following variables are used in my project:</p>

                            <pre><code>
                                APP_NAME=cps530_final
                                APP_ENV=local
                                APP_KEY=my_app_key
                                APP_DEBUG=false
                                APP_URL=http://http://159.89.120.161/
                                
                                ...
                                
                                DB_CONNECTION=mysql
                                DB_HOST=127.0.0.1
                                DB_PORT=3306
                                DB_DATABASE=my_db_name
                                DB_USERNAME=my_db_username
                                DB_PASSWORD=my_db_pw
                            </code></pre>

                            <p>Input your database variables as well. <code>APP_KEY</code> should be auto-generated, so you don't need to change this.</p>
                        </div>

                        <div class="mt-4">
                            <!-- Mix -->
                            <h3>Install Mix Dependency</h3>
                            <p>This will be for packaging CSS and JS files:</p>

                            <pre><code>
                                npm install
                                npm run dev
                            </code></pre>
                        </div>

                        <div class="mt-4">
                            <!-- Nginx -->
                            <h3>Setup Nginx for the Laravel Project</h3>
                            <p>We will use Nginx as a web server. Run the following command to move your Laravel project to the default root folder of the server:</p>

                            <pre><code>
                                sudo mv ~/project_name /var/www/project_name
                            </code></pre>

                            <p>Make yourself the owner with Nginx as group:</p>

                            <pre><code>
                                sudo chown -R $USER:www-data .
                            </code></pre>

                            <p>Assign the correct permissions to /var/www/project_name:</p>

                            <pre><code>
                                sudo find /var/www/project_name -type d -exec chmod 775 {} \;
                                sudo find /var/www/project_name -type f -exec chmod 644 {} \;
                            </code></pre>

                            <p>Give Nginx permission to read and write to storage and cache:</p>

                            <pre><code>
                                sudo chgrp -R www-data /var/www/project_name/storage /var/www/project_name/bootstrap/cache
                                sudo chmod -R ug+rwx /var/www/project_name/storage /var/www/project_name/bootstrap/cache
                            </code></pre>

                            <p>Create a new virtual host configuration file:</p>

                            <pre><code>
                                sudo nano /etc/nginx/sites-available/project_name
                            </code></pre>

                            <p>Copy the <a href="https://laravel.com/docs/8.x/deployment#server-configuration">recommended configuration</a> for Nginx into this file. Make sure to change server_name to your project’s URL. Also, change root to your project’s public HTML folder, which in this case, is /var/www/project_name/public.</p>

                            <p>Remove the default Nginx configuration file:</p>

                            <pre><code>
                                sudo rm -f /etc/nginx/sites-enabled/default
                            </code></pre>

                            <p>Activate the new configuration file:</p>

                            <pre><code>
                                sudo ln -s /etc/nginx/sites-available/project_name /etc/nginx/sites-enabled/
                            </code></pre>

                            <p>Confirm there are no errors in the configuration:</p>

                            <pre><code>
                                sudo nginx -t
                            </code></pre>

                            <p>The output should look like this:</p>

                            <pre><code>
                                nginx: the configuration file /etc/nginx/nginx.conf syntax is ok
                                nginx: configuration file /etc/nginx/nginx.conf test is successful
                            </code></pre>

                        </div>
                    </div>

                    <div class="mt-4 mb-4">
                        <h2>Part 2: Vue.js + Bootstrap</h2>
                        <div class="mt-4">
                            <h3>Install Vue.js and Bootstrap through Laravel UI</h3>
                            <pre><code>
                                cd /var/www/project_name
                                composer require laravel/ui
                                php artisan ui bootstrap
                                php artisan ui vue
                                npm install && npm run dev                                    
                            </code></pre>

                            <p>If you receive an error, run <code>npm run dev</code> again.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
