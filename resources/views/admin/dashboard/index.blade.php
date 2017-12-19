@extends('admin.layouts.app')

@section('style')
@endsection


@section('content')
<div>
	this is dashboard!
</div>
<div>{{ url()->current() }}</div>
<div>{{ config('app.url') }}</div>
@endsection


@section('script')
@endsection