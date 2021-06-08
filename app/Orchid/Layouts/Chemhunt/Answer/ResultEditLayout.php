<?php

namespace App\Orchid\Layouts\Chemhunt\Answer;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\TD;

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
                    '1'=>'1',
                    '2'=>'2',
                    '3'=>'3',
                    '4'=>'4',
                    '5'=>'5'
                ])
                ->title('Answer 1'),

            Select::make('user.result.day_'.config('chemhunt.day').'_r_2')
                ->options([
                    '0'=>'0',
                    '1'=>'1',
                    '2'=>'2',
                    '3'=>'3',
                    '4'=>'4',
                    '5'=>'5'
                ])
                ->title('Answer 2'),

            Select::make('user.result.day_'.config('chemhunt.day').'_r_3')
                ->options([
                    '0'=>'0',
                    '1'=>'1',
                    '2'=>'2',
                    '3'=>'3',
                    '4'=>'4',
                    '5'=>'5'
                ])
                ->title('Answer 3'),

            Select::make('user.result.day_'.config('chemhunt.day').'_r_4')
                ->options([
                    '0'=>'0',
                    '1'=>'1',
                    '2'=>'2',
                    '3'=>'3',
                    '4'=>'4',
                    '5'=>'5'
                ])
                ->title('Final Answer'),
        ];
    }
}
