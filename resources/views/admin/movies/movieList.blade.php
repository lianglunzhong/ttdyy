@extends('admin.layouts.app')

@section('style')
@endsection


@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="content-box">
            <div class="content-box-body">
                <table id="table" class="table table-bordered table-hover table-responsive">
                    <thead>
                        <tr class="info">
                            <th class="select-all">Select all</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Alias</th>
                            <th>Director</th>
                            <th>Players</th>
                            <th>Country</th>
                            <th>Lang</th>
                            <th>Score</th>
                            <th>Release time</th>
                            <th>Duration</th>
                            <th>Visible</th>
                            <th>Create at</th>
                            <th class="action">Action</th>
                        </tr>
                    </thead>
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
                null,
                null,
                null,
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