<?php
namespace App\Services\Statistics;

use App\Models\Statistic;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class StatisticsService
{
    public function __construct(Statistic $statisticModel)
    {
        $this->statisticModel = $statisticModel;
    }

    /**
     * Get top users based on tasks count
     *
     * @return Builder
     */
    public function getTopUsers(): Builder
    {
        return $this->statisticModel->with('assignee')->orderBy('tasks_count', 'DESC');
    }

}