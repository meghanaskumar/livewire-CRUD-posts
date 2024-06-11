<?php

use App\Livewire\EditPost;
use App\Livewire\CreatePost;
use App\Livewire\ListPosts;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('create-post', CreatePost::class)
    ->middleware(['auth'])
    ->name('create-post');
Route::get('list-posts', ListPosts::class)
    ->middleware(['auth'])
    ->name('list-posts');
Route::get('edit-posts/{post}', EditPost::class)
    ->middleware(['auth'])
    ->name('edit-posts');

require __DIR__ . '/auth.php';
