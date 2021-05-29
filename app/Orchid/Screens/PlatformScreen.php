<?php

declare(strict_types=1);

namespace App\Orchid\Screens;

use App\Models\User;
use App\Orchid\Layouts\Chemhunt\Chart\UserChart;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;

class PlatformScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'ChemHunt 2.0';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Welcome to ChemHunt 2.0 admin section.';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'users'=>User::countByDays()->toChart('Users'),
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
            Link::make('Website')
                ->href('http://chemhunt.herokuapp.com')
                ->icon('globe-alt'),

        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]
     */
    public function layout(): array
    {
        return [

               UserChart::class,
            //Layout::view('platform::partials.welcome'),
        ];
    }
}
