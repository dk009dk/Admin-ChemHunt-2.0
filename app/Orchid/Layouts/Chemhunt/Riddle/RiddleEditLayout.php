<?php

namespace App\Orchid\Layouts\Chemhunt\Riddle;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Layouts\Rows;

class RiddleEditLayout extends Rows
{
    /**
     * Views.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        return [
            TextArea::make('riddle.question')
                ->title('Question')
                ->popover('Riddle question here')
                ->required()
                ->rows(5),

            Input::make('riddle.answer')
                ->type('text')
                ->required()
                ->title(__('Answer'))
                ->placeholder(__('Answer')),

            Select::make('riddle.sr_no')
                ->title('Select')
                ->options([
                    1=>1,
                    2=>2,
                    3=>3,
                    4=>4
                ])
                ->required()
                ->title('Select Sr No of Riddle'),

            Select::make('riddle.day')
                ->title('Select')
                ->options([
                    1=>1,
                    2=>2,
                    3=>3,
                    4=>4,
                    5=>5,
                    6=>6,
                    7=>7
                ])
                ->required()
                ->title('Select Day'),
        ];
    }
}
