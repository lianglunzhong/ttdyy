@extends('admin.layouts.app')

@section('style')
@endsection


@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="content-box">
            <div class="content-box-header">
                <div class="row no-margin">
                    <div class="col-md-12">
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
            </div>
            <div class="content-box-body">
                <table id="table" class="table table-bordered table-hover table-responsive">
                    <thead>
                        <tr class="info">
                            <th class="select-all">Select all</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Create at</th>
                            <th class="action">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                        <tr>
                            <td class="select-all"><input type="checkbox" name=""></td>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->slug }}</td>
                            <td>{{ $role->created_at }}</td>
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
        
    });


</script>
@endsection