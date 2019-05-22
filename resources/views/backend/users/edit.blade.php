@extends('backend.layouts.app')

@section('title', __('Users Management'))

@section('content')
	<div class="header-component">
		<h4 class="header-component-title">
			<span>{{ __('Update User') }}</span>
		</h4>
	</div>
	<form action="{{ route('backend.users.update', $user->id) }}" method="POST" enctype="multipart/form-data" accept-charset="UTF-8">
		@method('PUT')
		@csrf
		@include('backend.users.form')
	</form>
@endsection