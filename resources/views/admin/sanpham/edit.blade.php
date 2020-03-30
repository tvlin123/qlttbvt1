@extends('admin.layout.master')
@section('jsfooter')
<script src="{{ url('public/admin/assets/js/ckfinder/ckfinder.js') }}"></script>
<script src="{{ url('public/admin/assets/js/ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">
    function BrowseServer()
    {
        var finder = new CKFinder();
        finder.basePath ='/';
        finder.selectActionFunction = function(fileUrl) {
            document.getElementById('hinhanh').value = fileUrl.substring(fileUrl.lastIndexOf('/') + 1);
        };
        finder.popup();
    }
</script>
@endsection
@section('content')
     <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left">Sửa Sản Phẩm</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><a href="{{url('admin/')  }}">trang chủ</a></li>
                                    <li class="breadcrumb-item"><a href="{{url('admin/sanpham/index')  }}">sản phẩm</a></li>
                                    <li class="breadcrumb-item active">Sửa Sản Phẩm</li>
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
                            <h3 class="text-center">Thông Tin Nhập</h3>
                        </div>
                        <div class="card-body">

                          <!--start form-->
                          <form action="{{ url('admin/sanpham/edit',$sanpham->id) }}" method="post" >
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

                                <div class="col-md-6">
                                       <div class="form-group">
                                            <label for="id_danhmuc">Danh Mục</label>
                                            <select class="form-control custom-select" id="id_danhmuc" name="id_danhmuc">
                                               <option value="">-- Chọn danh mục--</option>
                                               @foreach($danhsachdanhmuc as $list)

                                                  <option {{($sanpham->id_danhmuc ==$list->id)?'selected':''}}  value="{{$list->id  }}">{{ $list->tendanhmuc }}</option>
                                                @endforeach
                                            </select>
                                       </div>
                                      <div class="form-group">
                                          <label for="tensanpham" class="bmd-label-floating">Tên Sản Phẩm(*)</label>
                                          <input type="text" class="form-control " id="tensanpham" name="tensanpham" required="true" value="{{ $sanpham->tensanpham }}">
                                       </div>
                                       <div class="form-group">
                                          <label for="thongso" class="bmd-label-floating">Thông số(*)</label>
                                          <input type="text" class="form-control " id="thongso" name="thongso" required="true"  value="{{ $sanpham->thongso }}">
                                       </div>


                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="soluong" class="bmd-label-floating">Số lượng(*)</label>
                                          <input type="text" class="form-control " id="soluong" name="soluong" required="true" value="{{ $sanpham->soluong }}">
                                       </div>
                                        <div class="row">
                                            <div class="col-6">
                                                 <div class="form-group">
                                                  <label for="frk_gianhap" class="bmd-label-floating">Giá Nhập(*)</label>
                                                  <input type="text" class="form-control " id="frk_gianhap" name="frk_gianhap" required="true" value="{{ $sanpham->frk_gianhap }}" >
                                               </div>
                                            </div>
                                           <div class="col-6">
                                                <div class="form-group">
                                                  <label for="text " class="bmd-label-floating">Giá Xuất(*)</label>
                                                  <input type="frk_giaxuat " class="form-control " id="frk_giaxuat" name="frk_giaxuat" required="true" value="{{ $sanpham->frk_giaxuat }}">
                                               </div>
                                           </div>
                                        </div>


                                        <div class="form-group">

                                             <label for="hinhanh" class="bmd-label-floating">Hình Ảnh</label>
                                              <div class="input-group ">
                                                <input type="text" class="form-control" id="hinhanh"  name="hinhanh" required autocomplete="hinhanh" autofocus value="{{ $sanpham->hinhanh }}">
                                                <div class="input-group-prepend">
                                                  <div class="input-group-text btn-sm"><a href="#" onclick="BrowseServer()">Chọn Ảnh</a></div>
                                                </div>
                                              </div>

                                        </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                              <label for="mota" class="bmd-label-floating">Mô tả</label>
                                              <textarea name="mota" class="ckeditor form-control">{{ $sanpham->mota }}"</textarea>
                                           </div>
                                        </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-2"></div>
                                       <div class="col-md-4"><button type="submit" class="btn btn-primary btn-block mb-3"><i class="fa fa-2x fa-floppy-o "> Lưu </i></button></div>
                                      <div class="col-md-4"><a href="{{ url('admin/sanpham/index') }}" class="btn btn-primary btn-block"><i class="fa fa-2x fa-arrow-left "> Trở Lại</i></a></div>
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


                    <!-- end col-md-12 -->

            <!-- END container-fluid -->
        </div>
        <!-- END content -->
    </div>
    <!-- END content-page -->
@endsection
<!--end section(content)-->
