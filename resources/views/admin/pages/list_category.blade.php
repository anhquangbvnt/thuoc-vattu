@extends('admin.layouts.master')
@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Quản lý Danh Mục

                    </h1>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Thêm chuyên mục</h2>
                        </div>
                        <div class="body">
                            <form id="basic-form" method="post" novalidate="" action="">

                                <div class="form-group">
                                    <label>Tên chuyên mục</label>
                                    <input type="text" class="form-control" required="true" name="cat-name">
                                </div>
                                <div class="form-group">
                                    <label>Loại Danh mục</label>
                                    <label class="radio-inline">
                                        <input name="rdoStatus" value="1" checked="" type="radio">Thuốc
                                    </label>
                                    <label class="radio-inline">
                                        <input name="rdoStatus" value="2" type="radio">Vật tư y tế
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-warning"><i class="fa fa-plus-square"></i><span>   Thêm chuyên mục</span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>Danh sách chuyên mục Thuốc</h2>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-hover m-b-0">
                            <tbody>
                            <thead>
                            <td>Stt.</td>
                            <td>Tên chuyên mục</td>
                            <td>Hành động</td>
                            </thead>

                            <tr>
                                <td> id</td>
                                <td>name</td>
                                <td>
                                    <a href="">
                                        <button type="button" class="btn btn-info" title="Edit"><i class="fa fa-edit"></i></button>
                                    </a>
                                    <a href="">
                                        <button type="button" data-type="confirm" class="btn btn-danger js-sweetalert" title="Delete"><i class="fa fa-trash-o"></i></button>
                                    </a>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>Danh sách chuyên mục Vật tư y tế</h2>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-hover m-b-0">
                            <tbody>
                            <thead>
                            <td>Stt.</td>
                            <td>Tên chuyên mục</td>
                            <td>Hành động</td>
                            </thead>

                            <tr>
                                <td> id</td>
                                <td>name</td>
                                <td>
                                    <a href="">
                                        <button type="button" class="btn btn-info" title="Edit"><i class="fa fa-edit"></i></button>
                                    </a>
                                    <a href="">
                                        <button type="button" data-type="confirm" class="btn btn-danger js-sweetalert" title="Delete"><i class="fa fa-trash-o"></i></button>
                                    </a>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
