<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
use App\Models\Expence;
use Carbon\Carbon;
use DB;

class SummaryController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $month=Carbon::now()->format('m');
        $fullMonth=Carbon::now()->format('F');
        $year=Carbon::now()->format('Y');
        $income=Income::where('income_status',1)->whereMonth('income_date','=',$month)->whereYear('income_date','=',$year)->get();
        $totalIncome=Income::where('income_status',1)->whereMonth('income_date','=',$month)->whereYear('income_date','=',$year)->sum('income_amount');
        $expence= Expence::where('expence_status',1)->whereMonth('expence_date','=',$month)->whereYear('expence_date','=',$year)->get();
        $totalExpence= Expence::where('expence_status',1)->whereMonth('expence_date','=',$month)->whereYear('expence_date','=',$year)->sum('expence_amount');
        return view('admin.summary.all',compact('month','fullMonth','year','income','totalIncome','expence','totalExpence'));
    }
    public function search($form,$to){
        $income=Income::where('income_status',1)->whereBetween('income_date',[$form,$to])->get();
        $expence=Expence::where('expence_status',1)->whereBetween('expence_date',[$form,$to])->get();
        $totalIncome=Income::where('income_status',1)->whereBetween('income_date',[$form,$to])->sum('income_amount');
        $totalExpence=Expence::where('expence_status',1)->whereBetween('expence_date',[$form,$to])->sum('expence_amount');
        return view('admin.summary.search',compact('form','to','expence','totalExpence','income','totalIncome'));
    }
}
