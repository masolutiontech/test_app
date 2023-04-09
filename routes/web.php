<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Author\AuthorDAshboardComponent;
use App\Http\Livewire\Author\Books\AllBooksComponent;
use App\Http\Livewire\Author\Books\CreateBookComponent;
use App\Http\Livewire\Author\Books\EditBookComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;

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
// website routes //
Route::get('/',[App\Http\Controllers\Controller::class,'index']);
// users dashboard //
Route::middleware([
    'auth:sanctum','verified'])->group(function () {
    
});
//   Author Dashboard Routes //
Route::middleware(['auth:sanctum','verified','author'])->group(function () {
    Route::get('/author/dashboard',AuthorDAshboardComponent::class)->name('author.dashboard');
    Route::get('/author/view/list/books',AllBooksComponent::class)->name('author.list_of_books');
    Route::get('/author/add/new/book',CreateBookComponent::class)->name('author.add_book');
    Route::get('/auther/edit/book/{id}',EditBookComponent::class)->name('author.edit_book');
   
});
// Admin Dashboard Routes //
Route::middleware(['auth:sanctum','verified','admin'])->group(function () {
    Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
   
});
