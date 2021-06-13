<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InomeCategory;
use App\Models\ExpenceCategory;
use App\Models\User;

class ManageController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $incomeCate=InomeCategory::where('income_cretegory_status',1)->count();
        $expenceCate=ExpenceCategory::where('expence_cretegory_status',1)->count();
        $users=User::where('user_status',1)->count();
        return view('admin.manage.index',compact('incomeCate','expenceCate','users'));
    }
}
