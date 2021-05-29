<?php

namespace App\Orchid\Layouts\Chemhunt\Chart;

use Orchid\Screen\Layouts\Chart;

class UserChart extends Chart
{
    /**
     * Add a title to the Chart.
     *
     * @var string
     */
    protected $title = 'Users';

    /**
     * Available options:
     * 'bar', 'line',
     * 'pie', 'percentage'.
     *
     * @var string
     */
    protected $type = 'line';

    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the chart.
     *
     * @var string
     */
    protected $target = 'users';

    /**
     * Determines whether to display the export button.
     *
     * @var bool
     */
    protected $export = true;
}
