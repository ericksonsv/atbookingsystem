<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <link href="{{ asset('css/backend.css') }}" rel="stylesheet">
</head>
<body>
  <div id="backend-login">
  	<img class="img-fluid" id="backend-logo" src="{{ asset('img/logo.png') }}" alt="{{ config('app.name') }}">
	<div class="container mt-5">
		<div class="row justify-content-center">
			<div class="col-lg-4">
				<form action="{{ route('backend.login') }}" method="POST">
					@csrf
					<div class="form-group">
						<label for="email">{{ __('Email Address') }}</label>
						<input type="email" name="email" id="email" class="form-control bg-gray-500 @error('email') is-invalid @enderror" value="{{ old('email') }}">
						@error('email')
						    <span class="invalid-feedback" role="alert">
						        <strong>{{ $message }}</strong>
						    </span>
						@enderror
					</div>
					<div class="form-group">
						<label for="password">{{ __('Password') }}</label>
						<input type="password" name="password" id="password" class="form-control bg-gray-500 @error('password') is-invalid @enderror">
						@error('password')
						    <span class="invalid-feedback" role="alert">
						        <strong>{{ $message }}</strong>
						    </span>
						@enderror
					</div>
					<div class="form-group">
						<div class="custom-control custom-checkbox">
						  <input type="checkbox" name="remember" class="custom-control-input" id="remember" {{ old('remember') ? 'checked' : '' }}>
						  <label class="custom-control-label" for="remember">{{ __('Remember Me') }}</label>
						</div>
					</div>
					<div class="form-group">
						<button class="btn custom-bg-dark btn-block shadow-sm">{{ __('Login') }}</button>
					</div>
				</form>
			</div>
		</div>
	</div>
  </div>
  <script src="{{ asset('js/backend.js') }}"></script>
</body>
</html>
