@extends('admin.layouts.app')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('ttdyy-admin/bootstrap-select/css/bootstrap-select.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ttdyy-admin/css/ttdyy.create.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ttdyy-admin/jQueryTzUpload/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ttdyy-admin/jQueryTzUpload/css/demo.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ttdyy-admin/jQueryTzUpload/webuploader-0.1.5/webuploader.css') }}">
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
                                    <div id="uploader" class="wu-example">
                                        <div class="queueList">
                                            <div id="dndArea" class="placeholder">
                                                <div id="filePicker"></div>
                                                <p>或将照片拖到这里</p>
                                            </div>
                                        </div>
                                        <div class="statusBar" style="display:none">
                                            <div class="progress">
                                                <span class="text">0%</span>
                                                <span class="percentage"></span>
                                            </div>    
                                            <div class="info"></div>
                                            <div class="btns">
                                                <div id="filePicker2"></div>
                                                <div class="uploadBtn">开始上传</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
<script type="text/javascript" src="{{ asset('ttdyy-admin/jQueryTzUpload/webuploader-0.1.5/webuploader.min.js') }}"></script>

<script type="text/javascript">
    $(function() {
        // 分类选择
        $('#country-select').selectpicker({
            'size' : 8
        });


        // 分类选择
        $('#category-select').selectpicker({
            'maxOptions' : 3,
            'size' : 8
        });

        window.webuploader = {
            config:{
                thumbWidth: 110, //缩略图宽度，可省略，默认为110
                thumbHeight: 110, //缩略图高度，可省略，默认为110
                wrapId: 'uploader', //必填
            },
            //处理客户端新文件上传时，需要调用后台处理的地址, 必填
            uploadUrl: 'fileupload.php',
            //处理客户端原有文件更新时的后台处理地址，必填
            updateUrl: 'fileupdate.php',
            //当客户端原有文件删除时的后台处理地址，必填
            removeUrl: 'filedel.php',
            //初始化客户端上传文件，从后台获取文件的地址, 可选，当此参数为空时，默认已上传的文件为空
            initUrl: 'fileinit.php',
        }

        $('.uploadBtn').click(function() {
            console.log(1111);
        })
    });


</script>
<script type="text/javascript" src="{{ asset('ttdyy-admin/jQueryTzUpload/webuploader-0.1.5/extend-webuploader.js') }}"></script>
@endsection