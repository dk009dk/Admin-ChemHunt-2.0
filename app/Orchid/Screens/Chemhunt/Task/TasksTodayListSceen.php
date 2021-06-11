<?php

namespace App\Orchid\Screens\Chemhunt\Task;

use App\Models\User;
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
        $this->name = 'Task Day '.config('chemhunt.day');

        $this->description = 'Task Day '.config('chemhunt.day').' Status';
        return [
            'users' => User::filters()
                ->where('admin_id',\Auth::user()->id)
                ->with('task')
                ->paginate('20'),
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
    public function saveTask(User $user, Request $request): void
    {
        $data=$request->input('user.task.day_'.config('chemhunt.day'));
        $user->task()->update(['day_'.config('chemhunt.day')=>$data]);
        Toast::info(__('Task status Updated.'));
    }

    public function remove(Request $request): void
    {
        User::findOrFail($request->get('id'))
            ->delete();

        Toast::info(__('Participant was removed'));
    }
}
