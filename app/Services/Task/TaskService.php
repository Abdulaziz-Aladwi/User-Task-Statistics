<?php

namespace App\Services\Task;

use App\Models\Task;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class TaskService
{
    public function __construct(Task $taskModel)
    {
        $this->taskModel = $taskModel;
    }

    /**
     * Get Tasks
     *
     * @param array $relations
     * 
     * @return Builder
     */
    public function getTasks(array $relations): Builder
    {
        return $this->taskModel->with($relations);
    }

    /**
     * Create Task
     *
     * @param array $taskData
     * 
     * @return void
     */
    public function create(array $taskData): void
    {
       $this->taskModel->create($taskData);
    }
}