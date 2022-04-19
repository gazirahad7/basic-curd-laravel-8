### =============================

1. How to create new project in Laravel?

    1. run ====> composer create-project laravel/laravel example-app
    2. Then created laravel project
    3. run project // php artisan serve

### =============================

2. Set database in .env file
    1. DB_DATABASE= // your database name
    2. APP_NAME=

### =============================

3. Goto Providers folder to AppServiceProvider.php file and set

    boot() function // add below this code

    public function boot(){
    Schema::defaultStringLength(191) // set database string length
    }

    And, import Schema class

### =============================

4. Goto RouteServiceProvider.php file uncomment
   protected $namespace = 'App\Http\Controllers';

### =============================

5. How create route and access the view page ?
   simple create your route url and return
    1. Basic route
       // demo code :
       Route::get('/about', function () {
       return 'About us';
       });

### =============================

6. How to crate new controller command below:

====> php artisan make:controller PagesController
as "pagesController" is controller name

How to view page from controller ?

simple goto router folder and web.php file get take this route page in this controller

Then views

Goto resources folder
And created page folder in views, then create about page in this folder name is "about.blade.php" Then goto controller and return view('pages.about')

    // demo code:
    Route::get('/', 'PagesController@index');
    Route::get('/about', 'PagesController@about');

### =============================

7. create table in migration?

php artisan make:migration create_employees

then assign attribute in this table
and
php artisan migrate

### =============================

8. How to create Model
   php artisan make:model Employee

### =============================

9. How to create migration table and model together like shortcut way ?

php artisan make:model Demo -m // Demo as ar table name
### ========================== 
10. An problem
Laravel not assign default Model folder , so
i create an Models folder and store all models file in this file

namespace App\Models;
use App\Models\Employee;

### ================================

11. How to fetch Data From database ?

    // Demo code:
    public function index()
    {

    $posts = Post::all();

        return view('pages.blog.index', compact('posts'));

    }
    IN postController

### =============================

12. How to insert data in database?
    needed

        1. from & get from url

        must be used @csrf in form

        2. create model for from data store in the table

        Laravel 8 provided default function must be use
        // use Illuminate\Database\Eloquent\Factories\HasFactory;
        // use HasFactory

        3. create controller or function for post method

            // demo code

            public function store(Request $request)
            {
                $employee = new Employee();
                $employee->name = $request->name;
                $employee->email = $request->email;
                $employee->phone = $request->phone;
                $employee->designation = $request->designation;
                //$employee->status = $request->status;
            $employee->save();
            return redirect('employee')->with('success', 'Employee added successfully');
            }

### =============================

13. How to update data ?

    1.  update from & get from url

    must be used @csrf and @method('PUT') in form 2. Route should be this format

    Route::get('/edit-employee/{id}', 'EmployeeController@edit'); 2. Created function for edit , then argument as id if find id then return data this id and view 2.
    // demo code

    public function edit($id)
        {
            $employee = Employee::find($id);
    return view('pages.employee.edit', compact('employee'));
    }

    3.  Update data like put method created update fun
        argument are //update(Request $request, $id)

            then find id and update() then redirect page

            // demo code update fun
            public function update(Request $request, $id)
            {
                $employee = Employee::find($id);
            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->phone = $request->phone;
            $employee->designation = $request->designation;
            $employee->status = $request->status == true ? 1 : 0;
            $employee->update();
            return redirect('employee')->with('success', 'Employee updated successfully');
            }
            //

### =============================

14. Delete Data form database

### =============================

15. User Authentication System
    Below this commend run on terminal

    // composer require laravel/ui

    // php artisan ui bootstrap --auth

    Just Wow then , created Auth ui in views folder

    Then,

    // use Illuminate\Support\Facades\Auth;

    // there are many error occurs , then find error and ask to google this error

    must be same error ask, like copy error and post to google search ber

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    replace to

    Route::get('/home', 'HomeController@index');

### =============================

16. Custom Registration from?

    take required data from user for registration

    1. update migration user schema
    2. Goto User model update fillable data
    3. Then goto Register controller validator add your new data
    4. Then modify local mysql database

### =============================

17. How to login email or phone number

    1.  change login input type email to text and title as Login email | phone
    2.  Goto login controller then goto AuthenticationsUsers.php file
    3.  copy credentials function

        // demo code:

            protected function credentials(Request $request)

        {
        return $request->only($this->username(), 'password');
        }
        //
        past to LoginController end of the function and import Request class

        And set your condition

### =============================

18. CURD using Resource controller in Laravel 8

    created model & table together

    1.  run =====> php artisan make:model Post -m
        Then, added your required input data in Post migrate file and migrate
    2.  run ====> php artisan migrate // check your local DB

    3.  Then goto post model & get posts data

                // demo code
                namespace App\Models;

                use Illuminate\Database\Eloquent\Factories\HasFactory;
                use Illuminate\Database\Eloquent\Model;

                class Post extends Model
                {
                use HasFactory;

                    protected $table = 'posts';
                    protected $fillable = ['user_id', 'title', 'description', 'status'];

                }

    4.  How to Make ### Resource controller for Post

        run ====> php artisan make:controller PostController --resource

        Just magic, created controller & all functions created automatic

    5.  Created 'blog' folder in the "Pages" folder in "Views" & created index.blade.php file and set template
    6.  Get view url set in web.php as

            // Route::resource('posts', 'PostController'); // this advantage is don't needed route like url link all in the
            terminal route list u can get this

    7.  Run this commend in terminal ====> php artisan route:list

            then show all routes list // LIKE CURD

    8.  There is an big problem when render view page in many sub folder in views , this solution is

        error is: view file not found
        answer: return view('pages.blog.index'); //correct path

    9.  Working on store function // Insert DATA in DB
        set Middleware in web.php

        // demo

            Route::middleware('auth')->group(function () {
            Route::resource('posts', 'PostController');
            });

    10. How to get relationship as get posted user name

        1.  Go to post model created an function

                // demo code
                public function users()
                {
                return $this->belongsTo('App\Models\User', 'user_id');
                }

        2.  view page $item->users-name // then show posted user name

        CURD operation can follow route list in terminal

### =============================

19. How to make middleware in Laravel 8

    1.  Set admin middleware
        run ====> php artisan make:middleware AdminMiddleware // then created middleware successfully

    2.  set auth condition in handle function file as AdminMiddleware
    3.  modify DB set role_as // add new entity as role_as in users table
    4.  Goto Kernel.php file set admin middleware in $routeMiddleware as isAdmin

            //   'isAdmin' => \App\Http\Middleware\AdminMiddleware::class,

    5.  Get access all pages for admin , so how to do this?
    6.  goto web.php route and set isAdmin

        // demo code:

            Route::middleware(['auth', 'isAdmin'])->group(function () {
            Route::resource('posts', 'PostController');

        });

    7.  Then goto LoginController comment // protected $redirectTo = RouteServiceProvider::HOME;
    8.  Goto AuthenticatesUsers.php file copy below this fun and past in the loginController

            Find the "authenticated" function and copy

        // demo code:
        protected function authenticated(Request $request, $user)
        {
        //
        }

    9.  Goto LoginController set below this condition

                // demo code:
                protected function authenticated()
            {
                if(Auth::user()->role_as == '1') // 0 = user, 1 = admin
                {
                    return redirect('/posts')->with('success', 'You are logged in as Admin');
                }
                else if(Auth::user()->role_as == '0')
                {
                    return redirect('/home')->with('success', 'You are logged in as User');
                }

            }

### =============================

20. How to file upload or image upload

    1.  Input filed type file input create.php and enctype="multipart/form-data" added
    2.  Goto PostController and update code store function

        // demo code:
        if($request->hasFile('image'))
            {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
        $file->move('uploads/blog/', $filename);
        $post->image = $filename;
        }
        //

    3.  View this image this format // <img src="{{ asset('uploads/blog/'.$item->image) }}" />
    4.  How to update image ?

            1. view same as create.php file
            2. Goto PostController and set condition as update function
            3. First check old image and delete it

            // demo code:

                if($request->hasFile('image'))
                {
                    $destinationPath = 'uploads/blog/'.$post->image;
                        if(File::exists($destinationPath))
                        {
                            File::delete($destinationPath);
                        }
                    $file = $request->file('image');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time().'.'.$extension;
                    $file->move('uploads/blog/', $filename);
                    $post->image = $filename;
                }
                //

            1. Should be import file class as // use Illuminate\Support\Facades\File;

    5.  How to delete file ?

        1. just add this code in destroy file

        // demo code

        $destinationPath = 'uploads/blog/'.$post->image;
        if(File::exists($destinationPath))
                {
                    File::delete($destinationPath);
        }

### =============================

21. How use from validation ?

    1. Added below this code

    // demo code:
    $request->validate([
    'name' => 'required|min:4|max:20',
    'email' => 'required|email|max:255|unique:employees',
    'phone' => 'required',
    'designation' => 'required',
    ]);

    2. How show in error massage in the views ?

        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
