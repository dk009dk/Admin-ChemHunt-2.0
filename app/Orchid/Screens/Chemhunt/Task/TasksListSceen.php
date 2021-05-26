<?php

namespace App\Orchid\Screens\Chemhunt\Task;

use App\Exports\Chemhunt\TasksExport;
use App\Models\Task;
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
            Layout::modal('oneAsyncModal', TaskEditLayout::class)
                ->async('asyncGetUser'),
        ];
    }

    /**
     * @param User $user
     *
     * @return array
     */
    public function asyncGetUser(User $user): array
    {
        return [
            'user' => $user,
        ];
    }

    /**
     * @param User $user
     * @param Request $request
     */
    public function saveUser(User $user, Request $request): void
    {
        $task = Task::query()->find($user->task->id);
        $data=$request->input('user.task.day_'.config('chemhunt.day'));
        $task->fill(['day_'.config('chemhunt.day')=>$data])->save();
        //$user->save($task);
        Toast::info(__('Task status Updated.'));
    }
    public function export(){
        return Excel::download(new TasksExport, 'users-tasks.xlsx');
    }
}
