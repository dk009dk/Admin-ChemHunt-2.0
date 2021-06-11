<?php

namespace App\Orchid\Layouts\Chemhunt\User;

use App\Models\Admin;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;

class UserEditLayout extends Rows
{
    /**
     * Views.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        return [
            Input::make('user.first_name')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('First Name'))
                ->placeholder(__('First Name')),

            Input::make('user.middle_name')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Middle Name'))
                ->placeholder(__('Middle Name')),

            Input::make('user.last_name')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Last Name'))
                ->placeholder(__('Last Name')),

            Input::make('user.user_email')
                ->type('email')
                ->required()
                ->title(__('Email'))
                ->placeholder(__('Email')),
        ];
    }
}
