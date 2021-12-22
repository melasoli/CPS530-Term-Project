<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tutorial | CPS530 Final Project</title>

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
                    <h1>How to Create a Gallery</h1>
                </div>
                <div class="mt-4">
                    <div class="mt-4 mb-4">
                        <h2>Part 1: Laravel API</h2>
                        <div class="mt-4">
                            <!-- Tables -->
                            <h3>Create tables for artists and paintings</h3>
                            <p>Make a database in MySQL to hold your tables.<p>

                            <p>Next, in your project folder, run:</p>

                            <pre><code>
                            php artisan make:migration create_artists_table
                            php artisan make:migration create_paintings_table
                            </code></pre>

                            <p>Open your newly created artists table found in database/migrations. The artists table file will end with "..._create_artists_table.php".</p>

                            <p>Add the columns id, artist_name for this table to the up() method:</p>

                            <pre><code>
                            public method up()
                            {
                                Schema::create('artists', method (Blueprint $table) {
                                    $table->bigIncrements('id');
                                    $table->string(‘name');
                                });
                            }
                            </code></pre>

                            <p>Open the paintings table in database/migrations. The paintings table file will end with "..._create_paintings_table.php".</p>

                            <p>In the up() method, add the columns id, painting_name, creation, path, and artist_id (foreign key):
                            </p>

                            <pre><code>
                            public method up()
                            {
                                Schema::create('paintings', method (Blueprint $table) {
                                    $table->bigIncrements('id');
                                    $table->string('painting_name');
                                    $table->string('creation');
                                    $table->string('path'); // Path to image file
                        
                                    // Foreign key from artists table
                                    $table->foreignId('artist_id')->constrained('artists')->onUpdate('cascade')->onDelete('cascade');
                                });
                            }
                            </code></pre>

                            <p>Create the tables:</p>

                            <pre><code>php artisan migrate</code></pre>
                        </div>

                        <div class="mt-4">
                            <!-- JSON -->
                            <h3>Create JSON files</h3>
                            <p>Create a new folder in database/migrations and name it data. This is where you will store the JSON files to populate your tables.</p>

                            <p>Create JSON files to populate the tables. Here are previews of my files:</p>

                            <p>artists.json:</p>
                            <pre><code>
                            {
                            "artists": [
                                {
                                    "name": "Vincent Van Gogh"
                                },
                                {
                                    "name": "Claude Monet"
                                },
                        …
                                {
                                    "name": "Georgia O'Keeffe"
                                }
                            ]
                            }
                            </code></pre>

                            <p>paintings.json:</p>
                            <pre><code>
                            {
                            "painting": [
                                {
                                    "painting_name": "The Bedroom",
                                    "creation": "1888",
                                    "path": "https://micrio-cdn.vangoghmuseum.nl/ZKSPH/views/max/1280x1014.jpg",
                                    "artist_id": 1
                                },
                                {
                                    "painting_name": "Farmhouse in Provence",
                                    "creation": "1888",
                                    "path": "https://media.nga.gov/iiif/51c369a2-cc20-43f6-8262-25877c4377eb/full/!740,560/0/default.jpg",
                                    "artist_id": 1
                                },
                        …
                                {
                                    "painting_name": "Jimson Weed",
                                    "creation": "1936",
                                    "path": "https://artisticjunkie.com/wp-content/uploads/2018/10/Georgia-O-Keeffe-Flower-Paintings.jpg",
                                    "artist_id": 8
                                }
                            ]
                            }
                            </code></pre>
                        </div>

                        <div class="mt-4">
                            <!-- Models -->
                            <h3>Create models</h3>
                            <p>Create models for artists, styles, paintings, and painting styles</p>

                            <pre><code>
                            php artisan make:model Artist
                            php artisan make:model Painting
                            </code></pre>

                            <p>Open the Artist model file at app/Models/Artist.php.</p>

                            <p>Remove the following lines:</p>

                            <pre><code>
                            use Illuminate\Database\Eloquent\Factories\HasFactory;
                            use HasFactory;
                            </code></pre>

                            <p>Inside the Artist class, add this line to remove the automatically generated timestamp class variables:</p>

                            <pre><code>
                                public $timestamps = false;
                            </code></pre>

                            <p>Add the following into the Artist class:</p>

                            <pre><code>
                                protected $fillable = [‘name'];
                            </code></pre>

                            <p>This is what my Artist.php file looks like at this point:</p>

                            <pre><code>
                            namespace App\Models;
                                
                            use Illuminate\Database\Eloquent\Model;
                            
                            class Artist extends Model
                            {
                                public $timestamps = false;
                                protected $fillable = [‘name'];
                            }
                            </code></pre>

                            <p>artist_name is the only column I need to fill in my Artists table because the primary key (id) is automatically inputted.</p>

                            <p>Open the Painting model file at app/Models/Painting.php.</p>

                            <p>Remove the following lines:</p>

                            <pre><code>
                            use Illuminate\Database\Eloquent\Factories\HasFactory;
                            use HasFactory;
                            </code></pre>

                            <p>Inside the Painting class, add this line:</p>

                            <pre><code>
                                public $timestamps = false;
                            </code></pre>

                            <p>Add the following into the Painting class:</p>

                            <pre><code>
                            protected $fillable = [
                                'title',
                                'creation',
                                'path',
                                'artist_id'
                            ];
                            </code></pre>

                            <p>This is what my Painting.php file looks like at this point:</p>

                            <pre><code>
                            namespace App\Models;

                            use Illuminate\Database\Eloquent\Model;

                            class Painting extends Model
                            {
                                public $timestamps = false;
                                protected $fillable = [
                                    'title',
                                    'creation',
                                    'path',
                                    'artist_id'
                                ];
                            }

                            </code></pre>

                            <p>In app/models/Artist.php, define the one to many relationship by adding this into the class:</p>

                            <pre><code>
                            // Get paintings created by artist
                            public function paintings()
                            {
                                return $this->hasMany(Painting::class);
                            }
                            </code></pre>

                            <p>Likewise, in app/models/Painting.php, define the many to one relationship by adding this into the class:</p>

                            <pre><code>
                            // Get artist that created painting
                            public function artist()
                            {
                                return $this->belongsTo(Artist::class);
                            }
                            </code></pre>
                        </div>

                        <div class="mt-4">
                            <!-- Populate -->
                            <h3>Populate Tables</h3>
                            <p>Make seeders for all the tables</p>

                            <pre><code>
                            php artisan make:seeder ArtistSeeder
                            php artisan make:seeder PaintingSeeder
                            </code></pre>

                            <p>The new files are located in database/seeders. Open ArtistSeeder.php. We need to use the Artist class and File class (to open the JSON file). Add this to the use statements at the top:</p>

                            <pre><code>
                            use App\Models\Artist;
                            use File;
                            </code></pre>

                            <p>Inside the run() method, get the artists.json file and convert it into a PHP variable:</p>

                            <pre><code>
                            $json = File::get("database/data/artists.json");
                            $data = json_decode($json);
                            </code></pre>

                            <p>Still in the run() method, parse the artist data:</p>

                            <pre><code>
                            foreach ($data->artists as $key => $value) {
                                Artist::create([
                                    // Fill artist_name column with the values to the json names in artists.json
                                    'name' => $value->name
                                ]);
                            }
                            </code></pre>

                            <p>Open database/seeders/PaintingSeeder.php. We need to use the Painting class and File class (to open the JSON file). Add this to the use statements at the top:</p>

                            <pre><code>
                            use App\Models\Paintings;
                            use File;
                            </code></pre>

                            <p>Inside the run() method of the PaintingSeeder class, get the paintings.json file and convert it into a PHP variable:</p>

                            <pre><code>
                            foreach ($data->paintings as $key => $value) {
                                Painting::create([
                                    'painting_name' => $value->painting_name,
                                    'creation' => $value->creation,
                                    'path' => $value->path,
                                    'artist_id' => $value->artist_id
                                ]);
                            }
                            </code></pre>

                            <p>In database/seeders/DatabaseSeeder.php, add the seeder files to the run() method:</p>

                            <pre><code>
                            $this->call(ArtistSeeder::class);
                            $this->call(PaintingSeeder::class);
                            </code></pre>

                            <p>Populate the tables:</p>
                            <pre><code>
                                php artisan db:seed
                            </code></pre>
                        </div>

                        <div class="mt-4">
                            <!-- Controller -->
                            <h3>Create Controllers</h3>
                            <p>Create a new painting controller:</p>

                            <pre><code>
                                php artisan make:controller PaintingController
                            </code></pre>

                            <p>Create a painting resource:</p>

                            <pre><code>
                                php artisan make:resource PaintingResource
                            </code></pre>

                            <p>Open the new resource file at app/Http/Resources/PaintingResource.php.</p>

                            <p>We want to display the actual artist name with the paintings. Remove <code>return parent::toArray($request);</code> and replace it with:</p>

                            <pre><code>
                            return [
                                'id' => $this->id,
                                'painting_name' => $this->painting_name,
                                'creation' => $this->creation,
                                'path' => $this->path,
                                'artist' => $this->artist->artist_name
                            ];
                            </code></pre>

                            <p>Open app/Http/Controllers/PaintingController.php.</p>

                            <p>To the use statements at the top of the file, add the Painting and Artist models and the Painting resource:</p>

                            <pre><code>
                            use App\Models\Painting;
                            use App\Models\Artist;
                            use App\Http\Resources\PaintingResource;
                            </code></pre>

                            <p>In the PaintingController class, create a method named index to return all the paintings:</p>

                            <pre><code>
                            /**
                            * Display all the paintings.
                            */
                            public function index()
                            {
                                $paintings = Painting::orderBy('creation')->get();
                        
                                return PaintingResource::collection($paintings);
                            }
                           </code></pre>
                        </div>

                        <div class="mt-4">
                            <!-- Routes -->
                            <h3>Define Route</h3>
                            <p>Navigate to the file routes/api.php.</p>

                            <p>At the top of the file, add this to the use statements:</p>

                            <pre><code>
                                use App\Http\Controllers\PaintingController;
                            </code></pre>

                            <p>At the end of the file, add the following to define the API route:</p>

                            <pre><code>
                            // Get all paintings
                            Route::get('gallery', [PaintingController::class, 'index']);
                            </code></pre>
                        </div>
                    </div>
                    <div class="mt-4 mb-4">
                        <h2>Part 2: Vue.js</h2>
                        <div class="mt-4">
                            <p>In resources/views, duplicate the file welcome.blade.php and name it gallery.blade.php.</p>

                            <p>Remove everything inside the body tag and the style tags.</p>

                            <p>In the head tag, add:
                            <br>
                            <img src="{{ asset('img/styles.jpg') }}" alt="">
                            </p>

                            <p>Inside the body tag, add the following lines:
                            <br>
                            <img src="{{ asset('img/body.jpg') }}" alt="">
                            </p>

                            <p>We will now create the Vue component called gallery. In resources/js/components/, create a new file called Gallery.vue and open it.</p>

                            <p>Get the data from the API by pasting this:
                            <br>
                            <img src="{{ asset('img/script.jpg') }}" alt="">
                            </p>

                            <p>At the top of the file, create the cards for the paintings using Bootstrap:
                            <br>
                            <img src="{{ asset('img/template.jpg') }}" alt="">
                            <br>
                            <code>v-for</code> will loop through the painting data in the API. We retrive the specific attributes (title of painting, creation date, etc.) for each painting by using the double curly braces.
                            </p>

                            <p>Next, in resources/js/app.js, add this line after the window.Vue variable to register the component:
                            <br>
                            <img src="{{ asset('img/component.jpg') }}" alt="">
                            </p>

                            <p>In resources/css/app.css, add this CSS to format the card images:</p>

                            <pre><code>
                            .card-img-top {
                                width: 100%;
                                height: 35rem;
                                object-fit: cover;
                            }
                            </code></pre>

                            <p>Now, import the custom CSS by putting this into resources/sass/app.scss:</p>

                            <pre><code>
                                @import '../css/app.css';
                            </code></pre>

                            <p>Create a route to the gallery.blade.php so you can view the page in the browser by placing this inside routes/web.php:
                            <br>
                            <img src="{{ asset('img/route.jpg') }}" alt="">
                            </p>

                            <p>Finally, run <code>npm run dev</code> to compile your project. The URL slug is /gallery.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
