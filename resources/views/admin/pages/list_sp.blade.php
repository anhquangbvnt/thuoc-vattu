@extends('admin.layouts.master')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product
                    <small>List</small>
                </h1>
            </div>

            <!-- /.col-lg-12 -->
        </div>
        <div class="body">
            <div class="table-responsive">
                <table class="table table-hover m-b-0 c_list">
                    <thead>
                    <tr>
                        <th width="5%">No.</th>
                        <th width="20%">Tên sản phẩm</th>
                        <th width="30%">Ảnh đại diện</th>
                        <th width="30%">Mô tả</th>
                        <th width="15%">Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>
                                {{$product->id}}
                            </td>
                            <td>
                                {{$product->name}}
                            </td>
                            <td>
                                <img width="250px" src="/upload/product/{{$product->image}}" alt="">
                            </td>
                            <td>
                                @php echo substr($product->description, 0, 100); @endphp
                            </td>
                            <td>
                                <a href="{{route('admin.update_sp_get', ['id' => $product->id])}}">
                                    <button type="button" class="btn btn-info" title="Edit"><i class="fa fa-edit">Sửa</i></button>
                                </a>
                                <a href="{{route('admin.delete_sp', ['id' => $product->id])}}">
                                    <button type="button" data-type="confirm" class="btn btn-danger js-sweetalert" title="Delete"><i class="fa fa-trash-o"> Xóa</i></button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
</div>
@endsection