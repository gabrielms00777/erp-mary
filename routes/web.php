<?php

use App\Livewire\Group;
use App\Livewire\Person;
use App\Livewire\Product;
use App\Livewire\ProductType;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Volt::route('/', 'users.index');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/product', Product\Index::class)->name('product.index');
    Route::get('/product/create', Product\Create::class)->name('product.create')->lazy();
    Route::get('/product/{product}/edit', Product\Edit::class)->name('product.edit')->lazy();

    Route::get('/product-types', ProductType\Index::class)->name('product_types.index');
    Route::get('/product-types/create', ProductType\Create::class)->name('product_types.create');
    Route::get('/product-types/{productType}/edit', ProductType\Edit::class)->name('product_types.edit');

    Route::get('/groups', Group\Index::class)->name('groups.index');
    Route::get('/groups/create', Group\Create::class)->name('groups.create');
    Route::get('/groups/{group}/edit', Group\Edit::class)->name('groups.edit');

    Route::get('/persons', Person\Index::class)->name('persons.index');
    Route::get('/persons/create', Person\Create::class)->name('persons.create');
    Route::get('/persons/{person}/edit', Person\Edit::class)->name('persons.edit');
});
