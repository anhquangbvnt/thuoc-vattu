<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SanphamController extends Controller
{
    public function index()
    {
        return view('admin.pages.list_sp');
    }

    public function add()
    {
        return view('admin.pages.add_sp');
    }
}
