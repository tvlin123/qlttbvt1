@extends('admin.layout.master')

@section('content')
     <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left"> Loại Sản Phẩm</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><a href="{{url('admin/')  }}">trang chủ</a></li>
                                    <li class="breadcrumb-item active"> loại sản phẩm </li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                </div>
                <!-- end row -->
               @if(Session::has('notification'))
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                   <strong> {{Session::get('notification')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif
                  <div class="row">
                    <div class="col-md-12">
                      <div class="card ">
                        <div class="card-header border   " style="background-color: yellow">
                          <h4 class="card-title h3 text-center">Hình Thức Xuất</h4>
                        </div>
                        <div class="card-body">
                          <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->

                          </div>
                          <div class="w-100" >
                             <a href="{{ url('admin/danhmucsp/create')}}" class="btn btn-danger btn-sm  m-2 shadow"><i class="fa fa-plus font-weight-bold">  Thêm </i></a>
                            <table class="table table-bordered " cellspacing="0" width="100%" style="width:100%">
                              <thead class="bg-primary text-white ">
                                <tr>
                                  <th class="text-center" style="width:15%">Mã Hình Thức</th>
                                  <th class="text-center" style="width:70%">Tên Hình Thức Nhập</th>

                                  <th class=" text-center" style="width:15%">Chức Năng</th>
                                </tr>
                              </thead>
                              <tfoot>
                                <tr>
                                  <th colspan="4">
                                    <div class="float-right">
                                        Tổng số :{{ count($danhsach) }}
                                    </div>
                                  </th>
                                </tr>
                              </tfoot>
                              <tbody>
                                @foreach($danhsach as $list)
                                    <tr>
                                      <td class="text-center"><p >{{ $list->id}}</p></td>
                                      <td class="text-center">{{ $list->tenhinhthucnhap }}</td>
                                      <td class="text-right">

                                        <a href="{{ url('admin/danhmucsp/edit',$list->id) }}" class="btn btn-link btn-warning btn-just-icon edit"><i class="fa fa-wrench"></i></a>
                                        <button  data-toggle="modal" data-target="#model_delete_{{$list->id}}" class="btn btn-link btn-danger btn-just-icon remove"><i class="fa fa-trash-o"></i></button>
                                      </td>
                                    </tr>
                                    <!-- small modal -->
                                     <div class="modal fade modal-mini modal-primary" id="model_delete_{{$list->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-small">
                                        <div class="modal-content">
                                          <div class="modal-header btn-success">
                                            <h4>Thông báo</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                          </div>
                                          <div class="modal-body">
                                              <p>Bạn có muốn xóa không ?</p>
                                          </div>
                                          <div class="modal-footer justify-content-center">

                                             <a  href="{{ url('admin/danhmucsp/delete',$list->id)}}" class="btn btn-danger">Có</a>
                                              <button type="button" class="btn btn-primary" data-dismiss="modal">Không</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- end small modal -->
                                @endforeach
                              </tbody>
                            </table>
                          </div>

                        </div>
                        <!-- end content-->
                      </div>
                      <!--  end card  -->
                    </div>
                    <!-- end col-md-12 -->
                  </div>
                  <!-- end row -->
            </div>
            <!-- END container-fluid -->
        </div>
        <!-- END content -->
    </div>
    <!-- END content-page -->
@endsection
