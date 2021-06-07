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

            Input::make('user.user_email')
                ->type('email')
                ->title(__('Email')),

            Select::make('user')
                ->fromModel(Admin::class, 'name', 'id'),

        ];
    }
}
