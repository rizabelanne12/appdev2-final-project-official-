<?php


use App\Http\Controllers\AuthManager;
use App\Http\Controllers\forgetPasswordManager;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login',[AuthManager::class, 'login'])->name('login');
Route::post('/login',[AuthManager::class, 'loginPost'])->name('login.post');
Route::get('/registration', [AuthManager::class, 'registration'])->name('registration');
Route::post('/registration', [AuthManager::class, 'registrationPost'])->name('registration.post');
Route::get('/logout', [AuthManager::class,'logout'])->name('logout');

route::get('/forget-password', [forgetPasswordManager::class,'forgetPassword'])
->name('forget-password');
route::post('/forget-password', [forgetPasswordManager::class,'forgetPasswordPost'])
->name('forgert-password.post');
Route::get('/reset-password/{token}',[forgetPasswordManager::class, 'resetPassword'])
->name('reset.password');
Route::post('/reset-password', [forgetPasswordManager::class,'resetPasswordPost'])
->name('reset-password.post');


// Route::resource('stories', StoryController::class);
// Route::resource('stories.chapters', ChapterController::class);



// Route::middleware(['auth'])->group(function () {
//     Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
//     Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
// });


Route::middleware(['auth'])->group(function () {
    Route::resource('stories', StoryController::class);
    Route::resource('stories.chapters', ChapterController::class);
    Route::resource('chapters', ChapterController::class);

    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

