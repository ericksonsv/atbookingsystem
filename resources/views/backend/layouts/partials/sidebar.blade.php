<aside id="backend-sidebar" class="custom-bg-dark shadow">
	<a href="{{ route('backend.dashboard') }}" class="sidebar-link{{ setActive('backend.dashboard') }}">
		<i class="fas fa-tachometer-alt"></i><span>{{ __('Dashboard') }}</span>
	</a>
	<li class="sidebar-dropdown">
		<a href="#" class="sidebar-link">
			<i class="fa fa-cog"></i><span>{{ __('System') }}</span>
		</a>
		<div class="sidebar-submenu">
			<a href="{{ route('backend.users.index') }}" class="sidebar-link{{ setActive('backend.users.*') }}">
				<i class="fas fa-users"></i><span>{{ __('Users') }}</span>
			</a>
			<a href="" class="sidebar-link">
				<i class="fas fa-list-alt"></i><span>{{ __('Roles') }}</span>
			</a>
			<a href="" class="sidebar-link">
				<i class="fas fa-check-double"></i><span>{{ __('Permissions') }}</span>
			</a>
			<a href="" class="sidebar-link">
				<i class="fas fa-cogs"></i><span>{{ __('Settings') }}</span>
			</a>
		</div>
	</li>
</aside>