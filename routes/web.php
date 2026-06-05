<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\Login;
use App\Livewire\Items\CreateItem;
use App\Livewire\Items\ItemList;
use Illuminate\Support\Facades\Auth;
use App\Livewire\UserManagement\AddUser;
use App\Livewire\UserManagement\UserList;
use App\Livewire\UserManagement\Branches;
use App\Livewire\UserManagement\EditUser;
use App\Livewire\Items\EditItem;
use App\Livewire\Items\AssignedUserItem;






Route::get('/', Login::class)->name('login');

Route::middleware('auth')->group(function () {
    Route::get('/items', ItemList::class)->name('items.index');
    Route::get('/items/create', CreateItem::class)->name('items.create');
    Route::get('/items/{item}/edit', EditItem::class)
    ->name('items.edit');
});


Route::get('/assigned-assets', AssignedUserItem::class)
    ->name('assigned-assets');

    
Route::middleware(['auth'])->group(function () {

    Route::get('/users', UserList::class)
        ->name('users.index');

    Route::get('/users/create', AddUser::class)
        ->name('users.create');

        Route::get('/users/{user}/edit', EditUser::class)
    ->name('users.edit');
    

});


Route::get('/branches', Branches::class)->name('branches.index');




Route::post('/logout', function () {
    Auth::logout();

    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect()->route('login');
})->name('logout');