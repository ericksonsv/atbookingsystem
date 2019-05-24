@extends('backend.layouts.app')

@section('content')
	<div class="card-deck mb-3">
		<div class="card-dashboard card border-0 custom-bg-dark card-body custom-shadow text-right p-3 mb-4">
			<section class="card-icon bg-info text-white custom-shadow"><i class="fas fa-users"></i></section>
			<p class="m-0 mb-1 text-info">{{ __('Users') }}</p>
			<h4 class="m-0">0</h4>
		</div>
		<div class="card-dashboard card border-0 custom-bg-dark card-body custom-shadow text-right p-3 mb-4">
			<section class="card-icon bg-info text-white custom-shadow"><i class="fas fa-hotel"></i></section>
			<p class="m-0 mb-1 text-info">{{ __('Hotels') }}</p>
			<h4 class="m-0">0</h4>
		</div>
		<div class="card-dashboard card border-0 custom-bg-dark card-body custom-shadow text-right p-3 mb-4">
			<section class="card-icon bg-info text-white custom-shadow"><i class="fas fa-map-marked-alt"></i></section>
			<p class="m-0 mb-1 text-info">{{ __('Destinations') }}</p>
			<h4 class="m-0">0</h4>
		</div>
		<div class="card-dashboard card border-0 custom-bg-dark card-body custom-shadow text-right p-3 mb-4">
			<section class="card-icon bg-info text-white custom-shadow"><i class="fas fa-calendar-alt"></i></section>
			<p class="m-0 mb-1 text-info">{{ __('Reservations') }}</p>
			<h4 class="m-0">0</h4>
		</div>
		<div class="card-dashboard card border-0 custom-bg-dark card-body custom-shadow text-right p-3 mb-4">
			<section class="card-icon bg-info text-white custom-shadow"><i class="fas fa-shopping-cart"></i></section>
			<p class="m-0 mb-1 text-info">{{ __('New Orders') }}</p>
			<h4 class="m-0">0</h4>
		</div>
	</div>
@endsection