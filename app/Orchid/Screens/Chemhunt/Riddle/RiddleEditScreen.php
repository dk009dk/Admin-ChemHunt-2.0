<?php

declare(strict_types=1);

namespace App\Orchid\Screens\Chemhunt\Riddle;

use App\Models\Riddle;
use App\Orchid\Layouts\Chemhunt\Riddle\RiddleEditLayout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

class RiddleEditScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Edit Riddle';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'ChemHunt Riddles';

    /**
     * @var string
     */
    public $permission = 'platform.chemhunt.riddles.edit';

    /**
     * @var Riddle
     */
    private $riddle;

    /**
     * @var bool
     */
    private $exist = false;

    /**
     * Query data.
     *
     * @param Riddle $riddle
     *
     * @return array
     */
    public function query(Riddle $riddle): array
    {
        $this->exist = $riddle->exists;
        $this->riddle = $riddle;
        if (! $this->exist) {
            $this->name = 'Create Riddle';
        }

        return [
            'riddle'=> $riddle,
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
            Button::make(__('Remove'))
                ->icon('trash')
                ->confirm(__('Once the account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'))
                ->method('remove')
                ->canSee($this->exist),

            Button::make(__('Save'))
                ->icon('check')
                ->method('save'),
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
            RiddleEditLayout::class,
        ];
    }

    /**
     * @param Riddle  $riddle
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Riddle $riddle, Request $request)
    {
        $request->validate([
            'riddle.question' => ['required'],
            'riddle.answer' => ['required'],
            'riddle.day' => ['required'],
            'riddle.sr_no' => ['required'],
        ]);

        $riddleData = $request->get('riddle');
        $riddle->update($riddleData);

        Toast::info(__('Riddle was saved.'));

        return redirect()->route('platform.chemhunt.riddles');
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
