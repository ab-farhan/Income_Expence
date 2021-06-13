@extends('layouts/admin')
@section('content')
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body ">
                <div class="row card_body_top clearfix">
                    <div class="col-md-7 "><h4><i class="fa fa-gg-circle"></i> Add User Information</h4></div>
                    <div class="col-md-5 text-right">
                        <a href="{{url('admin/user')}}" class=" card_header_btn"> <i class="fa fa-th"></i> All User</a>
                    </div>
                </div>
                <div class="contain">
                    <form action="{{url('admin/user/add/submit')}}" method="post" enctype= multipart/form-data>
                    @csrf
                        <div class="row ">
                        <label >Full Name <span class="require_str">*</span></label>
                        <div class="input-group input-group-icon{{$errors->has('name') ? ' has_error':''}}">
                            <input type="text" placeholder="Full Name" name="name" value="{{old('name')}}">
                            <div class="input-icon"><i class="fa fa-user"></i></div>
                            @if($errors->has('name'))
                                <span class="error">{{$errors->first('name')}}</span>
                            @endif
                        </div>
                        <label >Email <span class="require_str">*</span></label>
                        <div class="input-group input-group-icon {{$errors->has('email') ? ' has_error':''}}">
                            <input type="email" placeholder="Email Adress" name="email" value="{{old('email')}}">
                            <div class="input-icon"><i class="fa fa-envelope"></i></div>
                            @if($errors->has('email'))
                                <span class="error">{{$errors->first('email')}}</span>
                            @endif
                        </div>
                        <label >Phone <span class="require_str">*</span></label>
                        <div class="input-group input-group-icon {{$errors->has('phone') ? ' has_error':''}}">
                            <input type="text" placeholder="Phone Number" name="phone" value="{{old('phone')}}">
                            <div class="input-icon"><i class="fa fa-phone"></i></div>
                            @if($errors->has('phone'))
                                <span class="error">{{$errors->first('phone')}}</span>
                            @endif
                        </div>
                        <label >User Role <span class="require_str">*</span></label>
                        <div class="input-group {{$errors->has('role') ? ' has_error':''}}">
                            <select name="role">
                                <option value="">Select Role</option>
                                <option value="1">Super Admin</option>
                                <option value="2"> Admin</option>
                                <option value="3">Author</option>
                                <option value="4">Editor </option>
                                <option value="5">Subscriber </option>
                             </select>
                             @if($errors->has('role'))
                                <span class="error">{{$errors->first('role')}}</span>
                            @endif
                        </div>
                        <!-- <label >Image </label>
                        <div class="input-group input-group-icon">
                            <input type="file" placeholder="Image" name="pic">
                            <div class="input-icon"><i class="fa fa-image"></i></div>
                        </div> -->
                        <label>Photo:</label>
                        <div class="pl-0 col-12 pr-0">

                              <div class="input-group mb-0">
                                  <span class="input-group-btn input-group-icon">
                                      <span class="btn  btn-file btnu_browse">
                                          Browse… <input type="file" name="pic" id="imgInp">
                                      </span>
                                      <div class="input-icon"><i class="fa fa-image"></i></div>
                                  </span>
                                  <input type="text" class="form-control" readonly>
                              </div>
                              <img id='img-upload'/>
                        </div>
                        <label >Password <span class="require_str">*</span></label>
                        <div class="input-group input-group-icon {{$errors->has('password') ? ' has_error':''}}">
                            <input type="password" placeholder="Password" name="password">
                            <div class="input-icon"><i class="fa fa-key"></i></div>
                            @if($errors->has('password'))
                                <span class="error">{{$errors->first('password')}}</span>
                            @endif
                        </div>
                        <label >Confirm Password <span class="require_str">*</span></label>
                        <div class="input-group input-group-icon {{$errors->has('password_confirmation') ? ' has_error':''}}">
                            <input type="password" placeholder="Confirm-Password" name="password_confirmation" id="password_confirmation">
                            <div class="input-icon"><i class="fa fa-key"></i></div>
                            @if($errors->has('password_confirmation'))
                                <span class="error">{{$errors->first('password_confirmation')}}</span>
                            @endif
                        </div>
                        <button type="submit" class="btn submit_btn mt-3">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection
