<?php

namespace App\Orchid\Layouts\Chemhunt\Task;

use App\Models\User;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class TaskListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'users';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): array
    {
        return [
            TD::make('name', __('Name'))
                ->sort()
            ->render(function (User $user){
                return $user->first_name.' '.$user->last_name;
            }),

            TD::make('user_email', __('Email'))
                ->sort()
                ->filter(TD::FILTER_TEXT),

            TD::make('email', __('ChemHunt Id'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT)
                ->render(function (User $user) {
                    return ModalToggle::make($user->email)
                        ->modal('oneAsyncModal')
                        ->modalTitle('Task '.$user->email)
                        ->method('saveTask')
                        ->asyncParameters([
                            'user' => $user->id,
                        ]);
                }),

            TD::make('task.day_1', __('Task 1'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT)
                ->render(function (User $user) {
                return $user->task->day_1 === 'Pending'
                    ? '<i class="text-danger">●</i> Pending'
                    : '<i class="text-success">●</i> Done';
                }),
            TD::make('task.hunt_day_1', __('Hunt 1'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT)
                ->render(function (User $user) {
                    return $user->task->hunt_day_1 === 'Pending'
                        ? '<i class="text-danger">●</i> Pending'
                        : '<i class="text-success">●</i> Done';
                }),

            TD::make('task.day_2', __('Task 2'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT)
                ->render(function (User $user) {
                    return $user->task->day_2 === 'Pending'
                        ? '<i class="text-danger">●</i> Pending'
                        : '<i class="text-success">●</i> Done';
                }),

            TD::make('task.hunt_day_2', __('Hunt 2'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT)
                ->render(function (User $user) {
                    return $user->task->hunt_day_2 === 'Pending'
                        ? '<i class="text-danger">●</i> Pending'
                        : '<i class="text-success">●</i> Done';
                }),

            TD::make('task.day_3', __('Task 3'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT)
                ->render(function (User $user) {
                return $user->task->day_3 === 'Pending'
                    ? '<i class="text-danger">●</i> Pending'
                    : '<i class="text-success">●</i> Done';
                }),

            TD::make('task.hunt_day_3', __('Hunt 3'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT)
                ->render(function (User $user) {
                return $user->task->hunt_day_3 === 'Pending'
                    ? '<i class="text-danger">●</i> Pending'
                    : '<i class="text-success">●</i> Done';
                }),

            TD::make('task.day_4', __('Task 4'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT)
                ->render(function (User $user) {
                return $user->task->day_4 === 'Pending'
                    ? '<i class="text-danger">●</i> Pending'
                    : '<i class="text-success">●</i> Done';
                }),

            TD::make('task.hunt_day_4', __('Hunt 4'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT)
                ->render(function (User $user) {
                return $user->task->hunt_day_4 === 'Pending'
                    ? '<i class="text-danger">●</i> Pending'
                    : '<i class="text-success">●</i> Done';
                }),

            TD::make('task.day_5', __('Task 5'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT)
                ->render(function (User $user) {
                return $user->task->day_5 === 'Pending'
                    ? '<i class="text-danger">●</i> Pending'
                    : '<i class="text-success">●</i> Done';
                }),

            TD::make('task.hunt_day_5', __('Hunt 5'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT)
                ->render(function (User $user) {
                return $user->task->hunt_day_5 === 'Pending'
                    ? '<i class="text-danger">●</i> Pending'
                    : '<i class="text-success">●</i> Done';
                }),

            TD::make('task.day_6', __('Task 6'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT)
                ->render(function (User $user) {
                return $user->task->day_5 === 'Pending'
                    ? '<i class="text-danger">●</i> Pending'
                    : '<i class="text-success">●</i> Done';
                }),

            TD::make('task.hunt_day_6', __('Hunt 6'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT)
                ->render(function (User $user) {
                return $user->task->hunt_day_6 === 'Pending'
                    ? '<i class="text-danger">●</i> Pending'
                    : '<i class="text-success">●</i> Done';
                }),

            TD::make('task.day_7', __('Task 7'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT)
                ->render(function (User $user) {
                return $user->task->day_7 === 'Pending'
                    ? '<i class="text-danger">●</i> Pending'
                    : '<i class="text-success">●</i> Done';
                }),

            TD::make('task.hunt_day_7', __('Hunt 7'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT)
                ->render(function (User $user) {
                return $user->task->hunt_day_7 === 'Pending'
                    ? '<i class="text-danger">●</i> Pending'
                    : '<i class="text-success">●</i> Done';
                }),
        ];
    }
}
