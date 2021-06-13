@extends('layouts/admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card_body_top clearfix">
                        <div class="col-md-7 float-left"><h4><i class="fa fa-gg-circle"></i> All Income Information</h4></div>
                        
                    </div>
                    <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table  table-bordered table-striped table-hover">
                                            <thead class=" bg-primary">
                                                <tr class="text-white">
                                                    <th scope="col">No</th>
                                                    <th scope="col">Expence Details</th>
                                                    <th scope="col">Expence Cetagory</th>
                                                    <th scope="col">Expence Date</th>
                                                    <th scope="col">Amout</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody>
                                            @php
                                                for($x=0;$x<=0;$x++)
                                            @endphp
                                             @foreach($recycle as $data)
                                                <tr>
                                                    <td>{{$x++}}</td>
                                                    <td>{{$data->income_details}}</td>
                                                    <td>{{$data->inCateRela->income_cretegory_name}}</td>
                                                    <td>{{$data->income_date}}</td>
                                                    <td>{{$data->income_amount}}</td>
                                                    <td class="text-info action pt-4">
                                                        <a href="{{url('admin/income/restore/'.$data->income_slug)}}"><i class="fa fa-undo "></i></a>
                                                        <a href="{{url('admin/income/delete/'.$data->income_id)}}"><i class="fa fa-trash text-danger"></i></a>
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