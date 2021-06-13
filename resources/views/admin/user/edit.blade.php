@extends('layouts/admin')
@section('content')
    <div class="col-12 mt-5">
            @if(Session::has('success'))
            <script>
                swal({title: "Sucessfully",text: "Update User Information",icon: "success",});
            </script>
            @endif
            @if(Session::has('error'))
            <script>
                swal({title: "Opps!!",text: "Update Failed",icon: "error",});
            </script>
            @endif
        <div class="card">
            <div class="card-body ">
                <div class="row card_body_top clearfix">
                    <div class="col-md-7 "><h4><i class="fa fa-gg-circle"></i> Update User Information</h4></div>
                    <div class="col-md-5 text-right">
                        <a href="{{url('admin/user')}}" class=" card_header_btn"> <i class="fa fa-th"></i> All User</a>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-5 offset-3">
                    <form action="{{url('admin/user/edit/submit')}}" method="post" enctype= multipart/form-data>
                    @csrf
                        <div class="row ">
                        <label >Full Name <span class="require_str">*</span></label>
                        <input type="hidden" name="id" value="{{$edit->id}}">
                        <input type="hidden" name="slug" value="{{$edit->user_slug}}">
                        <div class="input-group input-group-icon{{$errors->has('name') ? ' has_error':''}}"> 
                            <input type="text" placeholder="Full Name" name="name" value="{{$edit->name}}">
                            <div class="input-icon"><i class="fa fa-user"></i></div>
                            @if($errors->has('name'))
                                <span class="error">{{$errors->first('name')}}</span>
                            @endif 
                        </div>
                        <label >Email</label>
                        <div class="input-group input-group-icon">
                            <input type="email" placeholder="Email Adress" name="email" value="{{$edit->email}}" readonly>
                            <div class="input-icon"><i class="fa fa-envelope"></i></div>
                             
                        </div>
                        <label >Phone </label>
                        <div class="input-group input-group-icon">
                            <input type="text" placeholder="Phone Number" name="phone" value="{{$edit->user_phone}}">
                            <div class="input-icon"><i class="fa fa-phone"></i></div>
                            
                        </div>
                        <label >User Role <span class="require_str">*</span></label>
                        <div class="input-group">
                            <select name="role">
                                <option vlue="">Select Role</option>
                                <option vlaue="1">Super Admin</option>
                                <option vlaue="2"> Admin</option>
                                <option vlaue="3">Author</option>
                                <option vlaue="4">Editor </option>
                                <option vlaue="5">Subscriber </option>
                             </select>        
                        </div>
                        <label >Image </label>
                        <div class="input-group input-group-icon">
                            <input type="file" placeholder="Image" name="pic">
                            <div class="input-icon"><i class="fa fa-image"></i></div>
                        </div>
                        <button type="submit" class="btn submit_btn mt-3">Update</button>
                        </div>   
                    </form>
                </div>
                <div class="col-md-2">
                         @if($edit->user_image !='')
                        <img src="{{asset('uploads/'.$edit->user_image)}}" class="edit_profile" alt="">
                        @else
                        <img src="{{asset('contents/admin/assets/images/author/avatar.png')}}" alt="" class="edit_profile">
                        @endif
                </div>
                </div>
            </div>      
        </div>
    </div>



@endsection