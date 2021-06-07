<?php

namespace App\Orchid\Layouts\Chemhunt\Task ;

use App\Models\User ;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
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
                        ->modalTitle('Day '.config('chemhunt.day').' '.$user->email)
                        ->method('saveTask')
                        ->asyncParameters([
                            'user' => $user->id,
                        ]);
                }),

            TD::make('task.day_'.config('chemhunt.day'), __('Day '.config('chemhunt.day').' User '))
                ->cantHide()
                ->filter(TD::FILTER_TEXT)
                ->render(function (User $user) {
                    return $user->task->{'day_'.config('chemhunt.day')} === 'Pending'
                        ? '<i class="text-danger">●</i> Pending'
                        : '<i class="text-success">●</i> Done';
                }),

            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function (User $user) {
                    return Button::make(__(''))
                                ->icon('trash')
                                ->method('remove')
                                ->confirm(__('Are you sure you want to delete this participant?'))
                                ->parameters([
                                    'id' => $user->id,
                                ]);
                }),

        ];
    }
}
