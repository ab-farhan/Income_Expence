<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
use App\Models\Expence;
use Carbon\Carbon;

class AdminController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $to=Carbon::now()->format('Y-m-d');
        $form=date('Y-m-d',strtotime('-15 days',strtotime($to)));
        $last_15days_income= Income::where('income_status',1)->where('income_date','<=',$to)->where('income_date','>=',$form)->get();
        $last_15days_all_income= Income::where('income_status',1)->where('income_date','<=',$to)->where('income_date','>=',$form)->sum('income_amount');
        $last_15days_expence= Expence::where('expence_status',1)->where('expence_date','<=',$to)->where('expence_date','>=',$form)->get();
        $last_15days_all_expence= Expence::where('expence_status',1)->where('expence_date','<=',$to)->where('expence_date','>=',$form)->sum('expence_amount');
        $totalIncome= Income::where('income_status',1)->sum('income_amount');
        $totalExpence= Expence::where('expence_status',1)->sum('expence_amount');
        return view('admin.dashboard.index',compact('last_15days_income','last_15days_all_income','last_15days_expence','last_15days_all_expence','totalIncome','totalExpence'));
    }
    
}
