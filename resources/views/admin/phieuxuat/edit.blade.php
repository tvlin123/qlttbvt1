@extends('admin.layout.master')
@section('content')
     <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left">Sửa Phiếu Xuất </h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><a href="{{url('admin/')  }}">trang chủ</a></li>
                                    <li class="breadcrumb-item"><a href="{{url('admin/phieuxuat/index')  }}">phiếu xuất</a></li>
                                    <li class="breadcrumb-item active">Sửa Phiếu Xuất</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                </div>
                <!-- end row -->

                      <div class="card card-product">
                        <div class="card-header {{-- card-header-primary card-header-icon --}} " style="background-color: yellow; font-weight:bold;">
                        {{--   <div class="card-icon">
                            <i class="material-icons">assignment</i>
                          </div> --}}
                            <h3 class="text-center">Thông Tin Nhập </h3>
                        </div>
                        <div class="card-body">

                          <!--start form-->
                             <form action="{{ url('admin/phieuxuat/edit',$phieuxuat->id) }}" method="post" >
                                    {{ csrf_field() }}

                              <!--start notification -->
                               @if(Session::has('notification'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                  <strong> {{Session::get('notification')}}</strong>
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                              @endif
                              <!--end notification -->
                              <!--start error-->
                              @if(count($errors)>0)
                                <div class="alert alert-danger"  id="error">
                                  @foreach($errors->all() as $err)
                                    {{$err}}<br/>
                                  @endforeach
                                </div>
                              @endif
                               <!--end error-->
                                <div class="row">
                                    <div class="col-md-12">

                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Hình Ảnh</th>
                                                        <th>Sản Phẩm</th>
                                                        <th>Số Lượng</th>
                                                        <th>Giá Nhập</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($danhsachsanpham as $list)
                                                        <tr>
                                                            @if($list->soluong!=null)
                                                                 <td><input type="checkbox" name="sanpham[{{$list->id}}]" value="{{$list->id_ctphieuxuat}}" checked="true" ></td>
                                                            @else
                                                                 <td><input type="checkbox" name="sanpham[{{$list->id}}]" value="{{$list->id}}" ></td>
                                                            @endif


                                                            <td><img src="{{ url('public/upload/images/thumbs/Images/sanpham',$list->hinhanh) }}" style="width:50px;height: 50px; " class="rounded mx-auto"></td>
                                                            <td>{{$list->tensanpham  }}</td>
                                                            <td><input type="text" name="soluong[{{$list->id  }}]" value="{{$list->soluong }}"></td>
                                                            <td>{{$list->frk_gianhap}}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                    </div>

                                </div>
                                <div class="row">

                                <div class="col-12">
                                  <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="id_hinhthucxuat">Màu</label>
                                            <select class="form-control custom-select" id="id_hinhthucxuat" name="id_hinhthucxuat">
                                              <option value="">-- Chọn hình thức xuất--</option>
                                               @foreach($danhsachhinhthucxuat as $list)
                                                   <option {{($phieuxuat->id_hinhthucxuat ==$list->id)?'selected':''}}  value="{{$list->id  }}">{{ $list->tenhinhthucxuat }}</option>
                                                @endforeach
                                            </select>
                                       </div>
                                       <div class="form-group">
                                            <label for="id_nguoixuat ">Chọn người xuất</label>
                                            <select class="form-control custom-select" id="id_nguoixuat" name="id_nguoixuat">
                                              <option value="">-- Chọn màu--</option>
                                               @foreach($danhsachnguoidung as $list)
                                                  <option {{($phieuxuat->id_nguoixuat ==$list->id)?'selected':''}}  value="{{$list->id  }}">{{ $list->name }}</option>
                                                @endforeach
                                            </select>
                                       </div>
                                      <div class="form-group">
                                          <label for="lydoxuat" class="bmd-label-floating">Lý do xuất(*)</label>
                                          <input type="text" class="form-control " id="lydoxuat" name="lydoxuat" required="true" value="{{ $phieuxuat->lydoxuat }}">
                                       </div>
                                       <div class="form-group">
                                          <label for="ngayxuat" class="bmd-label-floating">Ngày xuất(*)</label>
                                          <input type="text" class="form-control " id="ngayxuat" name="ngayxuat" required="true" value="{{ $phieuxuat->ngayxuat }}">
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label for="xuatcho" class="bmd-label-floating">Xuất cho(*)</label>
                                          <input type="text" class="form-control " id="xuatcho" name="xuatcho" required="true" value="{{ $phieuxuat->xuatcho }}">
                                       </div>
                                       <div class="form-group">
                                          <label for="sdt " class="bmd-label-floating">Số điện thoại(*)</label>
                                          <input type="text" class="form-control " id="sdt" name="sdt" required="true" value="{{$phieuxuat->sdt  }}">
                                       </div>

                                        <div class="form-group">
                                          <label for="diachi" class="bmd-label-floating">Địa chỉ(*)</label>
                                          <textarea name="diachi" class=" form-control">{{$phieuxuat->diachi}}</textarea>
                                       </div>

                                    </div>

                                  </div>
                                  <div class="row">
                                      <div class="col-md-2"></div>
                                       <div class="col-md-4"><button type="submit" class="btn btn-primary btn-block mb-3"><i class="fa fa-2x fa-floppy-o "> Lưu </i></button></div>
                                      <div class="col-md-4"><a href="{{ url('admin/phieuxuat/index') }}" class="btn btn-primary btn-block"><i class="fa fa-2x fa-arrow-left "> Trở Lại</i></a></div>
                                      <div class="col-md-2"></div>
                                   </div>
                                </div>
                              </div>
                          </form>
                          <!--end form-->
                        </div>
                      <!-- end content-->
                      </div>
                      <!--  end card  -->
                      </div>

                  <!-- end row -->
            </div>
            <!-- END container-fluid -->
        </div>
        <!-- END content -->
    </div>
    <!-- END content-page -->
@endsection
<!--end section(content)-->

