<?php

namespace App\Http\Controllers\Admin\Task;


use App\Constants\UserType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Task\StoreRequest;
use App\Jobs\Admin\Statistics\UpdateUserTasksCount;
use App\Services\Task\TaskService;
use App\Services\User\UserService;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    const PER_PAGE_PAGINATION = 10;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TaskService $taskService, UserService $userService)
    {
       $this->taskService = $taskService;
       $this->userService = $userService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tasks = $this->taskService->getTasks(['assigner', 'assignee']);

        return view('admin.task.index', [
            'title' => 'Tasks',
            'tasksCount' => $tasks->count(),
            'tasks' => $tasks->paginate(self::PER_PAGE_PAGINATION),
        ]);
    }

    public function create()
    {
        $AdminCriteria = ['type' => UserType::TYPE_ADMIN];
        $normalUsersCriteria = ['type' => UserType::TYPE_NORMAL];

        $admins = $this->userService->getUsers($AdminCriteria);
        $normalUsers = $this->userService->getUsers($normalUsersCriteria);


        return view('admin.task.create', [
            'title' => 'Create Tasks',
            'admins' => $admins->get(),
            'normalUsers' => $normalUsers->get()
        ]);
    }

    public function store(StoreRequest $request)
    {
        $task = $this->taskService->create($request->validated());
        $this->taskService->updateUserTasksCount($task->assignee);
        return redirect()->route('admin.tasks.index')->withSuccess('Data Saved Successfully');;
    }
}
