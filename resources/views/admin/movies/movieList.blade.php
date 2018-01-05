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
                    <tbody>
                        @foreach ($movies as $movie)
                            <tr>
                                <td class="select-all"><input type="checkbox" name=""></td>
                                <td>{{ $movie->id }}</td>
                                <td>{{ $movie->name }}</td>
                                <td>{{ $movie->director }}</td>
                                <td>{{ $movie->players }}</td>
                                <td>{{ $movie->country }}</td>
                                <td>{{ $movie->lang }}</td>
                                <td>{{ $movie->score }}</td>
                                <td>{{ $movie->release_time }}</td>
                                <td>{{ $movie->duration }}</td>
                                <td>{{ $movie->visible }}</td>
                                <td>{{ $movie->created_at }}</td>
                                <td class="action">
                                    <span class="glyphicon glyphicon-edit table-edit-icon" aria-hidden="treu"></span>
                                    <span class="glyphicon glyphicon-trash table-trash-icon" aria-hidden="treu"></span>
                                </td>
                        </tr>
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

        setNewBtnALink();

    });


    /**
     * 设置新增按钮的链接
     */
    function setNewBtnALink()
    {
        var btn_new = $('.table-header .btn-new');
        var a_link = '<a href="/admin/movie/movie/create"></a>';
        btn_new.wrap(a_link);
    }
</script>
@endsection