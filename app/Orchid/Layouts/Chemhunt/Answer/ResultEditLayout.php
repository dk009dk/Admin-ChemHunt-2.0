<?php

namespace App\Orchid\Layouts\Chemhunt\Answer;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Rows;

class ResultEditLayout extends Rows
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

            Select::make('user.result.day_'.config('chemhunt.day').'_r_1')
                ->options([
                    '0'=>'0',
                    '10'=>'10',
                ])
                ->title('Answer 1'),

            Select::make('user.result.day_'.config('chemhunt.day').'_r_2')
                ->options([
                    '0'=>'0',
                    '15'=>'15',
                ])
                ->title('Answer 2'),

            Select::make('user.result.day_'.config('chemhunt.day').'_r_3')
                ->options([
                    '0'=>'0',
                    '25'=>'25',
                ])
                ->title('Answer 3'),

            Select::make('user.result.day_'.config('chemhunt.day').'_r_4')
                ->options([
                    '0'=>'0',
                    '50'=>'50'
                ])
                ->title('Final Answer'),
        ];
    }
}
