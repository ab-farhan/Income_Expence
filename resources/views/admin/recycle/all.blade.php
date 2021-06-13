@extends('layouts/admin')
@section('content')
               <div class="row mt-5">
                   <div class="col-md-12">
                       <div class="card">
                           <div class="card-body">
                           <div class="row ">
                            <div class="col-md-4 my-3">
                                <div class="card">
                                    <div class="seo-fact sbg1">
                                        <div class="pt-4 px-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-user"></i> </div>
                                            <div class=""><h5 class="text-right text-white">Users</h5></div>
                                            
                                        </div>
                                        <div class="" style="border-bottom:1px solid #fff"><h2 class="text-right px-3 pb-3">0{{$user}}</h2></div>
                                        <div class="p-3 text-right"><a href="{{url('admin/user')}}" style="color:#fff; font-size:16px;"> <i class="fa fa-mail-forward pr-3"></i> Manage User</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 my-3">
                                <div class="card">
                                    <div class="seo-fact sbg3">
                                        <div class="pt-4 px-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-wallet"></i> </div>
                                            <div class=""><h5 class="text-right text-white">Income Category</h5></div>
                                            
                                        </div>
                                        <div class="" style="border-bottom:1px solid #fff"><h2 class="text-right px-3 pb-3">0{{$incomeCategory}}</h2></div>
                                        <div class="p-3 text-right"><a href="{{url('admin/income/category')}}" style="color:#fff; font-size:16px;"> <i class="fa fa-mail-forward pr-3"></i> Manage Income</a></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 my-3">
                                <div class="card">
                                    <div class="seo-fact sbg2">
                                        <div class="pt-4 px-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="fa fa-cubes"></i> </div>
                                            <div class=""><h5 class="text-right text-white">Expence Category</h5></div>
                                            
                                        </div>
                                        <div class="" style="border-bottom:1px solid #fff"><h2 class="text-right px-3 pb-3">0{{$expenceCategory}}</h2></div>
                                        <div class="p-3 text-right"><a href="{{url('admin/expence/category')}}" style="color:#fff; font-size:16px;"> <i class="fa fa-mail-forward pr-3"></i> Manage Expence</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mt-2 mb-3">
                                    <div class="card">
                                        <div class="seo-fact sbg1">
                                            <div class="pt-4 px-4 d-flex justify-content-between align-items-center">
                                                <div class="seofct-icon"><i class="ti-user"></i> </div>
                                                <div class=""><h5 class="text-right text-white">Income</h5></div>
                                                
                                            </div>
                                            <div class="" style="border-bottom:1px solid #fff"><h2 class="text-right px-3 pb-3">0{{$income}}</h2></div>
                                            <div class="p-3 text-right"><a href="{{url('admin/income/recycle')}}" style="color:#fff; font-size:16px;"> <i class="fa fa-mail-forward pr-3"></i> Manage User</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-2 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg2">
                                        <div class="pt-4 px-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-user"></i> </div>
                                            <div class=""><h5 class="text-right text-white">Expence</h5></div>
                                            
                                        </div>
                                        <div class="" style="border-bottom:1px solid #fff"><h2 class="text-right px-3 pb-3">0{{$expence}}</h2></div>
                                        <div class="p-3 text-right"><a href="{{url('admin/expence/recycle')}}" style="color:#fff; font-size:16px;"> <i class="fa fa-mail-forward pr-3"></i> Manage User</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                           </div>
                       </div>
                   </div>
               </div>
               
               
                
@endsection