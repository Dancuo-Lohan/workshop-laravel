<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDeveloperRequest;
use App\Http\Requests\CreateProjectRequest;
use App\Models\Project;
use App\Models\Role;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdministratorController extends Controller
{

    public function index(): View
    {
        return view('administrator.index', []);
    }



    // ####################################
    // ####################################
    // ####################################
    //  Developer
    public function developer(): View
    {
        return view('administrator.developer.index', []);
    }

    public function createDeveloper(): View
    {
        $developer = new User();
        return view('administrator.developer.create', [
            'developer' => $developer,
            'tasks' => Task::select('id', 'name')->get()
        ]);
    }

    public function storeDeveloper(CreateDeveloperRequest $request)
    {
        $developer = User::create([
            ...$request->validated(),
            'password' => bcrypt('testtest'),
            'role_id' => Role::where('name', 'developer')->first()->id
        ]);
        $developer->tasks()->sync($request->validated('tasks'));

        return redirect()->route('administrator.project.index')->with('success', "The developer has been successfully saved!");
    }


    // ####################################
    // ####################################
    // ####################################
    //  Project
    public function project(): View
    {
        return view('administrator.project.index', [
            'projects' => Project::all()
        ]);
    }

    public function showProject(Project $project): RedirectResponse | View
    {
        return view('administrator.project.show', [
            'project' => $project
        ]);
    }

    public function createProject()
    {
        $project = new Project();
        return view('administrator.project.create', [
            'project' => $project
        ]);
    }

    public function storeProject(CreateProjectRequest $request)
    {
        $project = Project::create($request->validated());
        return redirect()->route('administrator.project.index')->with('success', "The project has been successfully saved!");
    }

    public function editProject(Project $project)
    {
        return view('administrator.project.edit', [
            'project' => $project
        ]);
    }

    public function updateProject(Project $project, CreateProjectRequest $request)
    {
        $project->update($request->validated());
        return redirect()->route('administrator.project.index')->with('success', "The project has been successfully modified!");
    }



    // ####################################
    // ####################################
    // ####################################
    //  ProjectManager
    public function projectManager(): View
    {
        return view('administrator.projectManager.index', []);
    }



    // ####################################
    // ####################################
    // ####################################
    //  Client
    public function client(): View
    {
        return view('administrator.client.index', []);
    }



    // ####################################
    // ####################################
    // ####################################
    //  Task
    public function task(): View
    {
        return view('administrator.task.index', []);
    }
}
