@extends('layouts/admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card_body_top clearfix">
                        <div class="col-md-7 float-left"><h4><i class="fa fa-gg-circle"></i> All Expence Information</h4></div>
                        <div class="col-md-5 float-left text-right">
                            <a href="{{url('admin/expence/add')}}" class="card_header_btn"> <i class="fa fa-th"></i> Add Expence</a>
                        </div>
                    </div>
                    <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table  table-bordered table-striped table-hover">
                                            <thead class=" bg-primary">
                                                <tr class="text-white">
                                                    <th scope="col">Expence Details</th>
                                                    <th scope="col">Expence Cetagory</th>
                                                    <th scope="col">Expence Date</th>
                                                    <th scope="col">Amout</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody>
                                             @foreach($recycle as $data)
                                                <tr>
                                                    <td>{{$data->expence_details}}</td>
                                                    <td>{{$data->expCateRela->expence_cretegory_name}}</td>
                                                    <td>{{$data->expence_date}}</td>
                                                    <td>{{$data->expence_amount}}</td>
                                                    <td class="text-info action pt-4">
                                                        <a href="{{url('admin/expence/restore/'.$data->expence_slug)}}"><i class="fa fa-undo "></i></a>
                                                        <a href="{{url('admin/expence/delete/'.$data->expence_id)}}"><i class="fa fa-trash text-danger"></i></a>
                                                        </td>
                                                </tr>
                                                @endforeach
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                </div>
            </div>
        </div>
    </div>
@endsection