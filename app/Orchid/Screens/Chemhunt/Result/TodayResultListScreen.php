<?php

namespace App\Orchid\Screens\Chemhunt\Result;

use App\Exports\Chemhunt\TodayResultExport;
use App\Models\User;
use App\Orchid\Layouts\Chemhunt\Result\TodayResultListLayout;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;

class TodayResultListScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Today Result';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'ChemHut Today Result';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        $this->description = 'Day '.config('chemhunt.day').' ChemHunt Result list';
        return [
            'users'=>User::with('result')->select('id','first_name','last_name','user_email','email')
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
            TodayResultListLayout::class,
        ];
    }

    public function export(){
        ob_end_clean();
        ob_start();
        return Excel::download(new TodayResultExport(), 'chemhunt-results-day-'.config('chemhunt.day').'-'.Carbon::now().'.xlsx');
    }
}
