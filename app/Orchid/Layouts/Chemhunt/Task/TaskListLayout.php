<?php

namespace App\Orchid\Layouts\Chemhunt\Task;

use App\Models\Task;
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
    protected $target = 'tasks';

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
            ->render(function (Task $task){
                return $task->user->first_name.' '.$task->user->last_name;
            }),

            TD::make('user.user_email', __('Email'))
                ->sort()
                ->filter(TD::FILTER_TEXT),

            TD::make('user.email', __('ChemHunt Id'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT)
                ->render(function (Task $task) {
                    return ModalToggle::make($task->user->email)
                        ->modal('oneAsyncModal')
                        ->modalTitle('Task '.config('chemhunt.day').' '.$task->user->email)
                        ->method('saveTask')
                        ->asyncParameters([
                            'task' => $task->id,
                        ]);
                }),

            TD::make('day_1', __('Task 1'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT)
                ->render(function (Task $task) {
                return $task->day_1 === 'Pending'
                    ? '<i class="text-danger">●</i> Pending'
                    : '<i class="text-success">●</i> Done';
                }),

            TD::make('hunt_day_1', __('Hunt 1'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT)
                ->render(function (Task $task) {
                    return $task->hunt_day_1 === 'Pending'
                        ? '<i class="text-danger">●</i> Pending'
                        : '<i class="text-success">●</i> Done';
                }),

            TD::make('day_2', __('Task 2'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT)
                ->render(function (Task $task) {
                    return $task->day_2 === 'Pending'
                        ? '<i class="text-danger">●</i> Pending'
                        : '<i class="text-success">●</i> Done';
                }),

            TD::make('hunt_day_2', __('Hunt 2'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT)
                ->render(function (Task $task) {
                    return $task->hunt_day_2 === 'Pending'
                        ? '<i class="text-danger">●</i> Pending'
                        : '<i class="text-success">●</i> Done';
                }),

            TD::make('day_3', __('Task 3'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT)
                ->render(function (Task $task) {
                return $task->day_3 === 'Pending'
                    ? '<i class="text-danger">●</i> Pending'
                    : '<i class="text-success">●</i> Done';
                }),

            TD::make('hunt_day_3', __('Hunt 3'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT)
                ->render(function (Task $task) {
                return $task->hunt_day_3 === 'Pending'
                    ? '<i class="text-danger">●</i> Pending'
                    : '<i class="text-success">●</i> Done';
                }),

            TD::make('day_4', __('Task 4'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT)
                ->render(function (Task $task) {
                return $task->day_4 === 'Pending'
                    ? '<i class="text-danger">●</i> Pending'
                    : '<i class="text-success">●</i> Done';
                }),

            TD::make('hunt_day_4', __('Hunt 4'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT)
                ->render(function (Task $task) {
                return $task->hunt_day_4 === 'Pending'
                    ? '<i class="text-danger">●</i> Pending'
                    : '<i class="text-success">●</i> Done';
                }),

            TD::make('day_5', __('Task 5'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT)
                ->render(function (Task $task) {
                return $task->day_5 === 'Pending'
                    ? '<i class="text-danger">●</i> Pending'
                    : '<i class="text-success">●</i> Done';
                }),

            TD::make('hunt_day_5', __('Hunt 5'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT)
                ->render(function (Task $task) {
                return $task->hunt_day_5 === 'Pending'
                    ? '<i class="text-danger">●</i> Pending'
                    : '<i class="text-success">●</i> Done';
                }),

            TD::make('day_6', __('Task 6'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT)
                ->render(function (Task $task) {
                return $task->day_5 === 'Pending'
                    ? '<i class="text-danger">●</i> Pending'
                    : '<i class="text-success">●</i> Done';
                }),

            TD::make('hunt_day_6', __('Hunt 6'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT)
                ->render(function (Task $task) {
                return $task->hunt_day_6 === 'Pending'
                    ? '<i class="text-danger">●</i> Pending'
                    : '<i class="text-success">●</i> Done';
                }),

            TD::make('day_7', __('Task 7'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT)
                ->render(function (Task $task) {
                return $task->day_7 === 'Pending'
                    ? '<i class="text-danger">●</i> Pending'
                    : '<i class="text-success">●</i> Done';
                }),

            TD::make('hunt_day_7', __('Hunt 7'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT)
                ->render(function (Task $task) {
                return $task->hunt_day_7 === 'Pending'
                    ? '<i class="text-danger">●</i> Pending'
                    : '<i class="text-success">●</i> Done';
                }),

        ];
    }
}
