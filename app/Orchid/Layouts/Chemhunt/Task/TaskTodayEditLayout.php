<?php

namespace App\Orchid\Layouts\Chemhunt\Task;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\TD;

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

            Input::make('task.user.user_email')
                ->type('email')
                ->title(__('Email')),

            Select::make('task.day_'.config('chemhunt.day'))
                ->options([
                    'Done'   => 'Done',
                    'Pending' => 'Pending',
                ])
                ->title('Select Status of Day '.config('chemhunt.day'))
                ->help("Select status of user task"),
        ];
    }
}
