<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClientRequest;
use App\Http\Requests\CreateDeveloperRequest;
use App\Http\Requests\CreateProjectManagerRequest;
use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\CreateTaskRequest;
use App\Models\Client;
use App\Models\Project;
use App\Models\Role;
use App\Models\StatusTag;
use App\Models\Task;
use App\Models\TaskTag;
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
        return view('administrator.developer.index', [
            'developers' => User::where('role_id', Role::where('name', 'developer')->first()->id)->get()
        ]);
    }

    public function createDeveloper(): View
    {
        $developer = new User();
        return view('administrator.developer.create', [
            'developer' => $developer,
            'tasks' => Task::select('id', 'name')->get(),
            'projects' => Project::select('id', 'title')->get()
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
        $developer->projects()->sync($request->validated('projects'));

        return redirect()->route('administrator.developer.index')->with('success', "The developer has been successfully saved!");
    }

    public function editDeveloper(User $developer)
    {
        return view('administrator.developer.edit', [
            'developer' => $developer,
            'tasks' => Task::select('id', 'name')->get(),
            'projects' => Project::select('id', 'title')->get()
        ]);
    }

    public function updateDeveloper(User $developer, CreateDeveloperRequest $request)
    {
        $developer->update($request->validated());
        $developer->tasks()->sync($request->validated('tasks'));
        $developer->projects()->sync($request->validated('projects'));

        return redirect()->route('administrator.developer.index')->with('success', "The developer has been successfully modified!");
    }

    public function showDeveloper(User $developer): RedirectResponse | View
    {
        return view('administrator.developer.show', [
            'developer' => $developer
        ]);
    }


    // ####################################
    // ####################################
    // ####################################
    //  Project
    public function project(): View
    {
        return view('administrator.project.index', [
            'projects' => Project::with('projectManagers')->get()
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
            'project' => $project,
            'clients' => Client::all(),
            'projectManagers' => User::where('role_id', Role::where('name', 'project-manager')->first()->id)->get()
        ]);
    }

    public function storeProject(CreateProjectRequest $request)
    {
        $project = Project::create($request->validated());
        $project->projectManagers()->sync($request->validated('projectManagers'));

        return redirect()->route('administrator.project.index')->with('success', "The project has been successfully saved!");
    }

    public function editProject(Project $project)
    {
        return view('administrator.project.edit', [
            'project' => $project,
            'clients' => Client::all(),
            'projectManagers' => User::where('role_id', Role::where('name', 'project-manager')->first()->id)->get()
        ]);
    }

    public function updateProject(Project $project, CreateProjectRequest $request)
    {
        $project->update($request->validated());
        $project->projectManagers()->sync($request->validated('projectManagers'));

        return redirect()->route('administrator.project.index')->with('success', "The project has been successfully modified!");
    }



    // ####################################
    // ####################################
    // ####################################
    //  ProjectManager
    public function projectManager(): View
    {
        return view('administrator.projectManager.index', [
            'projectManagers' => User::where('role_id', Role::where('name', 'project-manager')->first()->id)->get()
        ]);
    }

    public function showProjectManager(User $projectManager): RedirectResponse | View
    {
        return view('administrator.projectManager.show', [
            'projectManager' => $projectManager
        ]);
    }

    public function createProjectManager()
    {
        $projectManager = new User();
        return view('administrator.projectManager.create', [
            'projectManager' => $projectManager,
            'tasks' => Task::select('id', 'name')->get(),
            'projects' => Project::select('id', 'title')->get()
        ]);
    }

    public function storeProjectManager(CreateProjectManagerRequest $request)
    {
        $projectManager = User::create([
            ...$request->validated(),
            'password' => bcrypt('testtest'),
            'role_id' => Role::where('name', 'project-manager')->first()->id
        ]);
        $projectManager->tasks()->sync($request->validated('tasks'));
        $projectManager->projects()->sync($request->validated('projects'));

        return redirect()->route('administrator.projectManager.index')->with('success', "The project manager has been successfully saved!");
    }

    public function editProjectManager(User $projectManager)
    {
        return view('administrator.projectManager.edit', [
            'projectManager' => $projectManager,
            'tasks' => Task::select('id', 'name')->get(),
            'projects' => Project::select('id', 'title')->get()
        ]);
    }

    public function updateProjectManager(User $projectManager, CreateProjectManagerRequest $request)
    {
        $projectManager->update($request->validated());
        $projectManager->tasks()->sync($request->validated('tasks'));
        $projectManager->projects()->sync($request->validated('projects'));

        return redirect()->route('administrator.projectManager.index')->with('success', "The project has been successfully modified!");
    }



    // ####################################
    // ####################################
    // ####################################
    //  Client
    public function client(): View
    {
        return view('administrator.client.index', [
            'clients' => Client::with('projects')->get()
        ]);
    }

    public function showClient(Client $client): RedirectResponse | View
    {
        return view('administrator.client.show', [
            'client' => $client
        ]);
    }

    public function createClient()
    {
        $client = new Client();
        return view('administrator.client.create', [
            'client' => $client,
            'project' => Project::select('id', 'name')->get()
        ]);
    }

    public function storeClient(CreateClientRequest $request)
    {

        $client = Client::create($request->validated());
        return redirect()->route('administrator.client.index')->with('success', "The client has been successfully saved!");
    }

    public function editClient(Client $client)
    {
        return view('administrator.client.edit', [
            'client' => $client
        ]);
    }

    public function updateclient(Client $client, CreateClientRequest $request)
    {
        $client->update($request->validated());
        return redirect()->route('administrator.client.index')->with('success', "The client has been successfully modified!");
    }



    // ####################################
    // ####################################
    // ####################################
    //  Task

    public function task(): View
    {
        return view('administrator.task.index', [
            'tasks' => Task::all(),

        ]);
    }

    public function showTask(Task $task): RedirectResponse | View
    {
        return view('administrator.task.show', [
            'task' => $task
        ]);
    }

    public function createTask()
    {
        $task = new Task();
        return view('administrator.task.create', [
            'task' => $task,
            'projects' => Project::select('id', 'title')->get(),
            'status_tags' => StatusTag::select('id', 'label')->get(),
            'task_tags' => TaskTag::select('id', 'label')->get(),
            'projectManagers' => User::where('role_id', Role::where('name', 'project-manager')->first()->id)->get(),
            'developers' => User::where('role_id', Role::where('name', 'developer')->first()->id)->get()
        ]);
    }

    public function storeTask(CreateTaskRequest $request)
    {
        $task = Task::create($request->validated());
        $task->users()->sync([...$request->validated('developers'), ...$request->validated('projectManagers')]);

        return redirect()->route('administrator.task.index')->with('success', "The task has been successfully saved!");
    }

    public function editTask(Task $task)
    {
        return view('administrator.task.edit', [
            'task' => $task,
            'projects' => Project::select('id', 'title')->get(),
            'status_tags' => StatusTag::select('id', 'label')->get(),
            'task_tags' => TaskTag::select('id', 'label')->get(),
            'projectManagers' => User::where('role_id', Role::where('name', 'project-manager')->first()->id)->get(),
            'developers' => User::where('role_id', Role::where('name', 'developer')->first()->id)->get()
        ]);
    }

    public function updateTask(Task $task, CreateTaskRequest $request)
    {
        $task->update($request->validated());
        $task->users()->sync([...$request->validated('developers'), ...$request->validated('projectManagers')]);

        return redirect()->route('administrator.task.index')->with('success', "The task has been successfully modified!");
    }
}
