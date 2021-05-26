<?php

namespace App\Orchid;

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

            Menu::make(__('Tasks'))
                ->icon('chemistry')
                ->route('platform.chemhunt.tasks.list')
                ->permission('platform.chemhunt.tasks.show'),

            Menu::make('Task')
                ->icon('chemistry')
                ->title(__('ChemHunt'))
                ->list([
                    Menu::make('Day 1')->icon('bag'),
                    Menu::make('Day 2')->icon('bag'),
                    Menu::make('Day 3')->icon('bag'),
                    Menu::make('Day 4')->icon('bag'),
                    Menu::make('Day 5')->icon('bag'),
                    Menu::make('Day 6')->icon('bag'),
                    Menu::make('Day 7')->icon('bag'),
                ]),

            Menu::make('Results')
                ->icon('anchor')
                ->list([
                    Menu::make('Day 1')->icon('key'),
                    Menu::make('Day 2')->icon('key'),
                    Menu::make('Day 3')->icon('key'),
                    Menu::make('Day 4')->icon('key'),
                    Menu::make('Day 5')->icon('key'),
                    Menu::make('Day 6')->icon('key'),
                    Menu::make('Day 7')->icon('key'),
                ]),

            //Example Screen
            Menu::make('Example screen')
                ->icon('monitor')
                ->route('platform.example')
                ->title('Navigation')
                ->badge(function () {
                    return 6;
                }),

            Menu::make('Dropdown menu')
                ->icon('code')
                ->list([
                    Menu::make('Day 1')->icon('bag'),
                    Menu::make('Day 2')->icon('heart'),
                ]),

            Menu::make('Basic Elements')
                ->title('Form controls')
                ->icon('note')
                ->route('platform.example.fields'),

            Menu::make('Advanced Elements')
                ->icon('briefcase')
                ->route('platform.example.advanced'),

            Menu::make('Text Editors')
                ->icon('list')
                ->route('platform.example.editors'),

            Menu::make('Overview layouts')
                ->title('Layouts')
                ->icon('layers')
                ->route('platform.example.layouts'),

            Menu::make('Chart tools')
                ->icon('bar-chart')
                ->route('platform.example.charts'),

            Menu::make('Cards')
                ->icon('grid')
                ->route('platform.example.cards')
                ->divider(),

            Menu::make('Documentation')
                ->title('Docs')
                ->icon('docs')
                ->url('https://orchid.software/en/docs'),

            Menu::make('Changelog')
                ->icon('shuffle')
                ->url('https://github.com/orchidsoftware/platform/blob/master/CHANGELOG.md')
                ->target('_blank')
                ->badge(function () {
                    return Dashboard::version();
                }, Color::DARK()),

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
                ->addPermission('platform.chemhunt.tasks.show', __('Tasks Show')),
            ];
    }

    /**
     * @return string[]
     */
    public function registerSearchModels(): array
    {
        return [
            // ...Models
            \App\Models\User::class
        ];
    }
}
