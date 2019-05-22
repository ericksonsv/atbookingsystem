<div class="card custom-bg-dark border-0 custom-shadow">
	<div class="card-header text-right">
		<a href="{{ route('backend.users.index') }}" class="btn bg-dark btn-sm custom-shadow">
			<i class="fas fa-backward"></i><span class="d-none d-sm-inline-block ml-2">{{ __('Back') }}</span>
		</a>
		<button class="btn bg-dark btn-sm custom-shadow">
			<i class="fas fa-save"></i>
			<span class="d-none d-sm-inline-block ml-2">{{ isset($user) ? __('Update') : __('Create') }}</span>
		</button>
	</div>
	<div class="card-body">
		<fieldset>
			{{-- Name --}}
			<div class="form-group mb-4">
				<label for="name">{{ __('Name') }}</label>
				<input type="text" name="name" id="name" class="form-control border-0 custom-shadow @error('name') is-invalid @enderror" value="{{ old('name') }}{{ isset($user) ? $user->name : '' }}">
				@error('name')
				    <span class="invalid-feedback" role="alert">
				        <strong>{{ $message }}</strong>
				    </span>
				@enderror
			</div>
			<div class="row">
				<div class="col-md">
					{{-- Avatar --}}
					<div class="form-group mb-4">
						<label for="avatar">{{ __('Avatar') }}</label>
						<div class="custom-file">
						  <input type="file" class="custom-file-input @error('avatar') is-invalid @enderror" id="avatar" name="avatar" onchange="previewImage('avatar-image')">
						  <label class="custom-file-label" for="avatar">{{ __('Choose file') }}</label>
						</div>
						@if (isset($user))
							@if ($user->avatar)
								<img src="{{ asset('storage/users/avatars/'.$user->avatar) }}" id="avatar-image" class="mt-3 rounded custom-shadow img-fluid">
							@endif
						@else
							<img src="" id="avatar-image" class="mt-3 rounded custom-shadow img-fluid" style="display: none;">
						@endif
						@error('avatar')
						    <span class="invalid-feedback" role="alert">
						        <strong>{{ $message }}</strong>
						    </span>
						@enderror
					</div>
				</div>
				<div class="col-md">
					{{-- Profile Cover --}}
					<div class="form-group mb-4">
						<label for="profile_cover">{{ __('Profile Cover') }}</label>
						<div class="custom-file">
						  <input type="file" class="custom-file-input @error('profile_cover') is-invalid @enderror" id="profile_cover" name="profile_cover" onchange="previewImage('profile-cover-image')">
						  <label class="custom-file-label" for="profile_cover">{{ __('Choose file') }}</label>
						</div>
						@if (isset($user))
							@if ($user->profile_cover)
								<img src="{{ asset('storage/users/covers/'.$user->profile_cover) }}" id="profile-cover-image" class="mt-3 rounded custom-shadow img-fluid">
							@endif
						@else
							<img src="" id="profile-cover-image" class="mt-3 rounded custom-shadow img-fluid" style="display: none;">
						@endif
						@error('profile_cover')
						    <span class="invalid-feedback" role="alert">
						        <strong>{{ $message }}</strong>
						    </span>
						@enderror
					</div>
				</div>
			</div>
			{{-- Email Address --}}
			<div class="form-group mb-4">
				<label for="email">{{ __('Email Address') }}</label>
				<input type="email" name="email" id="email" class="form-control border-0 custom-shadow @error('email') is-invalid @enderror" value="{{ old('email') }}{{ isset($user) ? $user->email : '' }}">
				@error('email')
				    <span class="invalid-feedback" role="alert">
				        <strong>{{ $message }}</strong>
				    </span>
				@enderror
			</div>
			{{-- Password --}}
			<div class="form-group mb-4">
				<label for="password">{{ __('Password') }}</label>
				<input type="password" name="password" id="password" class="form-control border-0 custom-shadow @error('password') is-invalid @enderror" value="{{ old('password') }}">
				@error('password')
				    <span class="invalid-feedback" role="alert">
				        <strong>{{ $message }}</strong>
				    </span>
				@enderror
			</div>
			{{-- Password Confirmation --}}
			<div class="form-group mb-4">
				<label for="password_confirmation">{{ __('Password Confirmation') }}</label>
				<input type="password" name="password_confirmation" id="password_confirmation" class="form-control border-0 custom-shadow @error('password_confirmation') is-invalid @enderror" value="{{ old('password_confirmation') }}">
				@error('password_confirmation')
				    <span class="invalid-feedback" role="alert">
				        <strong>{{ $message }}</strong>
				    </span>
				@enderror
			</div>
			{{-- Active --}}
			<div class="form-group mb-4">
				<label for="active">{{ __('Status') }}</label>
				<select name="active" id="active" class="custom-select border-0 custom-shadow @error('active') is-invalid @enderror">
					<option value="1" @if (isset($user) && $user->active == 1) selected @endif>{{ __('Active') }}</option>
					<option value="0" @if (isset($user) && $user->active == 0) selected @endif>{{ __('Disable') }}</option>
				</select>
				@error('active')
				    <span class="invalid-feedback" role="alert">
				        <strong>{{ $message }}</strong>
				    </span>
				@enderror
			</div>
		</fieldset>
	</div>
</div>

@section('scripts')
	<script>
		function previewImage(item) {
			const reader = new FileReader();
			reader.onload = () => {
				const output = document.querySelector('#'+item);
				output.src = reader.result;
				output.style.display = 'block';
			}
			reader.readAsDataURL(event.target.files[0]);
		}
	</script>
@endsection