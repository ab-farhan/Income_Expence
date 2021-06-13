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
                    <form action="{{url('admin/expence/category/edit/submit')}}" method="post" enctype= multipart/form-data>
                    @csrf
                        <div class="row ">
                        <label >Expence Category Name <span class="require_str">*</span></label>
                        <div class="input-group input-group-icon{{$errors->has('name') ? ' has_error':''}}"> 
                            <input type="hidden"  name="id" value="{{$edit->expence_cretegory_id}}">
                            <input type="text" placeholder="Expence Category Name" name="name" value="{{$edit->expence_cretegory_name}}">
                            <div class="input-icon"><i class="fa fa-info"></i></div>
                            @if($errors->has('name'))
                                <span class="error">{{$errors->first('name')}}</span>
                            @endif 
                        </div>
                        <label >Expence Category Remark</label>
                        <div class="input-group input-group-icon ">
                            <input type="text" placeholder="Expence Category Remark" name="remark" value="{{$edit->expence_cretegory_remark}}">
                            <div class="input-icon"><i class="fa fa-usd"></i></div>
                            
                        </div>
                        <button type="submit" class="btn submit_btn mt-3">Submit</button>
                        </div>   
                    </form>
                </div>
            </div>      
        </div>
    </div>



@endsection