<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use App\Models\TeamModel;
use App\Models\CategoryModel;
use App\Models\DesignationModel;
use App\Models\ProjectsModel;
use App\Models\TaskModel;
use App\Models\ProductivityModel;
use App\Models\GroupModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $admin = AdminModel::count();
        $member = TeamModel::count();
        $category = CategoryModel::count();
        $designation = DesignationModel::count();
        $projects = ProjectsModel::count();
        $pendingtasks = TaskModel::where('status','pending')->count();
        $completetasks = TaskModel::where('status','complete')->count();
        $ProductivityModel = ProductivityModel::count();
        $tasks = TaskModel::count();
        $groups = GroupModel::count();
        return view('pages.home',compact('admin','member','category','designation','projects','tasks','pendingtasks','completetasks','ProductivityModel','groups'));
    }
}
