<?php

namespace App\Orchid\Layouts\Chemhunt\Result;

use App\Models\User;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class ResultListLayout extends Table
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
                ->filter(TD::FILTER_TEXT),


            TD::make('result.day_1_r_1', __('Day 1 R 1'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),
            TD::make('result.day_1_r_2', __('Day 1 R 2'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),
            TD::make('result.day_1_r_3', __('Day 1 R 3'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),
            TD::make('result.day_1_r_4', __('Day 1 R 4'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),
            TD::make('result.day_2_r_1', __('Day 2 R 1'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),
            TD::make('result.day_2_r_2', __('Day 2 R 2'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),
            TD::make('result.day_2_r_3', __('Day 2 R 3'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),
            TD::make('result.day_2_r_4', __('Day 2 R 4'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),
            TD::make('result.day_3_r_1', __('Day 3 R 1'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),
            TD::make('result.day_3_r_2', __('Day 3 R 2'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),
            TD::make('result.day_3_r_3', __('Day 3 R 3'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),
            TD::make('result.day_3_r_4', __('Day 3 R 4'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),
            TD::make('result.day_4_r_1', __('Day 4 R 1'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),
            TD::make('result.day_4_r_2', __('Day 4 R 2'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),
            TD::make('result.day_4_r_3', __('Day 4 R 3'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),
            TD::make('result.day_4_r_4', __('Day 4 R 4'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),
            TD::make('result.day_5_r_1', __('Day 5 R 1'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),
            TD::make('result.day_5_r_2', __('Day 5 R 2'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),
            TD::make('result.day_5_r_3', __('Day 5 R 3'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),
            TD::make('result.day_5_r_4', __('Day 5 R 4'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),
            TD::make('result.day_6_r_1', __('Day 6 R 1'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),
            TD::make('result.day_6_r_2', __('Day 6 R 2'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),
            TD::make('result.day_6_r_3', __('Day 6 R 3'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),
            TD::make('result.day_6_r_4', __('Day 6 R 4'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),
            TD::make('result.day_7_r_1', __('Day 7 R 1'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),
            TD::make('result.day_7_r_2', __('Day 7 R 2'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),
            TD::make('result.day_7_r_3', __('Day 7 R 3'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),
            TD::make('result.day_7_r_4', __('Day 7 R 4'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),

        ];
    }
}
