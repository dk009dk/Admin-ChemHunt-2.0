<?php

namespace App\Orchid\Screens\Chemhunt\Answer;

use App\Exports\Chemhunt\TodayAnswerExport;
use App\Models\User;
use App\Orchid\Layouts\Chemhunt\Answer\AnswerTodayListLayout;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;

class AnswerTodayListScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Today Answers';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'ChemHunt today\'s answers list';

    /**
     * @var string
     */
    public $permission = 'platform.chemhunt.answers.today.show';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        $this->description = 'Day '.config('chemhunt.day').' ChemHunt answers list';
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
            AnswerTodayListLayout::class,
        ];
    }

    public function export(){
        ob_end_clean();
        ob_start();
        return Excel::download(new TodayAnswerExport(), 'chemhunt-answers-day-'.config('chemhunt.day').'-'.Carbon::now().'.xlsx');
    }
}
