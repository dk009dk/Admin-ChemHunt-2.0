<?php

namespace App\Orchid\Screens\Chemhunt\Task;

use App\Exports\Chemhunt\TasksExport;
use App\Models\User;
use App\Orchid\Layouts\Chemhunt\Task\TaskEditLayout;
use App\Orchid\Layouts\Chemhunt\Task\TaskListLayout;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class TasksListSceen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Tasks';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'Task Status Table';

    /**
     * @var string
     */
    public $permission = 'platform.chemhunt.tasks.show';

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
                ->select('id','first_name','last_name','user_email','email')
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

    /**
     * @param User $user
     *
     * @return array
     */
    public function asyncGetTask(User $user): array
    {
        return [
            'user' => $user,
        ];
    }

    /**
     * @param User $user
     * @param Request $request
     */
    public function saveTask(User $user, Request $request): void
    {

        $data=$request->input('task.day_'.config('chemhunt.day'));
        $user->task()->update(['day_'.config('chemhunt.day')=>$data]);
        Toast::info(__('Task status Updated.'));
    }
    public function export(){
        ob_end_clean();
        ob_start();
        return Excel::download(new TasksExport, 'chemhunt-tasks-'.Carbon::now().'.xlsx');
    }
}
