@extends('admin.layouts.master')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product
                    <small>Add</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="" method="POST">
                    <div class="form-group">
                        <label>Tên Sản phẩm</label>
                        <input class="form-control" name="txtName" placeholder="Nhập tên sản phẩm" />
                    </div>
                    <div class="form-group">
                        <label>Giá Nhập</label>
                        <input class="form-control" name="txtPrice" placeholder="Giá nhập vào" />
                    </div>
                    <div class="form-group">
                        <label>Giá Bán</label>
                        <input class="form-control" name="txtPrice" placeholder="Giá bán ra" />
                    </div>
                    <div class="form-group">
                        <label>Giá Khuyến mãi</label>
                        <input class="form-control" name="txtPrice" placeholder="Giá khuyến mãi" />
                    </div>

                    <div class="form-group">
                        <label>Ảnh đại diện</label>
                        <div class="body">
                            <input type="file" class="dropify" name="feature-image">
                        </div>
                        <span class="error">

                                    </span>
                    </div>
                    <div class="form-group">
                        <label>Ảnh sản phẩm (4 ảnh)</label>
                        <input type="file" class="form-control" id="product-image" name="photos[]" multiple onchange="preview_images()"/>
                        <span class="error">

                                    </span>
                        <div class="row" id="image_preview"></div>
                    </div>
                    <div class="form-group">
                        <label>Danh mục</label>
                        <select name="category" id="category" class="form-control">
                        </select>

                    </div>
            <div class="form-group">
                <label>Số lượng</label>
                <input type="text" class="form-control" name="stock" value="">
                <span class="error">

                                    </span>
            </div>
                    <div class="form-group">
                        <label>Tag Key</label>
                        <input class="form-control" name="txtOrder" placeholder="Please Enter Category Keywords" />
                    </div>
            <div class="form-group">
                <label>Mô tả sản phẩm ( nhập mô tả sản phẩm và cách sử dụng)</label>
                <textarea class="form-control" rows="3" name="txtContent"></textarea>
            </div>
                    <div class="form-group">
                        <label>Product Description</label>
                        <textarea class="form-control" rows="3"></textarea>
                    </div>

            <div class="form-group">
                <label>Giá Khuyến mãi</label>
                <input class="form-control" name="txtPrice" placeholder="Giá khuyến mãi" />
            </div>
                    <button type="submit" class="btn btn-default">Product Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                    <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
</div>
<script>
    function preview_images()
    {
        var total_file=document.getElementById("product-image").files.length;

        for(var i=0;i<total_file;i++)
        {
            $('#image_preview').append("<div class='col-md-3'><img width='300px' height='300px' class='img-responsive' src='"+URL.createObjectURL(event.target.files[i])+"'></div>");
        }
    }
</script>

@endsection