@extends('admin.layouts.app')

@section('style')
@endsection


@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="content-box">
            <div class="content-box-header">
             
            </div>
            <div class="content-box-body">
                <form id="images-upload" enctype="multipart/form-data" method="post">
                    {{ csrf_field() }}
                    <input id="images-input" name="images[]" type="file" multiple accept="image/*">
                    <button type="submit">submit</button>
                </form>
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