@extends('layouts/admin')
@section('content')
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="card_body_top row ">
                        <div class="col-md-7 float-left"><h4><i class="fa fa-gg-circle"></i> Month Summary</h4></div>
                        <div class="col-md-5 float-left text-right">
                            <a href="{{url('admin/income')}}" class="card_header_btn_sm"> <i class="fa fa-plus-circle"></i> Income</a>
                            <a href="{{url('admin/expence')}}" class="card_header_btn_sm"> <i class="fa fa-plus-circle"></i> Expence</a>
                            <a href="{{url('admin/summary')}}" class="card_header_btn_sm"> <i class="fa fa-th"></i> Summary</a>
                        </div>
                      </div>
                      <div class="row">
                      <div class="col-md-9">
                                <form action="" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="input-group input_box">
                                                    <div class="input-group-addon">
                                                          <i class="fa fa-calendar"></i> From
                                                      </div>
                                                    <input type="text" name="from" class="form-control" id="datepickerForm">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="input-group input_box">
                                                    <div class="input-group-addon ">
                                                          <i class="fa fa-calendar"></i> To
                                                      </div>
                                                    <input type="text" name="to" class="form-control" id="datepickerTo">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="input-group">
                                                <input type="button" class="btn card_header_btn btn-sm " id="search" value="SEARCH">
                                            </div>
                                        </div>
                                      </div>
                                </form>
                            </div>
                            <div class="col-md-3 text-right">
                                <h6>Month : @if($totalIncome > $totalExpence)<span style="color:green;">{{$fullMonth}}</span> @else <span style="color:red;">{{$fullMonth}}</span> @endif</h6>
                            </div>
                            </div>
                    <div class="single-table">
                        <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="dataTable_s">
                            <thead class=" bg-primary">
                                <tr class="text-white text-center bg-primary" style="font-weight:bold; font-size:16px;">
                                    <th scope="col"> Date</th>
                                    <th scope="col"> Cetagory</th>
                                    <th scope="col" class="details"> Details</th>
                                    <th scope="col">Credit</th>
                                    <th scope="col">Debit</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($income as $data)
                                <tr>
                                    <td>{{$data->income_date}}</td>
                                    <td>{{$data->inCateRela->income_cretegory_name}}</td>
                                    <td>{{$data->income_details}}</td>
                                    <td class="text-center">{{$data->income_amount}}</td>
                                    <td class="text-center">---</td>
                                   
                                </tr>
                                @endforeach
                                @foreach($expence as $data)
                                <tr>
                                    <td>{{$data->expence_date}}</td>
                                    <td>{{$data->expCateRela->expence_cretegory_name}}</td>
                                    <td >{{$data->expence_details}}</td>
                                    <td class="text-center">---</td>
                                    <td class="text-center">{{$data->expence_amount}}</td>
                                    
                                   
                                </tr>
                                @endforeach
                                
                            </tbody>
                            
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td class="text-right"><h6 >Total =</h6></td>
                                    <td class="text-center"><h6>{{$totalIncome}}</h6></td>
                                    <td class="text-center"><h6>{{$totalExpence}}</h6></td>
                                </tr>
                                <tr>
                                    <th class="text-center" colspan="5">
                                    <h5>
                                        Total Savings:
                                        @if($totalIncome > $totalExpence) 
                                        <span style="color:green">{{$totalIncome - $totalExpence}}</span>
                                        @else
                                        <span style="color:red">{{$totalIncome - $totalExpence}}</span>
                                        @endif
                                    </h5>
                                        
                                    </th>
                                </tr>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection