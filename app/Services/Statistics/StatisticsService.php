<?php
namespace App\Services\Statistics;

use App\Models\Statistic;
use App\Models\User;
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

    /**
     * Update Tasks Count
     *
     * @param User $user
     * @return void
     */
    public function updateTasksCount(User $user): void
    {
        if (!$user->statistic()->exists()) {
            $this->createStatistics($user);
        }

        $tasks_count = $user->Statistic->tasks_count + 1;

        $user->statistic()->update(['tasks_count' => $tasks_count]);
    }

    /**
     * Create Statistics for user
     *
     * @param User $user
     * @return void
     */
    public function createStatistics(User $user): void
    {
        $user->statistic()->create();
    }

}