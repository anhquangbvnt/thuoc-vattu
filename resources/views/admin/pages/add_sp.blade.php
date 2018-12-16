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
                <form action="{{route('admin.add_sp_post')}}" method="POST"  >
                    @csrf
                    <div class="form-group">
                        <label>Tên Sản phẩm</label>
                        <input class="form-control" name="name" required="true" value="{{old('name')}}" placeholder="Nhập tên sản phẩm" />
                        <span class="error">
                                        @if ($errors->get('name'))
                                @foreach($errors->get('name') as $error)
                                    <div class="ui pointing red basic label">
                                                  {{ $error }}
                                                </div>
                                @endforeach
                            @endif
                                    </span>
                    </div>
                    <div class="form-group">
                        <label>Giá Nhập</label>
                        <input class="form-control" name="price_in" value="{{old('price_in')}}" placeholder="Giá nhập vào" />
                        <span class="error">
                                        @if ($errors->get('price_in'))
                                @foreach($errors->get('price_in') as $error)
                                    <div class="ui pointing red basic label">
                                                  {{ $error }}
                                                </div>
                                @endforeach
                            @endif
                                    </span>
                    </div>
                    <div class="form-group">
                        <label>Giá Bán</label>
                        <input class="form-control" name="price_out" value="{{old('price_out')}}" placeholder="Giá bán ra" />
                        <span class="error">
                                        @if ($errors->get('price_out'))
                                @foreach($errors->get('price_out') as $error)
                                    <div class="ui pointing red basic label">
                                                  {{ $error }}
                                                </div>
                                @endforeach
                            @endif
                                    </span>
                    </div>
                    <div class="form-group">
                        <label>Giá Khuyến mãi</label>
                        <input class="form-control" name="price_sell" value="{{old('price_sell')}}" placeholder="Giá khuyến mãi" />
                        <span class="error">
                                        @if ($errors->get('price_sell'))
                                @foreach($errors->get('price_sell') as $error)
                                    <div class="ui pointing red basic label">
                                                  {{ $error }}
                                                </div>
                                @endforeach
                            @endif
                                    </span>
                    </div>
                    <div class="form-group">
                        <label>Hãng sản xuất</label>
                        <input class="form-control" name="brand-name" value="{{old('brand-name')}}" placeholder="Hãng sản xuất - nhập khẩu" />
                    </div>

                    <div class="form-group">
                        <label>Ảnh đại diện</label>
                        <div class="body">
                            <input type="file" class="dropify" name="feature-image" onchange="preview_images()">
                        </div>
                        <span class="error">
                                        @if ($errors->get('feature-image'))
                                @foreach($errors->get('feature-image') as $error)
                                    <div class="ui pointing red basic label">
                                                  {{ $error }}
                                                </div>
                                @endforeach
                            @endif
                                    </span>
                    </div>
                    <div class="form-group">
                        <label>Ảnh sản phẩm (4 ảnh)</label>
                        <input type="file" class="form-control" id="product-image" name="photos[]" multiple onchange="preview_images()"/>
                        <span class="error">
                                        @if ($errors->get('photos'))
                                @foreach($errors->get('photos') as $error)
                                    <div class="ui pointing red basic label">
                                                  {{ $error }}
                                                </div>
                                @endforeach
                            @endif
                                    </span>
                        <div class="row" id="image_preview"></div>
                    </div>
                    <div class="form-group">
                        <label>Danh mục</label>
                        <select name="category" id="category" class="form-control">
                            <option value=""></option>
                            @foreach($cats as $cat)
                                @if ($cat->id == old('category'))
                                    <option selected="selected" value="{{$cat->id}}">{{$cat->name}}</option>
                                @else
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endif
                            @endforeach

                        </select>
                        <span class="error">
                                        @if ($errors->get('category'))
                                @foreach($errors->get('category') as $error)
                                    <div class="ui pointing red basic label">
                                                  {{ $error }}
                                                </div>
                                @endforeach
                            @endif
                        </span>

                    </div>
            <div class="form-group">
                <label>Số lượng</label>
                <input type="text" class="form-control" name="stock" value="">
                <span class="error">
                                        @if ($errors->get('stock'))
                        @foreach($errors->get('stock') as $error)
                            <div class="ui pointing red basic label">
                                                  {{ $error }}
                                                </div>
                        @endforeach
                    @endif
                </span>
            </div>
                    <div class="form-group">
                        <label>Hạn sử dụng</label>
                        <input class="form-control" name="exp_date" type="date" />
                    </div>
            <div class="form-group">
                <label>Mô tả sản phẩm ( nhập mô tả sản phẩm và cách sử dụng)</label>
                <textarea class="form-control" rows="3" name="description"></textarea>
                <span class="error">
                    @if ($errors->get('brand-name'))
                        @foreach($errors->get('brand-name') as $error)
                            <div class="ui pointing red basic label">
                                                  {{ $error }}
                                                </div>
                        @endforeach
                    @endif
                </span>
            </div>



                    <button type="submit" class="btn btn-default">Thêm Sản Phẩm</button>
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