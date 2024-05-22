<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $showdashboard = auth()->user()->isAdmin();
        return view('pages.dashboard',compact('showdashboard'));
    }
}
