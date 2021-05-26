<?php

namespace App\Orchid\Screens\Chemhunt\Task;

use Orchid\Screen\Screen;

class TasksEditSceen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'TasksEditSceen';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'TasksEditSceen';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [];
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
        return [];
    }
}
