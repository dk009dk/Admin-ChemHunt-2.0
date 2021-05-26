<?php

declare(strict_types=1);

use App\Orchid\Screens\Examples\ExampleCardsScreen;
use App\Orchid\Screens\Examples\ExampleChartsScreen;
use App\Orchid\Screens\Examples\ExampleFieldsAdvancedScreen;
use App\Orchid\Screens\Examples\ExampleFieldsScreen;
use App\Orchid\Screens\Examples\ExampleLayoutsScreen;
use App\Orchid\Screens\Examples\ExampleScreen;
use App\Orchid\Screens\Examples\ExampleTextEditorsScreen;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the need "dashboard" middleware group. Now create something great!
|
*/

// Main
Route::screen('/main', App\Orchid\Screens\PlatformScreen::class)
    ->name('platform.main');

// Platform > System > Users
Route::screen('admins/{user}/edit', App\Orchid\Screens\Admin\UserEditScreen::class)
    ->name('platform.systems.admins.edit');

// Platform > System > Users > Create
Route::screen('admins/create', App\Orchid\Screens\Admin\UserEditScreen::class)
    ->name('platform.systems.admins.create')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.systems.admins')
            ->push(__('Create'), route('platform.systems.admins.create'));
    });

// Platform > System > Users > Admin
Route::screen('admins', App\Orchid\Screens\Admin\UserListScreen::class)
    ->name('platform.systems.admins')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Admins'), route('platform.systems.admins'));
    });

// Platform > System > Roles > Role
Route::screen('roles/{roles}/edit', App\Orchid\Screens\Role\RoleEditScreen::class)
    ->name('platform.systems.roles.edit')
    ->breadcrumbs(function (Trail $trail, $role) {
        return $trail
            ->parent('platform.systems.roles')
            ->push(__('Role'), route('platform.systems.roles.edit', $role));
    });

// Platform > System > Roles > Create
Route::screen('roles/create', App\Orchid\Screens\Role\RoleEditScreen::class)
    ->name('platform.systems.roles.create')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.systems.roles')
            ->push(__('Create'), route('platform.systems.roles.create'));
    });

// Platform > System > Roles
Route::screen('roles', App\Orchid\Screens\Role\RoleListScreen::class)
    ->name('platform.systems.roles')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Roles'), route('platform.systems.roles'));
    });

//ChemHunt

//Chemhunt > Users > Edit
Route::screen('users/{user}/edit', App\Orchid\Screens\Chemhunt\User\UserEditScreen::class)
    ->name('platform.chemhunt.users.edit')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Admins'), route('platform.chemhunt.users.edit'));
    });

//Chemhunt > Users > List
Route::screen('users', App\Orchid\Screens\Chemhunt\User\UserListScreen::class)
    ->name('platform.chemhunt.users')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Users'), route('platform.chemhunt.users'));
    });

//Chemhunt > Users > Task
Route::screen('tasks/day/{day}',\App\Orchid\Screens\Chemhunt\Task\TasksEditSceen::class )
    ->name('platform.chemhunt.tasks.edit')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Task'), route('platform.chemhunt.tasks.edit'));
    });

Route::screen('tasks',\App\Orchid\Screens\Chemhunt\Task\TasksListSceen::class )
    ->name('platform.chemhunt.tasks.list')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Task'), route('platform.chemhunt.tasks.list'));
    });


// Example...
Route::screen('example', ExampleScreen::class)
    ->name('platform.example')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Example screen'));
    });

Route::screen('example-fields', ExampleFieldsScreen::class)->name('platform.example.fields');
Route::screen('example-layouts', ExampleLayoutsScreen::class)->name('platform.example.layouts');
Route::screen('example-charts', ExampleChartsScreen::class)->name('platform.example.charts');
Route::screen('example-editors', ExampleTextEditorsScreen::class)->name('platform.example.editors');
Route::screen('example-cards', ExampleCardsScreen::class)->name('platform.example.cards');
Route::screen('example-advanced', ExampleFieldsAdvancedScreen::class)->name('platform.example.advanced');

//Route::screen('idea', 'Idea::class','platform.screens.idea');
