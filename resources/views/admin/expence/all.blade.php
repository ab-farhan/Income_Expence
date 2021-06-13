@extends('layouts/admin')
@section('content')
<!-- All User Start -->
                        <div class="col-lg-12 mt-5">
                            @if(Session::has('recycle_success'))
                            <script>
                                swal({title: "Sucessfully",text: "Restore Expence",icon: "success",});
                            </script>
                            @endif
                            @if(Session::has('success'))
                            <script>
                                swal({title: "Sucessfully",text: "Upload Income Information",icon: "success",});
                            </script>
                            @endif
                            @if(Session::has('soft_success'))
                            <script>
                                swal({title: "Sucessfully",text: "Delete Income Information",icon: "success",});
                            </script>
                            @endif
                            @if(Session::has('soft_error'))
                            <script>
                                swal({title: "Opps!!",text: "Delete Failed",icon: "error",});
                            </script>
                            @endif
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
                                             @foreach($allexp as $data)
                                                <tr>
                                                    <td>{{$data->expence_details}}</td>
                                                    <td>{{$data->expCateRela->expence_cretegory_name}}</td>
                                                    <td>{{$data->expence_date}}</td>
                                                    <td>{{$data->expence_amount}}</td>
                                                    <td class="text-info action pt-4">
                                                        <a href="{{url('admin/expence/edit/'.$data->expence_slug)}}"><i class="ti-pencil p-2"></i></a>
                                                        <a href="{{url('admin/expence/view/'.$data->expence_slug)}}"><i class="ti-plus p-2" ></i></a>
                                                        <a id="softDelete" data-toggle="modal" data-target="#mySoftDelete" data-id="{{$data->expence_id}}" href="javascript:void()"><i class="ti-trash p-2"></i></a>
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
                    <!-- All User End -->

                    <!-- Modal -->
                    <div class="modal fade" id="mySoftDelete" tabindex="-1" role="dialog" aria-labelledby="mySoftDeleteLabel">
                        <div class="modal-dialog" role="document">
                            <form method="post" action="{{url('/admin/expence/softdelete')}}">
                                @csrf
                                <div class="modal-content primary">
                                    <div class="modal-header">
                                    <h4 class="modal-title modal_popup" id="myModalLabel">Confirm Message</h4>
                                    </div>
                                    <div class="modal-body">
                                    Are you sure you want to delete?
                                    <input type="text" id="modal_id" name="modal_id">
                                    </div>
                                    <div class="modal-footer">
                                    <button type="submit" class="btn btn-success btnm btn-fill btn-sm">Confirm</button>
                                    <button type="button" class="btn btn-danger btnm btn-fill btn-sm" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

@endsection