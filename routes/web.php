<?php

use App\Http\Controllers\CharacterController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\QuestController;
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
    return view('home');
});

Route::get('/register-page', [PageController::class, 'register_page'])->name('register-page');
Route::get('/home', [PageController::class, 'home'])->name('home');
Route::get('/create-character-page', [PageController::class, 'create_character_page'])->name('create-character-page');
Route::get('/manage-quest-page', [PageController::class, 'manage_quest_page'])->name('manage-quest-page');
Route::get('/manage-item-page', [PageController::class, 'manage_item_page'])->name('manage-item-page');
Route::get('/forest', [PageController::class, 'forest'])->name('forest');
Route::get('/town', [PageController::class, 'town'])->name('town');

Route::post('/register', [UserController::class, 'register'])->name('register');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::any('/edit-profile', [UserController::class, 'editProfile']);

Route::post('/create-post', [PostController::class, 'createPost']);
Route::post('/edit-post/{post}', [PostController::class, 'editPost']);
Route::any('/delete-post/{post}', [PostController::class, 'deletePost']);
Route::get('/roleplay', [PostController::class, 'showPosts'])->name('roleplay');
Route::post('/roleplay/filter', [PostController::class, 'filterPosts']);

Route::post('/create-character', [CharacterController::class, 'createCharacter'])->name('create-character');
Route::get('/show-character/{id}', [CharacterController::class, 'showCharacter'])->name('show-character');
Route::get('/citizens', [CharacterController::class, 'showAllCharacters'])->name('citizens');
Route::get('/edit-character/{character}', [CharacterController::class, 'editWindow'])->name('editWindow');
Route::put('/edit-character/{character}', [CharacterController::class, 'editCharacter']);
Route::any('/delete-character/{character}', [CharacterController::class, 'deleteCharacter']);

Route::get('/castle', [QuestController::class, 'showQuests'])->name('castle');
Route::post('/create-quest', [QuestController::class, 'createQuest'])->name('create-quest');
Route::delete('/delete-quest/{id}', [QuestController::class, 'deleteQuest'])->name('delete-quest');

Route::post('/create-item', [ItemController::class, 'createItem'])->name('create-item');
