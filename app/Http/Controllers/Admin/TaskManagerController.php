<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskManagerController extends Controller
{
    public function index(){
        return view("admin.task-manager.index");
    }
}
