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
}
