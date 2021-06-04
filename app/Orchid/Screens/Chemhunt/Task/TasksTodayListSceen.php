<?php

namespace App\Orchid\Screens\Chemhunt\Task;

use App\Models\Task;
use App\Orchid\Layouts\Chemhunt\Task\TaskTodayEditLayout;
use App\Orchid\Layouts\Chemhunt\Task\TaskTodayListLayout;
use Illuminate\Http\Request;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class TasksTodayListSceen extends Screen
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
    public $permission = 'platform.chemhunt.tasks.today.show';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        $this->description = 'Task Day '.config('chemhunt.day').' Status';
        return [
            'tasks' => Task::filters()
                ->with('user')
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
        return [];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): array
    {
        return [
            TaskTodayListLayout::class,
            Layout::modal('oneAsyncModal', TaskTodayEditLayout::class)
                ->async('asyncGetTask'),
        ];
    }

    /**
     * @param Task $task
     *
     * @return array
     */
    public function asyncGetTask(Task $task): array
    {
        return [
            'task' => $task,
        ];
    }

    /**
     * @param Task $task
     * @param Request $request
     */
    public function saveTask(Task $task, Request $request): void
    {
        $data=$request->input('task.day_'.config('chemhunt.day'));
        $task->fill(['day_'.config('chemhunt.day')=>$data])->save();
        //$user->save($task);
        Toast::info(__('Task status Updated.'));
    }
}
