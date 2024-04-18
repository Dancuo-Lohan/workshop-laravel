<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdministratorController extends Controller
{
 
    public function index(): View
    {
        return view('administrator.index', []);
    }
 
    public function developer(): View
    {
        return view('administrator.developer.index', []);
    }
 
    public function projectManager(): View
    {
        return view('administrator.projectManager.index', []);
    }
 
    public function client(): View
    {
        return view('administrator.client.index', []);
    }
 
    public function task(): View
    {
        return view('administrator.task.index', []);
    }
}
