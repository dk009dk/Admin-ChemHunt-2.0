<?php

namespace App\Orchid\Layouts\Chemhunt\Task;

use App\Models\Task;
use App\Models\User;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class TaskTodayListLayout extends Table
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
                        ->modalTitle('Day '.config('chemhunt.day').' '.$task->user->email)
                        ->method('saveTask')
                        ->asyncParameters([
                            'task' => $task->id,
                        ]);
                }),

            TD::make('day_'.config('chemhunt.day'), __('Day '.config('chemhunt.day').' Task'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT)
                ->render(function (Task $task) {
                    return $task->{'day_'.config('chemhunt.day')} === 'Pending'
                        ? '<i class="text-danger">●</i> Pending'
                        : '<i class="text-success">●</i> Done';
                }),

        ];
    }
}
