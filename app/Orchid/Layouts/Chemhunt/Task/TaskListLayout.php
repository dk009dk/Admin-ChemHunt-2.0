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
                ->filter(TD::FILTER_TEXT)
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
                        ->modalTitle('Day '.config('chemhunt.day').' '.$user->email)
                        ->method('saveUser')
                        ->asyncParameters([
                            'user' => $user->id,
                        ]);
                }),

            TD::make('task.day_1', __('Day 1'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),

            TD::make('task.day_2', __('Day 2'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),

            TD::make('task.day_3', __('Day 3'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),

            TD::make('task.day_4', __('Day 4'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),

            TD::make('task.day_5', __('Day 5'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),

            TD::make('task.day_6', __('Day 6'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),

            TD::make('task.day_7', __('Day 7'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),

        ];
    }
}
