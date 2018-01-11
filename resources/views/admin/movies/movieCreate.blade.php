@extends('admin.layouts.app')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('ttdyy-admin/bootstrap-select/css/bootstrap-select.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ttdyy-admin/css/ttdyy.create.css') }}">
@endsection


@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="content-box">
            <div class="content-box-header">
                <div class="box-header-title">Create</div>
                <div class="pull-right">
                    <button class="btn btn-default btn-sm btn-back">
                        <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
                        Back
                    </button>
                    <a class="btn btn-default btn-sm" href="{{ route('movie.list') }}">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                        List
                    </a>
                </div>
            </div>
            <div class="content-box-body">
                <div class="panel panel-create">
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('movie.store') }}">
                            <!-- Name -->
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                <label class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-film"></i>
                                        </span>
                                        <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="">
                                    </div>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <!-- Alias -->
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Alias</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-italic"></i>
                                        </span>
                                        <input class="form-control" type="text" name="name" value="{{ old('alias') }}">
                                    </div>
                                </div>
                            </div>

                            <!-- Country -->
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Country</label>
                                <div class="col-sm-8">
                                    <select id="country-select" class="selectpicker show-tick form-control" name="country" data-live-search="true">
                                        <option></option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Category -->
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Category</label>
                                <div class="col-sm-8">
                                    <select id="category-select" class="selectpicker show-tick form-control" name="category" multiple multiple data-live-search="true">
                                        <option></option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Images -->
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Images</label>
                                <div class="col-sm-8">
                                    <button type="button" class="btn btn-primary images-browse">
                                        <i class="glyphicon glyphicon-folder-open"></i>
                                        <span>Browse</span>
                                    </button>
                                    <div class="images-preview">
                                        <ul id="sortable"></ul>
                                        <button type="button" class="btn btn-default con-to-add">继续添加</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form id="images-upload" class="hidden" enctype="multipart/form-data" method="post">
                            {{ csrf_field() }}
                            <input id="images-input" name="images[]" class="hidden" type="file" multiple accept="image/*">
                        </form>
                    </div>
                </div>
            </div>
            <div class="content-box-footer"></div>
        </div>
    </div>
</div>
@endsection


@section('script')
<script type="text/javascript" src="{{ asset('ttdyy-admin/bootstrap-select/js/bootstrap-select.js') }}"></script>

<script type="text/javascript">
    $(function() {
        /**
         * 分类选择
         */
        $('#country-select').selectpicker({
            'size' : 8
        });


        /**
         * 分类选择
         */
        $('#category-select').selectpicker({
            'maxOptions' : 3,
            'size' : 8
        });


        /**
         * 添加图片按钮
         */
        $('.images-browse').click(function() {
            $('#images-input').click();
        });

        /**
         * 继续添加图片
         */
        $('.con-to-add').click(function() {
            $('#images-input').click();
        });

        /**
         * 图片选择输入框改变事件
         */
        $('#images-input').change(function() {
            // 获取文件对象
            var files = $('#images-input')[0].files;

            if(files.length > 0) {
                var invalid = false;
                $.each(files, function(i, file) {
                    if(file.type.indexOf('image/') != 0) {
                        invalid = true;
                        return false;
                    }
                });

                if(invalid) {
                    $('#images-input').val('');
                    layer.msg('只能上传图片文件', {icon: 5});
                    return false;
                }

                // 创建formData对象，用于提交文件信息
                var formData = new FormData($('#images-upload')[0]);
        
                $.ajax({
                    method: 'POST',
                    url: "{{ route('upload.images') }}",
                    dataType: 'json',
                    cache: false,
                    data: formData,
                    contentType: false,  
                    processData: false, 
                    success: function(data) {
                        console.log(data);
                        if(data.status) {
                            var host = "{{ config('app.url') }}";
                            var template = '';
                            $.each(data.files, function(i, file) {
                                var src = host + '/storage/' + file;
                                template += '<li><div class="show-remove"><span class="glyphicon glyphicon-trash remove-image"></span></div><img src="' + src + '"></li>';
                            })

                            $('#sortable').append(template);
                            $('.images-browse').hide();
                            $('.images-preview').show();

                            initImageOperate();
                        } else {
                            layer.msg(data.msg, {icon: 5});
                        }

                        $('#images-input').val('');
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr);
                        console.log(status);
                        console.log(error);
                        $('#images-input').val('');
                        layer.msg('服务器网络错误！', {icon: 5});
                    }
                });
            }
        });

        $( "#sortable" ).sortable({
            placeholder: "ui-state-highlight",
            update: function(event, ui) {
                console.log(111)
            }
        });
        $( "#sortable" ).disableSelection();


       initImageOperate();


    });

    function initImageOperate() {
        $('#sortable li').mouseover(function() {
            $(this).find('.show-remove').show();
        });
        $('#sortable li').mouseout(function() {
            $(this).find('.show-remove').hide();
        });
        $('.remove-image').click(function() {
            $(this).closest('li').remove();
        });
    }
</script>
@endsection