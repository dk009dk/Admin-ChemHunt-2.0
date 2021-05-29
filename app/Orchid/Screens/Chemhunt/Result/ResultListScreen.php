<?php

namespace App\Orchid\Screens\Chemhunt\Result;

use App\Models\User;
use App\Orchid\Layouts\Chemhunt\Result\ResultListLayout;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;

class ResultListScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Results';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'ChemHunt Hunt Results';

    /**
     * @var string
     */
    public $permission = 'platform.chemhunt.results.show';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'users'=>User::filters()
                ->with('result')
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
            ResultListLayout::class,
        ];
    }

    public function export(){
        ob_end_clean();
        ob_start();
        return Excel::download(new TasksExport, 'users-tasks-'.Carbon::now().'.xlsx');
    }
}
