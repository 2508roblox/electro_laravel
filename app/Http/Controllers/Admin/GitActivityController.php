<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GitActivityController extends Controller
{
    public function master(){
        return view("admin.git-activity.master");
    }
    public function hoang(){
        return view("admin.git-activity.hoang");
    }
    public function giang(){
        return view("admin.git-activity.giang");
    }
    public function tai(){
        return view("admin.git-activity.tai");
    }
}
