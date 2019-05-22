@extends('backend.layouts.app')

@section('title', __('Users Management'))

@section('content')
	<div class="header-component">
		<h4 class="header-component-title">
			<span>{{ __('Create User') }}</span>
		</h4>
	</div>
	<form action="{{ route('backend.users.store') }}" method="POST" enctype="multipart/form-data" accept-charset="UTF-8">
		@csrf
		@include('backend.users.form')
	</form>
@endsection