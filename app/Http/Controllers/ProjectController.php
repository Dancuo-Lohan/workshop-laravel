<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProjectRequest;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(): View
    {
        return view('project.index', [
            'projects' => Project::all()
        ]);
    }

    public function show(Project $project): RedirectResponse | View
    {
        return view('project.show', [
            'project' => $project
        ]);
    }

    public function create()
    {
        $project = new Project();
        return view('project.create', [
            'project' => $project
        ]);
    }

    public function store(CreateProjectRequest $request)
    {
        $project = Project::create($request->validated());
        return redirect()->route('project.index')->with('success', "The project has been successfully saved!");
    }

    public function edit(Project $project)
    {
        return view('project.edit', [
            'project' => $project
        ]);
    }

    public function update(Project $project, CreateProjectRequest $request)
    {
        $project->update($request->validated());
        return redirect()->route('project.index')->with('success', "The project has been successfully modified!");
    }
}
