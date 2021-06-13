@extends('layouts/admin')
@section('content')
    <div class="col-10 offset-md-1 mt-5">
        <div class="card">
            <div class="card-body pb-5">
                <div class="row card_body_top clearfix">
                    <div class="col-md-7 "><h4><i class="fa fa-gg-circle"></i> View User Information</h4></div>
                    <div class="col-md-5 text-right">
                        <a href="{{url('admin/user')}}" class=" card_header_btn"> <i class="fa fa-th"></i> All User</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 offset-md-2 profile">
                        @if($viewuser->user_image !='')
                        <img src="{{asset('uploads/'.$viewuser->user_image)}}" class="profile_img"  alt="">
                        @else
                        <img src="{{asset('contents/admin/assets/images/author/avatar.png')}}" alt="" class=" profile_img">
                        @endif
                        <h4>{{$viewuser->name}}</h4>
                        <span>Super Admin</span>
                        <p><i class="fa fa-phone"></i> {{$viewuser->user_phone}}</p>
                        <p><i class="fa fa-envelope"></i> {{$viewuser->email}}</p>
                        <p></i>Join at : {{$viewuser->created_at->format('d F Y')}}</p>
                        <div class="social">
                        <a href="#"><i class="fa fa-facebook"></i> </a>
                        <a href="#"><i class="fa fa-twitter"></i> </a>
                        <a href="#"><i class="fa fa-linkedin"></i></a> 
                        <a href="#"><i class="fa fa-whatsapp"></i></a> 
                        </div>
                        
                    </div>
                </div>
            </div>      
        </div>
    </div>



@endsection