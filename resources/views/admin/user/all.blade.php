@extends('layouts/admin')
@section('content')
<!-- All User Start -->
                        <div class="col-lg-12 mt-5">
                            @if(Session::has('success'))
                            <script>
                                swal({title: "Sucessfully",text: "Upload User Information",icon: "success",});
                            </script>
                            @endif
                            @if(Session::has('error'))
                            <script>
                                swal({title: "Opps!!",text: "Upload Failed",icon: "error",});
                            </script>
                            @endif
                            @if(Session::has('soft_success'))
                            <script>
                                swal({title: "Sucessfully",text: "Delete User Information",icon: "success",});
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
                                    <div class="col-md-7 float-left"><h4><i class="fa fa-gg-circle"></i> All User Information</h4></div>
                                    <div class="col-md-5 float-left text-right print_none">
                                        <a href="{{url('admin/user/add')}}" class="card_header_btn"> <i class="fa fa-th"></i> Add User</a>
                                    </div>
                                </div>
                                
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table  table-bordered table-striped table-hover">
                                            <thead class="text-uppercase bg-primary">
                                                <tr class="text-white">
                                                    <th scope="col">Photo</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">User Role</th>
                                                    <th scope="col" class="print_none">action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($alluser as $data)
                                                <tr>
                                                    <td>
                                                    @if($data->user_image != "")
                                                    <img src="{{asset('uploads/'.$data->user_image)}}" alt=""  class="img-thumbnail rounded-circle table_image" >
                                                    @else
                                                    <img src="{{asset('contents/admin/assets/images/author/avatar.png')}}" alt="" class="img-thumbnail rounded-circle table_image" > 
                                                    @endif
                                                    </td>
                                                    <td class="align-middle">{{$data->name}}</td>
                                                    <td class="align-middle">{{$data->email}}</td>
                                                    <td class="align-middle">{{$data->user_role}}</td>
                                                    <td class="text-info action print_none align-middle">
                                                        <a href="{{url('admin/user/edit/'.$data->user_slug)}}"><i class="ti-pencil p-2"></i></a>
                                                        <a href="{{url('admin/user/view/'.$data->user_slug)}}"><i class="ti-plus p-2" ></i></a>
                                                        <a href="{{url('admin/user/softdelete/'.$data->user_slug)}}"><i class="ti-trash p-2"></i></a>
                                                        </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card_body_fotter mt-4 print_none">
                                <a href="{{url('admin/user/pdf')}}" class="btn btn-danger py-2 px-4">Pdf</a>
                                <a href="{{url('admin/user/excel')}}" class="btn btn-success py-2 mx-2 px-4">Excel</a>
                                <a href="#" class="btn btn-info py-2 px-4" onclick="window.print()">Print</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- All User End -->
@endsection