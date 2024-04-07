<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    function index()
    {
        return view('admin.dashboard.index');
    }
}
