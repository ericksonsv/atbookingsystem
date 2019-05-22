@extends('backend.layouts.app')

@section('title', __('Users Management'))

@section('content')
	<div class="header-component">
		<h4 class="header-component-title">
			<span>{{ __('Update User') }}</span>
		</h4>
	</div>
	<div class="card border-0 custom-bg-dark custom-shadow">
		<div class="card-body">
			{{ $user->name }}
		</div>
	</div>
@endsection