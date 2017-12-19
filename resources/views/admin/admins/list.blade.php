@extends('admin.layouts.app')

@section('style')
@endsection


@section('content')
<div>
	this is admin list!
	<div>{{ url()->current() }}</div>
	<div>{{ url()->full() }}</div>
	<div>{{ url()->previous() }}</div>
	<div>{{ config('app.url') }}</div>
</div>
@endsection


@section('script')
@endsection