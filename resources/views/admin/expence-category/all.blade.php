@extends('layouts/admin')
@section('content')
<!-- All User Start -->
                        <div class="col-lg-12 mt-5">
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
                        <div class="card pb-4">
                            <div class="card-body">
                                <div class="card_body_top clearfix">
                                    <div class="col-md-7 float-left"><h4><i class="fa fa-gg-circle"></i> All Expence Category Information</h4></div>
                                    <div class="col-md-5 float-left text-right">
                                        <a href="{{url('admin/expence/category/add')}}" class="card_header_btn"> <i class="fa fa-th"></i> Add Expence category</a>
                                    </div>
                                </div>
                                
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table  table-bordered table-striped table-hover">
                                            <thead class=" bg_detault">
                                                <tr class="text-white">
                                                    <th scope="col">No</th>
                                                    <th scope="col">Expence Cetagory Name</th>
                                                    <th scope="col">Expence Cetagory Remark</th>
                                                    <th scope="col">Expence Cetagory Amount</th>
                                                    <th scope="col">Time</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody>
                                                @php
                                                for ($x = 0; $x <= 0; $x++)     
                                                @endphp
                                             @foreach($allCategory as $data)
                                             @php 
                                            
                                                $expcate_id=$data->expence_cretegory_id;
                                                $this_expcate_id=App\Models\Expence::where('expence_status',1)->where('expence_id',$expcate_id)->count();
                                                $this_expcate_amount=App\Models\Expence::where('expence_status',1)->where('expence_id',$expcate_id)->sum('expence_amount');
                                             @endphp
                                                <tr>
                                                    <td class='align-middle'>{{$x++}}</td>
                                                    <td class='align-middle'>{{$data->expence_cretegory_name}}</td>
                                                    <td class='align-middle'>{{$data->expence_cretegory_remark}}</td>
                                                    <td class='align-middle'>{{$this_expcate_amount}}</td>
                                                    <td class='align-middle'>{{$data->created_at->format('d-M-Y')}}</td>
                                                    <td class="text-info action pt-4 text-center">
                                                        <a href="{{url('admin/expence/category/edit/'.$data->expence_cretegory_id)}}"><i class="ti-pencil p-2"></i></a>
                                                        <a href="{{url('admin/expence/category/view/'.$data->expence_cretegory_id)}}"><i class="ti-plus p-2" ></i></a>
                                                        @if($this_expcate_id == '0')
                                                        <a id="softDelete" data-toggle="modal" data-target="#mySoftDelete" data-id="modal_id" href="javascript:void()"><i class="ti-trash p-2"></i></a>
                                                        @endif
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
                            <form method="post" action="{{url('/admin/expence/category/softdelete')}}">
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