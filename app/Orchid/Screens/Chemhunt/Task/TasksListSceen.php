<?php

namespace App\Orchid\Screens\Chemhunt\Task;

use App\Exports\Chemhunt\UsersExport;
use App\Models\Task;
use App\Models\User;
use App\Orchid\Layouts\Chemhunt\Task\TaskListLayout;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;

class TasksListSceen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Task';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'Task Completed Table';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'users' => User::filters()
                ->with('task')
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
            TaskListLayout::class,
        ];
    }

    public function export(){
        return Excel::download(new UsersExport(), 'users-tasks-'.Carbon::now().'.xlsx');
    }
}
