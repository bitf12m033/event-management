<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $pageTitle = 'Dashboard';
        $breadcrumbs = [
            // ['title' => 'Home', 'url' => url('/')],
            ['title' => 'Dashboard', 'url' => null]
        ];
        return view('admin.dashboard.index',compact('pageTitle', 'breadcrumbs'));
    }
}
