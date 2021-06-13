@extends('layouts/admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row card_body_top">
                    <div class="col-md-6  ">
                        <h5>Searching: <span class="fromdate">{{$form}}</span> <span class="tospan"> to </span> <span class="todate">{{$to}}</h5>
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
                                
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection