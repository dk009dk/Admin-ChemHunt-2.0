<?php

namespace App\Orchid\Layouts\Chemhunt\Answer;

use App\Models\User;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class TodayAnswerAllListLayout extends Table
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

            TD::make('answer.day_'.config('chemhunt.day').'_q_1', __('Answer 1'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),

            TD::make('answer.day_'.config('chemhunt.day').'_q_2', __('Answer 2'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),

            TD::make('answer.day_'.config('chemhunt.day').'_q_3', __('Answer 3'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),

            TD::make('answer.day_'.config('chemhunt.day').'_q_4', __('Final'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),

            TD::make('answer.day_'.config('chemhunt.day').'_time', __('Time'))
                ->cantHide()
                ->filter(TD::FILTER_DATE),
        ];
    }
}
