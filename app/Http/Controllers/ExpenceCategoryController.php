<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\ExpenceCategory;
use Carbon\Carbon;
use Session;
use Auth;

class ExpenceCategoryController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $allCategory=ExpenceCategory::where('expence_cretegory_status',1)->OrderBy('expence_cretegory_id','DESC')->get();
        return view('admin.expence-category.all',compact('allCategory'));
    }
    public function add(){
        return view('admin.expence-category.add');
    }
    public function view($id){
        $view=ExpenceCategory::where('expence_cretegory_status',1)->where('expence_cretegory_id',$id)->firstOrFail();
        return view('admin.expence-category.view',compact('view'));
    }
    public function edit($id){
        $edit=ExpenceCategory::where('expence_cretegory_status',1)->where('expence_cretegory_id',$id)->firstOrFail();
        return view('admin.expence-category.edit',compact('edit'));
    }
    public function update(Request $request){
        $this->validate($request,[
            'name'=>'required',
        ],[]);
        $id=$request['id'];
        $update=ExpenceCategory::where('expence_cretegory_status',1)->where('expence_cretegory_id',$id)->update([
            'expence_cretegory_name'=>$request['name'],
            'expence_cretegory_remark'=>$request['remark'],
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($update){
            Session::flash('success','value');
            return redirect('admin/expence/category/view/'.$id);
        }else{
            Session::flash('error','value');
            return redirect('admin/expence/category/add/'.$id);
        }
    }
    public function insert(Request $request){
        $this->validate($request,[
            'name'=>'required|unique:expence_categories,expence_cretegory_name',
        ],[
            'name.unique'=>'Expence category name alrady exists!'
        ]);
        $creator=Auth::user()->name;
        $id=$request['expence_cretegory_id'];
        $insert=ExpenceCategory::insertGetId([
            'expence_cretegory_name'=>$request['name'],
            'expence_cretegory_remark'=>$request['remark'],
            'expence_cretegory_creator'=>$creator,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($insert){
            Session::flash('success','value');
            return redirect('admin/expence/category');
        }else{
            Session::flash('success','value');
            return redirect('admin/expence/category/add');
        }

    }
    public function softdelete(){
        $id=$_POST['modal_id'];
        $softdelete=ExpenceCategory::where('expence_cretegory_id',$id)->update([
            'expence_cretegory_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($softdelete){
            Session::flash('soft_success','value');
            return redirect('admin/expence/category');
        }else{
            Session::flash('soft_error','value');
            return redirect('admin/expence/category');
        }
    }
}
