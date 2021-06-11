<?php

namespace App\Orchid\Screens\Chemhunt\User;

use App\Models\User;
use App\Orchid\Layouts\Chemhunt\User\UserEditLayout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class UserEditScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Edit User';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'Edit participant details';

    /**
     * @var string
     */
    public $permission = 'platform.chemhunt.users.edit';

    /**
     * @var User
     */
    private $user;

    /**
     * Query data.
     *
     * @param User $user
     *
     * @return array
     */
    public function query(User $user): array
    {
        $this->user = $user;

        return [
            'user'       => $user,
        ];
    }

    /**
     * Button commands.
     *
     * @return Action[]
     */
    public function commandBar(): array
    {
        return [

            Button::make(__('Save'))
                ->icon('check')
                ->method('save'),
        ];
    }

    /**
     * @return \Orchid\Screen\Layout[]
     */
    public function layout(): array
    {
        return [
          UserEditLayout::class
        ];
    }

    /**
     * @param User    $user
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(User $user, Request $request)
    {
        $userData = $request->get('user');

        $user->fill($userData)->save();

        Toast::info(__('Participant details saved successfully.'));

        return redirect()->route('platform.chemhunt.users');
    }

}
