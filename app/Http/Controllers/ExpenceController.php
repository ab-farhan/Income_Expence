<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Expence;
use Carbon\Carbon;
use Session;
use Auth;

class ExpenceController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $allexp=Expence::where('expence_status',1)->orderBy('expence_id','DESC')->get();
        return view('admin.expence.all',compact('allexp'));
    }

    public function add(){
        return view('admin.expence.add');
    }

    public function edit($slug){
        $edit=Expence::where('expence_status',1)->where('expence_slug',$slug)->firstOrFail();
        return view('admin.expence.edit',compact('edit'));
    }

    public function view($slug){
        $view=Expence::where('expence_status',1)->where('expence_slug',$slug)->firstOrFail();
        return view('admin.expence.view',compact('view'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'details'=>'required',
            'amount'=>'required|numeric',
            'date'=>'required',
            'category'=>'required',
        ],[]);
        $slugTitle=Str::slug($request['details'],'-');
        $slug=time().$slugTitle;
        $creator=Auth::user()->name;
        $insert=Expence::insertGetId([
            'expence_details'=>$request['details'],
            'expence_amount'=>$request['amount'],
            'expence_cretegory_id'=>$request['category'],
            'expence_date'=>$request['date'],
            'expence_slug'=>$slug,
            'expence_creator'=>$creator,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($insert){
            Session::flash('sucess','value');
            return redirect('admin/expence');
        }else{
            Session::flash('error','value');
            return redirect('admin/expence/add');
        }
    }
    
    public function update(Request $request){
        $this->validate($request,[
            'details'=>'required',
            'amount'=>'required|numeric',
            'date'=>'required',
            'category'=>'required',
        ],[]);
        $id=$request['id'];
        $pslug=$request['slug'];
        $slugTitle=Str::slug($request['details'],'-');
        $slug=time().$slugTitle;

        $update=Expence::where('expence_status',1)->where('expence_id',$id)->update([
            'expence_details'=>$request['details'],
            'expence_amount'=>$request['amount'],
            'expence_cretegory_id'=>$request['category'],
            'expence_date'=>$request['date'],
            'expence_slug'=>$slug,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($update){
            Session::flash('sucess','value');
            return redirect('admin/expence/view/'.$slug);
        }else{
            Session::flash('error','value');
            return redirect('admin/expence/edit/'.$pslug);
        }
    }

    public function softdelete(){
        $id=$_POST['modal_id'];
        $softdelete=Expence::where('expence_id',$id)->update([
            'expence_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($softdelete){
            Session::flash('soft_success','value');
            return redirect('admin/expence');
        }else{
            Session::flash('soft_error','value');
            return redirect('admin/expence');
        }
    }

    public function recycle(){
        $recycle=Expence::where('expence_status',0)->get();
        return view('admin.expence.recycle',compact('recycle'));
    }

    public function restore($slug){
        $restore=Expence::where('expence_status',0)->where('expence_slug',$slug)->update([
            'expence_status'=>1,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($restore){
            Session::flash('recycle_success');
            return redirect('admin/expence');
        }else{
            Session::flash('recycle_error');
            return redirect('admin/expence/recycle');
        }
    }
    public function delete($id){
        $delete=Expence::where('expence_status',0)->find($id)->delete();
        return redirect('admin/expence');
        
    }
}
