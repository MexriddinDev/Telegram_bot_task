<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GroupsService;

class GroupsController extends Controller
{
    protected $groupsService;

    public function __construct(GroupsService $groupsService)
    {
        $this->groupsService = $groupsService;
    }

    public function index(Request $request)
    {
        $user = $this->groupsService->authenticateUser($request);

        if (!$user) {
            abort(403, 'Foydalanuvchi topilmadi');
        }

        $groups = $this->groupsService->getUserGroups($user->id);

        return view('groups', compact('groups'));
    }

    public function show($id)
    {
        $data = $this->groupsService->getGroupDetails($id);

        return view('group-show', $data);
    }
}
