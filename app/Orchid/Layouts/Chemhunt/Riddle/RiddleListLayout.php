<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Chemhunt\Riddle;

use App\Models\Riddle;
use App\View\Components\Chemhunt\RiddleQuestion;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class RiddleListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'riddles';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): array
    {
        return [
            TD::make('question', __('Question'))
                ->sort()
                ->cantHide()
                ->filter(TD::FILTER_TEXT)
                ->render(function (Riddle $riddle){
                    return \Illuminate\Support\Str::limit($riddle->question,'50');
                }),

            TD::make('day', __('Day'))
                ->sort()
                ->cantHide()
                ->filter(TD::FILTER_TEXT),

            TD::make('sr_no', __('Sr No'))
                ->sort()
                ->cantHide()
                ->filter(TD::FILTER_TEXT),

            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function (Riddle $riddle) {
                    return DropDown::make()
                        ->icon('options-vertical')
                        ->list([
                            Link::make(__('Edit'))
                                ->route('platform.chemhunt.riddles.edit', $riddle->id)
                                ->icon('pencil'),

                            Button::make(__('Delete'))
                                ->icon('trash')
                                ->method('remove')
                                ->confirm(__('Are you sure you want to delete this Riddle?'))
                                ->parameters([
                                    'id' => $riddle->id,
                                ]),
                        ]);
                }),
        ];
    }
}
