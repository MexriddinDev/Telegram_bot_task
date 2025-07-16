<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DashboardService;

class DashboardController extends Controller
{
    protected $dashboardService;

    public function __construct(DashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

    public function index(Request $request)
    {
        $user = $this->dashboardService->handleAuthentication($request);

        if (!$user) {
            abort(403, 'Foydalanuvchi topilmadi');
        }

        $groupData = $this->dashboardService->getGroupData($user->id);

        return view('dashboard', [
            'groupsCount' => count($groupData),
            'attendanceCount' => collect($groupData)->where('attendance', true)->count(),
            'groupData' => $groupData,
        ]);
    }
}

