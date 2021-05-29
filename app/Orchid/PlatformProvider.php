<?php

namespace App\Orchid;

use App\Models\User;
use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;
use Orchid\Platform\OrchidServiceProvider;
use Orchid\Screen\Actions\Menu;
use Orchid\Support\Color;

class PlatformProvider extends OrchidServiceProvider
{
    /**
     * @param Dashboard $dashboard
     */
    public function boot(Dashboard $dashboard): void
    {
        parent::boot($dashboard);

        // ...
    }

    /**
     * @return Menu[]
     */
    public function registerMainMenu(): array
    {
        return [
            //Access Rights
            Menu::make(__('Admins'))
                ->icon('user')
                ->route('platform.systems.admins')
                ->permission('platform.systems.admins')
                ->title(__('Access rights')),

            Menu::make(__('Roles'))
                ->icon('lock')
                ->route('platform.systems.roles')
                ->permission('platform.systems.roles'),

            //ChemHunt
            Menu::make(__('Users'))
                ->icon('user')
                ->route('platform.chemhunt.users')
                ->permission('platform.chemhunt.users.show')
                ->title(__('ChemHunt Access')),

            Menu::make(__('Riddles'))
                ->icon('layers')
                ->route('platform.chemhunt.riddles')
                ->permission('platform.chemhunt.riddles.show'),

            Menu::make(__('Tasks'))
                ->icon('key')
                ->route('platform.chemhunt.tasks')
                ->permission('platform.chemhunt.tasks.show'),

            Menu::make(__('Results'))
                ->icon('anchor')
                ->route('platform.chemhunt.results')
                ->permission('platform.chemhunt.results.show'),

            Menu::make(__('Answers'))
                ->icon('bag')
                ->route('platform.chemhunt.answers')
                ->permission('platform.chemhunt.answers.show'),

            Menu::make(__('Today Tasks'))
                ->icon('key')
                ->route('platform.chemhunt.tasks.today')
                ->permission('platform.chemhunt.tasks.today.show')
                ->title(__('ChemHunt Today Task')),

            Menu::make(__('Today Answers'))
                ->icon('bag')
                ->route('platform.chemhunt.answers.today')
                ->permission('platform.chemhunt.answers.today.show')
                ->title(__('ChemHunt Today Answers')),
        ];
    }

    /**
     * @return Menu[]
     */
    public function registerProfileMenu(): array
    {
        return [

        ];
    }

    /**
     * @return ItemPermission[]
     */
    public function registerPermissions(): array
    {
        return [
            ItemPermission::group(__('System'))
                ->addPermission('platform.systems.roles', __('Roles'))
                ->addPermission('platform.systems.admins', __('Admins')),

            ItemPermission::group(__('ChemHunt'))
                ->addPermission('platform.chemhunt.users.access', __('Users Access'))
                ->addPermission('platform.chemhunt.users.show', __('Users Show'))
                ->addPermission('platform.chemhunt.users.edit', __('Users Edit'))
                ->addPermission('platform.chemhunt.riddles.access', __('Riddles Access'))
                ->addPermission('platform.chemhunt.riddles.show', __('Riddles Show'))
                ->addPermission('platform.chemhunt.riddles.edit', __('Riddles Edit'))
                ->addPermission('platform.chemhunt.tasks.show', __('Tasks Show'))
                ->addPermission('platform.chemhunt.tasks.today.show', __('Tasks Today'))
                ->addPermission('platform.chemhunt.results.show', __('Results'))
                ->addPermission('platform.chemhunt.answers.show', __('Answers'))
                ->addPermission('platform.chemhunt.answers.today.show', __('Answers Today')),
            ];
    }

    /**
     * @return string[]
     */
    public function registerSearchModels(): array
    {
        return [
            // ...Models
            User::class
        ];
    }
}
