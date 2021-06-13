<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Income;
use App\Models\Expence;
use App\Models\InomeCategory;
use App\Models\ExpenceCategory;

class RecycleController extends Controller{
    public function __construct(){
        $this->middleware('auth');
        
    }
    public function index(){
        $user=User::where('user_status',0)->count();
        $income=Income::where('income_status',0)->count();
        $expence=Expence::where('expence_status',0)->count();
        $incomeCategory=InomeCategory::where('income_cretegory_status',0)->count();
        $expenceCategory=ExpenceCategory::where('expence_cretegory_status',0)->count();
        return view('admin.recycle.all',compact('user','income','expence','incomeCategory','expenceCategory'));
    }
}
