<?php

namespace App\Orchid\Screens\Chemhunt\Riddle;

use App\Models\Riddle;
use App\Orchid\Layouts\Chemhunt\Riddle\RiddleEditLayout;
use App\Orchid\Layouts\Chemhunt\Riddle\RiddleListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class RiddleListScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Riddles';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'ChemHunt Riddles';

    /**
     * @var string
     */
    public $permission = 'platform.chemhunt.riddles.show';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'riddles'=>Riddle::filters()
                ->defaultSort('day', 'asc')
                ->paginate(),
        ];
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
        return [
            Link::make(__('Add'))
                ->icon('plus')
                ->route('platform.chemhunt.riddles.create'),
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): array
    {
        return [
            RiddleListLayout::class,
        ];
    }

    /**
     * @param Riddle $riddle
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove(Riddle $riddle)
    {
        $riddle->delete();

        Toast::info(__('Riddle was removed'));

        return redirect()->route('platform.chemhunt.riddles');
    }
}
