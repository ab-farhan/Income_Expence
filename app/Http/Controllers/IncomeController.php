<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Income;
use Carbon\Carbon;
use Session;
use Auth;

class IncomeController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function allincome(){
        $allincome=Income::where('income_status',1)->orderBy('income_id','DESC')->get();
        return view('admin.income.all',compact('allincome'));
    }

    public function addincome(){
        return view('admin.income.add');
    }
    public function edit($slug){
        $edit=Income::where('income_status',1)->where('income_slug',$slug)->firstOrfail();
        return view('admin.income.edit',compact('edit'));
    } 
    public function view($slug){
        $view=Income::where('income_status',1)->where('income_slug',$slug)->firstOrFail();
        return view('admin.income.view',compact('view'));
    }

    public function insert(Request $request){
        $creator=Auth::user()->name;
        $pslug=$request['income_slug'];
        $slugTitle=Str::slug($request['details'],'-');
        $slug=time().'-'.$slugTitle;
        $this->validate($request,[
            'details'=>'required',
            'amount'=>'required|numeric',
            'date'=>'required',
            'category'=>'required',
        ],[]);
        $insert=Income::insert([
            'income_details'=>$request['details'],
            'income_amount'=>$request['amount'],
            'income_cate_id'=>$request['category'],
            'income_date'=>$request['date'],
            'income_creator'=>$creator,
            'income_slug'=>$slug,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($insert){
            Session::flash('success','value');
            return redirect('admin/income');
        }else{
            Session::flash('error','value');
            return redirect('admin/income/add/');
        }
    }


    public function update(Request $request){
        $this->validate($request,[
            'details'=>'required',
            'amount'=>'required|numeric',
            'date'=>'required',
        ],[]);
         $pslug=$request['slug'];
        $id=$request['id'];
        $slugTitle=Str::slug($request['details'],'-');
        $slug=time().'-'.$slugTitle;
        $update=Income::where('income_status',1)->where('income_id',$id)->update([
            'income_details'=>$request['details'],
            'income_amount'=>$request['amount'],
            'income_cate_id'=>$request['category'],
            'income_date'=>$request['date'],
            'income_slug'=>$slug,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($update){
            Session::flash('success','value');
            return redirect('admin/income/view/'.$slug);
        }else{
            Session::flash('error','value');
            return redirect('admin/income/edit/'.$pslug);
        }

    }

    

    public function softdelete(){
        $id=$_POST['modal_id'];
        $softdelete=Income::where('income_id',$id)->update([
            'income_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($softdelete){
            Session::flash('soft_success','value');
            return redirect('admin/income');
        }else{
            Session::flash('soft_error','value');
            return redirect('admin/income');
        }
    }
    public function recycle(){
        $recycle=Income::where('income_status',0)->orderBy('income_id','DESC')->get();
        return view('admin.income.recycle',compact('recycle'));
    }
    public function restore($slug){
        $restore=Income::where('income_status',0)->where('income_slug',$slug)->update([
            'income_status'=>1,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($restore){
            Session::flash('re_success','value');
            return redirect('admin/income');
        }else{
            Session::flash('re_error','value');
            return redirect('admin/income/recycle');
        }
    }
    public function delete($id){
        $delete=Income::where('income_status',0)->find($id)->delete();
        return redirect('admin/income/recycle');
        if($delete){
            return redirect('admin/income/recycle');
        }
    }
}
