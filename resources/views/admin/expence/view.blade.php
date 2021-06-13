@extends('layouts/admin')
@section('content')
    <div class="col-10 offset-md-1 mt-5">
        <div class="card">
            <div class="card-body pb-5">
                <div class="row card_body_top clearfix">
                    <div class="col-md-7 "><h4><i class="fa fa-gg-circle"></i> View User Information</h4></div>
                    <div class="col-md-5 text-right">
                        <a href="{{url('admin/expence')}}" class=" card_header_btn"> <i class="fa fa-th"></i> All Expence</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 offset-md-2 ">
                        <table class="table table-striped table-bordered custom_table">
                            <tr>
                                <td>Income Details</td>
                                <td class="text-center">:</td>
                                <td>{{$view->expence_details}}</td>
                            </tr>
                            <tr>
                                <td>Income Catagory</td>
                                <td class="text-center">:</td>
                                <td>{{$view->expCateRela->expence_cretegory_name}}</td>
                            </tr>
                            <tr>
                                <td>Income Amount</td>
                                <td class="text-center">:</td>
                                <td>{{$view->expence_amount}}</td>
                            </tr>
                            <tr>
                                <td>Creted at</td>
                                <td class="text-center">:</td>
                                <td>{{$view->expence_date}}</td>
                            </tr>
                                <td>Income Creator</td>
                                <td class="text-center">:</td>
                                <td>{{$view->expence_creator}}</td>
                            </tr>
                        </table>
                        
                    </div>
                </div>
            </div>      
        </div>
    </div>



@endsection