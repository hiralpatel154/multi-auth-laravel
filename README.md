# multi-auth-laravel
1. Custom Authentication in Laravel https://www.positronx.io/laravel-custom-authentication-login-and-registration-tutorial/ 
2. Multiple Authentication  https://onlinecode.org/how-to-implement-multiple-authentication-guards-in-laravel-10/

.env file
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME=hiralxxx@gmail.com
MAIL_PASSWORD=xxxxxx
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="hiralxxx@gmail.com"
MAIL_FROM_NAME="${APP_NAME}"

Authentication

1. composer require laravel/ui
2. php artisan ui bootstrap --auth
3.  npm install
	npm run dev
4. php artisan migrate

5. resources>views>layouts>app.blade.php
	comment or delete @vite
	 {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
	 
	public>files>bootstrap.min.css
	
	add bootstrap link in head tag
	 <link rel="stylesheet" href="{{asset('files/bootstrap.min.css')}}">
	 <script src="{{asset('files/bootstrap.min.js')}}"></script>
	 or 
	 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

6. create 3 pages - user, admin & noaccess.blade.php in views folder

7. noaccess.blade.php

	@include('/layouts/app')
	<h1 class="text-center text-danger">You Have No rights to access this  Page</h1>
	
	web.php
	Route::view('noaccess','noaccess');
	
 user.blade.php

	@include('/layouts/app')
	<h1 class="text-center text-success">Welcome User</h1>
	
	web.php
	Route::view('user','user');
	
 admin.blade.php

	@include('/layouts/app')
	<h1 class="text-center text-primary">Welcome Admin</h1>
	
	web.php
	Route::view('admin','admin');

8. Make Controller
	php artisan make:controller AuthController
	
	class AuthController extends Controller
	{
		public function userfunc(){
			return view('user');
		}
		public function adminfunc()
		{
			return view('admin');
		}
	}
8. Make a Middleware
   php artisan make:middleware AuthMiddleware
   
9. Register middleware
	Kernel.php
	protected $routeMiddleware = [
       'authweb'=>\App\Http\Middleware\AuthMiddleware::class,
    ];
	
10. Apply Middleware
	web.php
	
	Route::view('user',[AuthController::class,'userfunc'])->middleware('authweb');
	
11. AuthMiddleware.php
	public function handle(Request $request, Closure $next)
    {
        if($request->is('user'){
            return redirect('noaccess');
        }
        return $next($request);
    }
	
	
	
	
named route vs url

home.blade.php
<a href="{{route('aa')}}">Hello</a>
{{ __('You are logged in!') }}

web.php
Route::get('/aa', [App\Http\Controllers\HomeController::class, 'index'])->name('aa');


home.blade.php
<a href="{{url('aa')}}">Hello</a>
{{ __('You are logged in!') }}

web.php
Route::get('/aa', [App\Http\Controllers\HomeController::class, 'index']);
	
	


*****Laravel Breeze*****

** Laravel Breeze is a minimal, simple implementation of all of Laravel’s authentication features, including login, 
registration, password reset, email verification, and password confirmation.

** Laravel Breeze automatically scaffolds your application with the routes, controllers, and views you 
need to register and authenticate your application’s users.
You can save a lot of development time by using Laravel Breeze, and your application will become less error-prone. 


** Before we get started, you should have composer and Laravel installed to continue. 

1. composer require laravel/breeze --dev

2. php artisan breeze:install --->  to publish the authentication views, routes, controllers, and other resources to your application.

3. npm install

4. npm run dev

5. As a final step, you need to configure your database and run migrations,

6. php artisan migrate

7. php artisan serve

How to Add a Front End Framework

	php artisan breeze:install vue
	// Or
	php artisan breeze:install react
	
	npm install && npm run dev
	
	
Custom Authentication in Laravel
https://www.positronx.io/laravel-custom-authentication-login-and-registration-tutorial/

Multiple Authentication 
https://onlinecode.org/how-to-implement-multiple-authentication-guards-in-laravel-10/
