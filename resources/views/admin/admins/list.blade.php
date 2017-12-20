@extends('admin.layouts.app')

@section('style')
@endsection


@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="content-box">
            <div class="content-box-header">
                <div class="row no-margin">
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="serach for name or email">
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
            </div>
            <div class="content-box-body">
                <table id="table_id_example" class="table table-bordered table-hover table-responsive">
                    <thead>
                        <tr class="info">
                            <th class="select-all">Select all</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Create at</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row"><input type="checkbox" name=""></td>
                            <td>1</td>
                            <td>KeKeO</td>
                            <td>admin@ttdyy.com</td>
                            <td>Admin</td>
                            <td>2017-12-20</td>
                        </tr>
                        <tr>
                            <td scope="row"><input type="checkbox" name=""></td>
                            <td>2</td>
                            <td>Xuqing</td>
                            <td>admin@ttdyy.com</td>
                            <td>Admin</td>
                            <td>2017-12-22</td>
                        </tr>
                        <tr>
                            <td scope="row"><input type="checkbox" name=""></td>
                            <td>3</td>
                            <td>Lala</td>
                            <td>admin@ttdyy.com</td>
                            <td>Common</td>
                            <td>2017-12-01</td>
                        </tr>
                        <tr>
                            <td scope="row"><input type="checkbox" name=""></td>
                            <td>4</td>
                            <td>LLz</td>
                            <td>admin@ttdyy.com</td>
                            <td>Admin</td>
                            <td>2017-12-10</td>
                        </tr>
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
        $('#table_id_example').DataTable({
            "dom": '<"content-box-header"f><"content-box-body"t><"content-box-footer"ilp>'
        });
    });
</script>
@endsection