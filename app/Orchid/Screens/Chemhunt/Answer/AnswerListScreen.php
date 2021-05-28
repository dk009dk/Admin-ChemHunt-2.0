<?php

namespace App\Orchid\Screens\Chemhunt\Answer;

use App\Exports\Chemhunt\AnswerExport;
use App\Models\User;
use App\Orchid\Layouts\Chemhunt\Answer\AnswerListLayout;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;

class AnswerListScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Answers';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'ChemHunt Answers List';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'users'=>User::with('answer')->select('id','first_name','last_name','user_email','email')
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
            Button::make('Export file')
                ->method('export')
                ->icon('cloud-download')
                ->rawClick()
                ->novalidate(),
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
            AnswerListLayout::class,
        ];
    }

    public function export(){
        ob_end_clean();
        ob_start();
        return Excel::download(new AnswerExport(), 'chemhunt-answers-'.Carbon::now().'.xlsx');
    }
}
