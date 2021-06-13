@extends('layouts/admin')
@section('content')
<!-- sales report area start -->
<div class="sales-report-area mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="single-report mb-xs-30">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon"><i class="fa fa-btc"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Last 15 Days Income</h4>
                                        <p>24 H</p>
                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h2>{{$last_15days_all_income}}.00</h2>
                                        <span>- 45.87</span>
                                    </div>
                                </div>
                                <canvas id="coin_sales1" height="100"></canvas>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="single-report mb-xs-30">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon"><i class="fa fa-btc"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Last 15 Days Expence</h4>
                                        <p>24 H</p>
                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h2>{{$last_15days_all_expence}}.00</h2>
                                        <span>- 45.87</span>
                                    </div>
                                </div>
                                <canvas id="coin_sales2" height="100"></canvas>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="single-report">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon"><i class="fa fa-eur"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Total Income</h4>
                                        <p>24 H</p>
                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h2>{{$totalIncome}}.00</h2>
                                        <span>- 45.87</span>
                                    </div>
                                </div>
                                <canvas id="coin_sales3" height="100"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- sales report area end -->

                <!-- Dark table start -->
                <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="row card_body_top clearfix">
                                    
                                    <div class="col-md-7 float-left"><h5><i class="fa fa-gg-circle"></i> Last 15 Days Status</h5></div>
                                    <div class="col-md-5 float-left text-right">
                                        <a href="{{url('admin/income')}}" class="card_header_btn_sm"> <i class="fa fa-plus-circle"></i> Income</a>
                                        <a href="{{url('admin/expence')}}" class="card_header_btn_sm"> <i class="fa fa-plus-circle"></i> Expence</a>
                                        <a href="{{url('admin/summary')}}" class="card_header_btn_sm"> <i class="fa fa-th"></i> Summary</a>
                                    </div>
                                </div>
                                <div class="data-tables datatable-primary">
                                    <table id="dataTable_c" class="table-bordered table-striped">
                                        <thead class="text-capitalize">
                                            <tr class="text-center">
                                                <th>Date</th>
                                                <th>Cetagory</th>
                                                <th>Details</th>
                                                <th>Credit</th>
                                                <th>Debit</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($last_15days_income as $data)
                                            <tr>
                                                <td>{{$data->income_date}}</td>
                                                <td>{{$data->inCateRela->income_cretegory_name}}</td>
                                                <td>{{$data->income_details}}</td>
                                                <td class="text-center">{{$data->income_amount}}</td>
                                                <td class="text-center">---</td>
                                            </tr>
                                            @endforeach
                                            @foreach($last_15days_expence as $data)
                                            <tr>
                                                <td>{{$data->expence_date}}</td>
                                                <td>{{$data->expCateRela->expence_cretegory_name}}</td>
                                                <td>{{$data->expence_details}}</td>
                                                <td class="text-center">---</td>
                                                <td class="text-center">{{$data->expence_amount}}</td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td class="text-right" style="font-weight:bold; font-size:17px;">Total =</td>
                                                <td class="text-center" style="font-weight:bold; font-size:16px;">{{$totalIncome}}</td>
                                                <td class="text-center" style="font-weight:bold; font-size:16px;">{{$totalExpence}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Dark table end -->
               
               
                
@endsection