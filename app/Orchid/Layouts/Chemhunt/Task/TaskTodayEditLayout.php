<?php

namespace App\Orchid\Layouts\Chemhunt\Task;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Rows;

class TaskTodayEditLayout extends Rows
{
    /**
     * Views.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        return [

            Input::make('user.user_email')
                ->type('email')
                ->title(__('Email')),

            Select::make('user.task.day_'.config('chemhunt.day'))
                ->options([
                    'Done'   => 'Done',
                    'Pending' => 'Pending',
                ])
                ->title('Select Status of Day '.config('chemhunt.day'))
                ->help("Select status of user task"),
        ];
    }
}
