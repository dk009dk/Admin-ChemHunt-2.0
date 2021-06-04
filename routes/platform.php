<?php

declare(strict_types=1);

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

//Chemhunt > Riddles > Edit
Route::screen('riddles/{riddle}/edit', App\Orchid\Screens\Chemhunt\Riddle\RiddleEditScreen::class)
    ->name('platform.chemhunt.riddles.edit');

//Chemhunt > Riddles > Create
Route::screen('riddles/create', App\Orchid\Screens\Chemhunt\Riddle\RiddleCreateScreen::class)
    ->name('platform.chemhunt.riddles.create')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Riddles Create'), route('platform.chemhunt.riddles.create'));
    });

//Chemhunt > Riddles > List
Route::screen('riddles', App\Orchid\Screens\Chemhunt\Riddle\RiddleListScreen::class)
    ->name('platform.chemhunt.riddles')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Riddles'), route('platform.chemhunt.riddles'));
    });

//Chemhunt > Users > Task -> Today
Route::screen('tasks/today',\App\Orchid\Screens\Chemhunt\Task\TasksTodayListSceen::class )
    ->name('platform.chemhunt.tasks.today')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Today Tasks'), route('platform.chemhunt.tasks.today'));
    });

//Chemhunt > Users > Task
Route::screen('tasks',\App\Orchid\Screens\Chemhunt\Task\TasksListSceen::class )
    ->name('platform.chemhunt.tasks')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Tasks'), route('platform.chemhunt.tasks'));
    });

//Chemhunt > Users > Answers
Route::screen('answers/today',\App\Orchid\Screens\Chemhunt\Answer\AnswerTodayListScreen::class )
    ->name('platform.chemhunt.answers.today')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Today Answers'), route('platform.chemhunt.answers.today'));
    });

//Chemhunt > Users > Answers
Route::screen('answers',\App\Orchid\Screens\Chemhunt\Answer\AnswerListScreen::class )
    ->name('platform.chemhunt.answers')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Answers'), route('platform.chemhunt.answers'));
    });

//Route::screen('idea', 'Idea::class','platform.screens.idea');
