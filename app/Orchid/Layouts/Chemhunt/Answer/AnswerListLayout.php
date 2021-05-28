<?php

namespace App\Orchid\Layouts\Chemhunt\Answer;

use App\Models\User;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class AnswerListLayout extends Table
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


            TD::make('answer.day_1_q_1', __('Day 1 Q 1'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),
            TD::make('answer.day_1_q_2', __('Day 1 Q 2'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),
            TD::make('answer.day_1_q_3', __('Day 1 Q 3'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),
            TD::make('answer.day_1_q_4', __('Day 1 Q 4'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),
            TD::make('answer.day_2_q_1', __('Day 2 Q 1'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),
            TD::make('answer.day_2_q_2', __('Day 2 Q 2'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),
            TD::make('answer.day_2_q_3', __('Day 2 Q 3'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),
            TD::make('answer.day_2_q_4', __('Day 2 Q 4'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),
            TD::make('answer.day_3_q_1', __('Day 3 Q 1'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),
            TD::make('answer.day_3_q_2', __('Day 3 Q 2'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),
            TD::make('answer.day_3_q_3', __('Day 3 Q 3'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),
            TD::make('answer.day_3_q_4', __('Day 3 Q 4'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),
            TD::make('answer.day_4_q_1', __('Day 4 Q 1'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),
            TD::make('answer.day_4_q_2', __('Day 4 Q 2'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),
            TD::make('answer.day_4_q_3', __('Day 4 Q 3'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),
            TD::make('answer.day_4_q_4', __('Day 4 Q 4'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),
            TD::make('answer.day_5_q_1', __('Day 5 Q 1'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),
            TD::make('answer.day_5_q_2', __('Day 5 Q 2'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),
            TD::make('answer.day_5_q_3', __('Day 5 Q 3'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),
            TD::make('answer.day_5_q_4', __('Day 5 Q 4'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),
            TD::make('answer.day_6_q_1', __('Day 6 Q 1'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),
            TD::make('answer.day_6_q_2', __('Day 6 Q 2'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),
            TD::make('answer.day_6_q_3', __('Day 6 Q 3'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),
            TD::make('answer.day_6_q_4', __('Day 6 Q 4'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),
            TD::make('answer.day_7_q_1', __('Day 7 Q 1'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),
            TD::make('answer.day_7_q_2', __('Day 7 Q 2'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),
            TD::make('answer.day_7_q_3', __('Day 7 Q 3'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),
            TD::make('answer.day_7_q_4', __('Day 7 Q 4'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),

        ];
    }
}
