<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DeveloperController extends Controller
{
    public function index(): View
    {
        return view('developer.index', [
            'developer' => Auth::user()
        ]);
    }

    public function task(Task $task): RedirectResponse | View
    {
        return view('developer.task', [
            'developer' => Auth::user(),
            'task' => $task
        ]);
    }

    public function project(Project $project): RedirectResponse | View
    {
        return view('developer.project', [
            'developer' => Auth::user(),
            'project' => $project
        ]);
    }
}
