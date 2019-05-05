<nav id="backend-navigation" class="custom-bg-dark custom-shadow">
  <div class="nav">
    <i class="fas fa-bars text-2xl mr-4" id="sidebar-toggler"></i>
    <a href="{{ route('backend.dashboard') }}" id="backend-brand">
      <img class="img-fluid" src="{{ asset('img/logo.svg') }}" alt="{{ config('app.name') }}">
    </a>
  </div>
  <div class="nav">
    <a href="" id="user-dropdown">
    	<span class="d-none d-md-inline-block mr-2">Erickson Suero</span>
    	<img src="{{ asset('img/default_avatar.png') }}" class="rounded-circle" alt="Username">
    </a>
  </div>
</nav>
<div id="user-menu" class="custom-bg-dark custom-shadow">
	<a href=""><i class="fas fa-user-circle"></i><span>{{ __('Profile') }}</span></a>
	<a href=""><i class="fas fa-bell"></i><span>{{ __('Notifications') }}</span></a>
	<hr class="m-0">
	<a href="{{ route('backend.logout') }}" onclick="event.preventDefault(); document.getElementById('backend-logout-form').submit();"><i class="fas fa-sign-out-alt"></i><span>{{ __('Sigh Out') }}</span></a>
	<form id="backend-logout-form" action="{{ route('backend.logout') }}" method="POST" style="display: none;">@csrf</form>
</div>