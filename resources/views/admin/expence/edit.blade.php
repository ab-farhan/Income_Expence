@extends('layouts/admin')
@section('content')
    <div class="col-12 mt-5">
        @if(Session::has('error'))
        <script>
            swal({title: "Opps!!",text: "Income Upload Failed",icon: "error",});
        </script>
        @endif
        <div class="card">
            <div class="card-body ">
                <div class="row card_body_top clearfix">
                    <div class="col-md-7 "><h4><i class="fa fa-gg-circle"></i> Edit Expence Information</h4></div>
                    <div class="col-md-5 text-right">
                        <a href="{{url('admin/expence')}}" class=" card_header_btn"> <i class="fa fa-th"></i> All Expence</a>
                    </div>
                </div>
                <div class="contain">
                    <form action="{{url('admin/expence/edit/update')}}" method="post" enctype= multipart/form-data>
                    @csrf
                        <div class="row ">
                        <label >Income Details <span class="require_str">*</span></label>
                        <div class="input-group input-group-icon{{$errors->has('details') ? ' has_error':''}}"> 
                            <input type="hidden"  name="id" value="{{$edit->expence_id}}">
                            <input type="hidden"  name="slug" value="{{$edit->expence_slug}}">
                            <input type="text" placeholder="Income Details" name="details" value="{{$edit->expence_details}}">
                            <div class="input-icon"><i class="fa fa-info"></i></div>
                            @if($errors->has('details'))
                                <span class="error">{{$errors->first('details')}}</span>
                            @endif 
                        </div>
                        <label >Income Amount <span class="require_str">*</span></label>
                        <div class="input-group input-group-icon {{$errors->has('amount') ? ' has_error':''}}">
                            <input type="text" placeholder="Income Amount" name="amount" value="{{$edit->expence_amount}}">
                            <div class="input-icon"><i class="fa fa-usd"></i></div>
                            @if($errors->has('amount'))
                                <span class="error">{{$errors->first('amount')}}</span>
                            @endif 
                        </div>

                        <label >Expence Cetagory <span class="require_str">*</span></label>
                        <div class="input-group input-group-icon {{$errors->has('category') ? ' has_error':''}}">
                        @php
                            $allCate=App\Models\ExpenceCategory::where('expence_cretegory_status',1)->orderBy('expence_cretegory_id','ASC')->get(); 
                        @endphp
                            <select name="category" id="" class="">
                            <option value="">Select category</option>
                            @foreach($allCate as $data)
                            <option value="{{$data->expence_cretegory_id}}" @if($data->expence_cretegory_id==$edit->expence_cretegory_id) selected="selected" @endif>{{$data->expence_cretegory_name}}</option>
                            @endforeach
                            </select>

                            <div class="input-icon"><i class="fa fa-usd"></i></div>
                            @if($errors->has('category'))
                                <span class="error">{{$errors->first('category')}}</span>
                            @endif 
                        </div>

                        <label >Income Date <span class="require_str">*</span></label>
                        <div class="input-group input-group-icon {{$errors->has('date') ? ' has_error':''}}">
                            <input type="date" placeholder="Income Date" name="date" value="{{$edit->expence_date}}">
                            <div class="input-icon"><i class="fa fa-calendar"></i></div>
                            @if($errors->has('date'))
                                <span class="error">{{$errors->first('date')}}</span>
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