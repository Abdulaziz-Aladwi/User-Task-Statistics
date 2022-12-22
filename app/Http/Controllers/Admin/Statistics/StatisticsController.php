<?php

namespace App\Http\Controllers\Admin\Statistics;

use App\Http\Controllers\Controller;
use App\Services\Statistics\StatisticsService;

class StatisticsController extends Controller
{
    const MAX_USER_PER_PAGE = 10;

    public function __construct(StatisticsService $statisticsService)
    {
        $this->statisticsService = $statisticsService;
    }

    public function index()
    {
        $statistics = $this->statisticsService->getTopUsers();

        return view('admin.statistics.index', [
            'title' => 'Statistics',
            'statistics' => $statistics->take(self::MAX_USER_PER_PAGE)->get()
        ]);
    }    
}