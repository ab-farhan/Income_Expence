<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\InomeCategory;
use Carbon\Carbon;
use Session;
use Auth;

class IncomeCategoryController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $allCategory=InomeCategory::where('income_cretegory_status',1)->orderBy('income_cretegory_id','DESC')->get();
        return view('admin.income-category.all',compact('allCategory'));
    }
    public function add(){
        return view('admin.income-category.add');
    }
    public function view($id){
        $view=InomeCategory::where('income_cretegory_status',1)->where('income_cretegory_id',$id)->firstOrFail();
        return view('admin.income-category.view',compact('view'));
    }
    public function edit($id){
        $edit=InomeCategory::where('income_cretegory_status',1)->where('income_cretegory_id',$id)->firstOrFail();
        return view('admin.income-category.edit',compact('edit'));
    }
    public function insert(Request $request){
        $this->validate($request,[
            'name'=>'required|unique:inome_categories,income_cretegory_name',
        ],[]);
        $creator=Auth::user()->name;
        
        $insert=InomeCategory::insertGetId([
            'income_cretegory_name'=>$request['name'],
            'income_cretegory_remark'=>$request['remark'],
            'income_cretegory_creator'=>$creator,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($insert){
            Session::flash('success','value');
            return redirect('admin/income/category');
        }else{
            Session::flash('success','value');
            return redirect('admin/income/category/add');
        }
    }
    public function update(Request $request){
        $this->validate($request,[
            'name'=>'required',
        ],[
            'name.required'=>'This income category has been required.',
        ]);
        $id=$request['id'];
        $update=InomeCategory::where('income_cretegory_status',1)->where('income_cretegory_id',$id)->update([
            'income_cretegory_name'=>$request['name'],
            'income_cretegory_remark'=>$request['remark'],
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($update){
            Session::flash('success','value');
            return redirect('admin/income/category/view/'.$id);
        }else{
            Session::flash('error','value');
            return redirect('admin/income/category/edit/'.$id);
        }
    }
    public function softdelete($id){
        $softdelete=InomeCategory::where('income_cretegory_status',1)->where('income_cretegory_id',$id)->update([
            'income_cretegory_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString(),
            
        ]);
        if($softdelete){
            Session::flash('success','value');
            return redirect('admin/income/category/');
        }else{
            Session::flash('error','value');
            return redirect('admin/income/category/');
        }
    }

}
