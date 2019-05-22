{{-- Errors --}}
@if ($errors->any())
    <script>
    	Toast.fire({
    	  type: 'error',
    	  title: '{{__('Please check the errors bellow.')}}'
    	})
    </script>
@endif

{{-- Success Alert --}}
@if (session('success'))
	<script>
    	Toast.fire({
    	  type: 'success',
    	  title: '{{ session('success') }}'
    	})
    </script>
@endif