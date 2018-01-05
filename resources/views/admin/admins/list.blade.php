@extends('admin.layouts.app')

@section('style')
@endsection


@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="content-box">
            <!-- <div class="content-box-header">
                <div class="row no-margin">
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="serach...">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="button">
                                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                </button>
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-8 col-lg-9">
                        <div class="pull-right">
                            <button class="btn btn-success">
                                <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
                                New
                            </button>
                            <button class="btn btn-info">
                                <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>
                                Export
                            </button>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="content-box-body">
                <table id="table" class="table table-bordered table-hover table-responsive">
                    <thead>
                        <tr class="info">
                            <th class="select-all">Select all</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Create at</th>
                            <th class="action">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admins as $admin)
                        <tr>
                            <td class="select-all"><input type="checkbox" name=""></td>
                            <td>{{ $admin->id }}</td>
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->email }}</td>
                            <td>{{ $admin->role->name }}</td>
                            <td>{{ $admin->created_at }}</td>
                            <td class="action">
                                <span class="glyphicon glyphicon-edit table-edit-icon" aria-hidden="treu"></span>
                                <span class="glyphicon glyphicon-trash table-trash-icon" aria-hidden="treu"></span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
            </div>
            <div class="content-box-footer"></div>
        </div>
    </div>
</div>
@endsection


@section('script')
<script type="text/javascript">
    $(function() {
        $('#table').DataTable({
            "dom": '<"table-header"f><"table-body"t><"table-footer"ipl>', //自定义dom的位置
            "bStateSave": true, //状态保存，使用了翻页或者改变了每页显示数据数量，会保存在cookie中，下回访问时会显示上一次关闭页面时的内容
            "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]], //定义每页显示数据数量
            "aoColumns": [
                { "asSorting": [ ] },
                { "asSorting": [ "desc", "asc"] },
                null,
                null,
                null,
                null,
                { "asSorting": [ ] }
            ],   //排序控制
            "iDisplayLength": 50,
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<span aria-hidden="true">«</span>',
                    "sNext": '<span aria-hidden="true">»</span>',
                },
                // "sLengthMenu": "Show _MENU_ ",
            },
            "oClasses": {
                "sLengthSelect": "form-control table-length"
            }
        });
    });


</script>
@endsection