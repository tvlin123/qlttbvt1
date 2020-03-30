@extends('admin.layout.master')

@section('content')
     <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left">Thêm Hình Thức Nhâp</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><a href="{{url('admin/')  }}">trang chủ</a></li>
                                    <li class="breadcrumb-item"><a href="{{url('admin/danhmucsp/index')  }}">hình thức nhập</a></li>
                                    <li class="breadcrumb-item active">Thêm hình thức nhập</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                </div>
                <!-- end row -->
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                      <div class="card card-product">
                        <div class="card-header {{-- card-header-primary card-header-icon --}} " style="background-color: yellow; font-weight:bold;">
                        {{--   <div class="card-icon">
                            <i class="material-icons">assignment</i>
                          </div> --}}
                            <h3 class="text-center">Thông Tin Nhập</h3>
                        </div>
                        <div class="card-body">

                          <!--start form-->
                          <form action="{{ url('admin/danhmucsp/create') }}" method="post" >
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

                                <div class="col-12">
                                  <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                       <div class="form-group">
                                          <label for="name" class="bmd-label-floating">Tên Hình Thức Nhập(*)</label>
                                          <input type="tendanhmuc " class="form-control " id="tendanhmuc " name="tendanhmuc " required="true">
                                      </div>
                                      >
                                    </div>
                                    <div class="col-md-2"></div>

                                  </div>
                                  <div class="row">
                                      <div class="col-md-2"></div>
                                       <div class="col-md-4"><button type="submit" class="btn btn-primary btn-block mb-3"><i class="fa fa-2x fa-floppy-o "> Lưu </i></button></div>
                                      <div class="col-md-4"><a href="{{ url('admin/danhmucsp/index') }}" class="btn btn-primary btn-block"><i class="fa fa-2x fa-arrow-left "> Trở Lại</i></a></div>
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
                      <div class="col-md-2"></div>

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
<!--end section(content)-->
