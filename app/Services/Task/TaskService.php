<?php

namespace App\Services\Task;

use App\Jobs\Admin\Statistics\UpdateUserTasksCount;
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
    public function create(array $taskData): Task
    {
       return $this->taskModel->create($taskData);
    }

    public function updateUserTasksCount($task): void
    {
        dispatch(new UpdateUserTasksCount($task));
    }
}