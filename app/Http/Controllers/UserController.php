<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;
use App\Models\User;
use Carbon\Carbon;
use Session;
use Image;
use Auth;
use PDF;


class UserController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function alluser(){
        $alluser=User::where('user_status',1)->orderBy('id','DESC')->get();
        return view('admin.user.all',compact('alluser'));
    }
    public function adduser(){
        return view('admin.user.add');
    }
    public function view($slug){
        $viewuser=User::where('user_status',1)->where('user_slug',$slug)->firstOrFail();
        return view('admin.user.view',compact('viewuser'));
    }
    public function insert(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required|max:20',
            'role'=>'required',
            'password'=>'required|min:8|confirmed',
            'password_confirmation'=>'required',
        ],[]);

        $slugTitle=Str::slug($request['name'],'-');
        $slug=time().'-'.$slugTitle;

        $insert=User::insertGetId([
            'name'=>$request['name'],
            'email'=>$request['email'],
            'user_phone'=>$request['phone'],
            'user_slug'=>$slug,
            'password'=>Hash::make($request['password']),
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        
        if($request->hasFile('pic')){
            $image=$request->file('pic');
            $imageName='Profile_'.time().'-'.$insert.'-'.$image->getClientOriginalExtension();
            Image::make($image)->save(base_path('public/uploads/'.$imageName));
            User::where('id',$insert)->update([
                'user_image'=>$imageName,
            ]);
        }
        if($insert){
            Session::flash('success','value');
            return redirect('admin/user');
        }else{
            Session::flash('error','value');
            return redirect('admin/user/add');
        }
    }

    public function edit($slug){
        $edit=User::where('user_status',1)->where('user_slug',$slug)->firstOrFail();
        return view('admin.user.edit',compact('edit'));
    }
    public function update(Request $request){
        $this->validate($request,[
            'name'=>'required',
        ],[]);

        $pslug=$request['slug'];
        $slugTitle=Str::slug($request['name'],'-');
        $slug=time().$slugTitle;
        $id=$request['id'];
        $update=User::where('user_status',1)->where('id',$id)->update([
            'name'=>$request['name'],
            'user_phone'=>$request['phone'],
            'user_slug'=>$slug,
            'updated_at'=>Carbon::now()->toDateTimeString(),   
        ]);
        if($request->hasFile('pic')){
            $image=$request->file('pic');
            $imageName='Profile_'.time().'-'.$id.'-'.$image->getClientOriginalExtension();
            Image::make($image)->save(base_path('public/uploads/'.$imageName));
            User::where('id',$id)->update([
                'user_image'=>$imageName,
            ]);
            }
            if($update){
                Session::flash('success','value');
                return redirect('admin/user/edit/'.$slug);
            }else{
                Session::flash('error','value');
                return redirect('admin/user/edit/'.$pslug);
            }
    }
    public function softdelete($slug){
        $softDelete=User::where('user_status',1)->where('user_slug',$slug)->update([
            'user_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($softDelete){
            Session::flash('soft_success','value');
            return redirect('admin/user');
        }else{
            Session::flash('soft_error','value');
            return redirect('admin/user');
        }
    }

    public function pdf(){
        $all=User::where('user_status',1)->get();
        $pdf = PDF::loadView('admin.user.pdf',compact('all'));
        return $pdf->download('user.pdf');
    }
    public function excel(){
        return Excel::download(new UserExport, 'user.xlsx');
    }

}
