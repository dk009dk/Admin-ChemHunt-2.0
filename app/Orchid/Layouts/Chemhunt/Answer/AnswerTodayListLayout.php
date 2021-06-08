<?php

namespace App\Orchid\Layouts\Chemhunt\Answer;

use App\Models\User;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class AnswerTodayListLayout extends Table
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
                ->filter(TD::FILTER_TEXT)
                ->render(function (User $user) {
                    return ModalToggle::make($user->email)
                        ->modal('oneAsyncModal')
                        ->modalTitle('Day '.config('chemhunt.day').' '.$user->email)
                        ->method('saveResult')
                        ->asyncParameters([
                            'user' => $user->id,
                        ]);
                }),

            TD::make('answer.day_'.config('chemhunt.day').'_q_1', __('Answer 1'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),

            TD::make('result.day_'.config('chemhunt.day').'_r_1', __('Result 1'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),

            TD::make('answer.day_'.config('chemhunt.day').'_q_2', __('Answer 2'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),

            TD::make('result.day_'.config('chemhunt.day').'_r_2', __('Result 2'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),

            TD::make('answer.day_'.config('chemhunt.day').'_q_3', __('Answer 3'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),

            TD::make('result.day_'.config('chemhunt.day').'_r_3', __('Result 3'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),

            TD::make('answer.day_'.config('chemhunt.day').'_q_4', __('Answer 4'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),

            TD::make('result.day_'.config('chemhunt.day').'_r_4', __('Result 4'))
                ->cantHide()
                ->filter(TD::FILTER_TEXT),

            TD::make('answer.day_'.config('chemhunt.day').'_time', __('Time'))
                ->cantHide()
                ->filter(TD::FILTER_DATE),
        ];
    }
}
