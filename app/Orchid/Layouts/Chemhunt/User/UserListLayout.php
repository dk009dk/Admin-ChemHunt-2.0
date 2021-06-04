<?php

namespace App\Orchid\Layouts\Chemhunt\User;

use App\Models\User;
use Illuminate\Support\Carbon;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class UserListLayout extends Table
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
            TD::make('first_name', __('First Name'))
                ->filter(TD::FILTER_TEXT)
                ->sort()
                ->cantHide(),

            TD::make('middle_name', __('Middle Name'))
                ->filter(TD::FILTER_TEXT)
                ->sort()
                ->defaultHidden(),

            TD::make('last_name', __('Last Name'))
                ->filter(TD::FILTER_TEXT)
                ->sort()
                ->cantHide(),

            TD::make('user_email', __('Email'))
                ->sort()
                ->filter(TD::FILTER_TEXT),

            TD::make('email', __('ChemHunt Id'))
                ->sort()
                ->cantHide()
                ->filter(TD::FILTER_TEXT),

            TD::make('user_password', __('Password'))
                ->sort()
                ->filter(TD::FILTER_TEXT),

            TD::make('year', __('Year'))
                ->sort()
                ->filter(TD::FILTER_TEXT),

            TD::make('college', __('College'))
                ->sort()
                ->filter(TD::FILTER_TEXT),

            TD::make('state', __('State'))
                ->sort()
                ->filter(TD::FILTER_TEXT),

            TD::make('phone_number', __('Phone'))
                ->sort()
                ->defaultHidden()
                ->filter(TD::FILTER_TEXT),

            TD::make('phone_number_wapp', __('Wapp'))
                ->sort()
                ->filter(TD::FILTER_TEXT),

            TD::make('created_at', __('Created At'))
                ->sort()
                ->filter(TD::FILTER_DATE)
                ->render(function (User $user){
                    return Carbon::parse();
                }),

        ];
    }
}
