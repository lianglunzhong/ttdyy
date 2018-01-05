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
                                        <option>cow</option>
                                        <option>bull</option>
                                        <option>ox</option>
                                        <option>ASD</option>
                                        <option>Bla</option>
                                        <option>Blde</option>
                                        <option>Blfe</option>
                                        <option>Blse</option>
                                        <option>Blae</option>
                                    </select>
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
    });


</script>
@endsection