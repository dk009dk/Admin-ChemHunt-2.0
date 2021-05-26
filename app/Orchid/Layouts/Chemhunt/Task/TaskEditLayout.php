<?php

namespace App\Orchid\Layouts\Chemhunt\Task;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Rows;

class TaskEditLayout extends Rows
{
    /**
     * Views.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        return [
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
