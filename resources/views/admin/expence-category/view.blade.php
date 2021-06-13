@extends('layouts/admin')
@section('content')
    <div class="col-10 offset-md-1 mt-5">
        <div class="card">
            <div class="card-body pb-5">
                <div class="row card_body_top clearfix">
                    <div class="col-md-7 "><h4><i class="fa fa-gg-circle"></i> View Expence Cetagory Information</h4></div>
                    <div class="col-md-5 text-right">
                        <a href="{{url('admin/expence/category')}}" class=" card_header_btn"> <i class="fa fa-th"></i> All Expence Cetagory</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 offset-md-2 ">
                        <table class="table table-striped table-bordered custom_table">
                            <tr>
                                <td>Expence Cetagory Name</td>
                                <td class="text-center">:</td>
                                <td>{{$view->expence_cretegory_name}}</td>
                            </tr>
                            <tr>
                                <td>Expence Cetagory Remark</td>
                                <td class="text-center">:</td>
                                <td>{{$view->expence_cretegory_remark}}</td>
                            </tr>  
                            <tr>
                                <td>Creted at</td>
                                <td class="text-center">:</td>
                                <td>{{$view->created_at->format('d-M-Y')}}</td>
                            </tr>
                                <td> Created By</td>
                                <td class="text-center">:</td>
                                <td>{{$view->expence_cretegory_creator}}</td>
                            </tr>
                        </table>
                        
                    </div>
                </div>
            </div>      
        </div>
    </div>



@endsection