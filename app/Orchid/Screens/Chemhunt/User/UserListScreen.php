<?php

namespace App\Orchid\Screens\Chemhunt\User;

use App\Exports\Chemhunt\UsersExport;
use App\Orchid\Layouts\Chemhunt\User\UserEditLayout;
use App\Orchid\Layouts\Chemhunt\User\UserListLayout;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class UserListScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Users';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'All registered users';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'users' => User::filters()
                ->defaultSort('first_name')
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
            UserListLayout::class,

            Layout::modal('oneAsyncModal', UserEditLayout::class)
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

    public function export(){
        ob_end_clean();
        ob_start();
        return Excel::download(new UsersExport(), 'chemhunt-users-'.Carbon::now().'.xlsx');
    }

    public function saveUser(User $user, Request $request): void
    {
        $request->validate([
            'user.email' => 'required|unique:admins,email,'.$user->id,
        ]);

        $user->fill($request->input('user'))
            ->save();

        Toast::info(__('Admin was saved.'));
    }

    public function remove(Request $request): void
    {
        User::findOrFail($request->get('id'))
            ->delete();

        Toast::info(__('Admin was removed'));
    }
}
