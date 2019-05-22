@extends('backend.layouts.app')

@section('title', __('Users Management'))

@section('styles')
	<link rel="stylesheet" href="{{ asset('vendor/DataTables/datatables.min.css') }}">
@endsection

@section('content')

	<div class="header-component">
		<h4 class="header-component-title">
			<span>{{ __('Users Management') }}</span>
		</h4>
		<div>
			<a href="@if ($deleted != 0) {{ route('backend.users.deleted') }} @endif" class="btn bg-dark btn-sm custom-shadow @if ($deleted == 0) disabled @endif">
				<i class="fas fa-trash"></i>
				<span class="d-none d-md-inline-block mx-2">{{ __('Deleted') }}</span>
				<span class="badge badge-info">{{ $deleted }}</span>
			</a>
			<a href="{{ route('backend.users.create') }}" class="btn bg-dark btn-sm custom-shadow">
				<i class="fas fa-plus"></i><span class="d-none d-md-inline-block ml-2">{{ __('Create') }}</span>
			</a>
		</div>
	</div>

	<div class="table-responsive">
		<table class="table table-hover custom-shadow" id="users-table">
			<thead class="bg-dark">
				<tr>
					<th class="th-check">
						<div class="custom-control custom-checkbox">
						  <input type="checkbox" class="custom-control-input" id="check-all">
						  <label class="custom-control-label" for="check-all"></label>
						</div>
					</th>
					<th><span>{{ __('Name') }}</span></th>
					<th><span>{{ __('E-Mail') }}</span></th>
					<th><span>{{ __('Status') }}</span></th>
					<th class="th-options"></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($users as $user)
					<tr>
						<td class="align-middle">
							<div class="custom-control custom-checkbox">
							  <input type="checkbox" class="custom-control-input" id="user-check-{{ $user->id }}">
							  <label class="custom-control-label" for="user-check-{{ $user->id }}"></label>
							</div>
						</td>
						<td class="align-middle"><span>{{ $user->name }}</span></td>
						<td class="align-middle"><span>{{ $user->email }}</span></td>
						<td class="align-middle"><span>{{ $user->active ? __('Active') : __('Disable') }}</span></td>
						<td class="align-middle text-right">
							<a class="btn bg-dark btn-sm shadow-sm" href="{{ route('backend.users.edit', $user->id) }}"><i class="fas fa-pen"></i></a>
							<a class="btn bg-dark btn-sm shadow-sm" href="{{ route('backend.users.destroy', $user->id) }}" data-toggle="modal" data-target="#confirm-destroy-user-{{$user->id}}">
								<i class="fas fa-trash"></i>
							</a>
							{{-- Confirmation Modal --}}
							<div class="modal fade" id="confirm-destroy-user-{{$user->id}}" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title font-weight-bolder">{{ __('Please confirm action to continue') }}</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body text-left">
											<p>{{ __('The user '.$user->name.' will be send to the trash.') }}</p>
											<p class="font-weight-bold">{{ __('Do you want to continue?') }}</p>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">{{ __('No') }}</button>
											<form method="POST" action="{{ route('backend.users.destroy', $user->id) }}">
												@csrf
												@method('DELETE')
												<button type="submit" class="btn btn-warning btn-sm">{{ __('Yes') }}</button>
											</form>
										</div>
									</div>
								</div>
							</div>
							{{-- Confirmation Modal --}}
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>

@endsection

@section('scripts')
	<script src="{{ asset('vendor/jquery/dist/jquery.min.js') }}"></script>
	<script src="{{ asset('vendor/DataTables/datatables.min.js') }}"></script>
	<script>
		$(document).ready(function() {
		    $('#users-table').DataTable({
		    	"language": {
		    		"url": "{{ asset('vendor/DataTables/Spanish.json') }}"
		    	},
		    	"order": ([2,'desc']),
		    	"columns": [
		    		{ "orderable": false },
		    		null,
		    		null,
		    		null,
		    		{ "orderable": false }
		    	]
		    });
		} );
	</script>
@endsection