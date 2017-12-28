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
                            <th>Create at</th>
                            <th class="action">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categorys as $category)
                        <tr>
                            <td class="select-all"><input type="checkbox" name=""></td>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->created_at }}</td>
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


@section('layer')
<div id="layer">
    <div id="category-add-form">
        <form class="form-horizontal" method="post" action="{{ route('category.add') }}">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="inputName" class="col-sm-3 control-label">Name:</label>
                <div class="col-sm-9">
                    <input id="inputName" type="text" name="name" required class="form-control">
                </div>
            </div>
            <div id="error-msg" class="form-group has-error hidden">
                <div class="col-sm-12">
                    <span class="help-block">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        <strong></strong>
                    </span>
                </div>
            </div>
        </form>
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

        $('.btn-new').click(function() {
            layer.open({
                type: 1, 
                title: ['Add new category'],
                content: $('#category-add-form'),
                area: ['300px', ''],
                resize : false,
                btn: ['Add', 'Cancel'],
                yes: function(index, layero) {
                    var name = $('#inputName').val();

                    //分类名称验证
                    if(name.length == 0 || name.length < 2 || name.length > 32) {
                        $('#error-msg').find('strong').html('分类名称长度为2到32');
                        $('#error-msg').removeClass('hidden');
                        return false;
                    } else {
                        var pattern = new RegExp("[`~!@#$^&*()=|{}':;',\\[\\].<>/?~！@#￥……&*（）——|{}【】‘；：”“'。，、？]");
                        if(pattern.test(name)) {
                            $('#error-msg').find('strong').html('分类名称非法');
                            $('#error-msg').removeClass('hidden');
                            return false;
                        } else {
                            $('#error-msg').find('strong').html('');
                            $('#error-msg').addClass('hidden');
                        }
                    }

                    //提交数据
                    $.ajax({
                        method: 'post',
                        url: "{{ route('category.add') }}",
                        dataType: 'json',
                        cache: false,
                        data: {name:name, _token:'{{ csrf_token() }}'},
                        success: function() {
                            console.log('success');
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr);
                            console.log(status);
                            console.log(error);
                            layer.msg('网络错误,请稍后重试', {icon: 5});
                        }
                    })
                    
                    
                },
                btn2: function(index, layero) {
                    layer.close(index);
                }
            });
        })
    });


</script>
@endsection