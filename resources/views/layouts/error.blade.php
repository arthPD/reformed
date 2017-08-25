<script>
	toastr.options = {
        "closeButton": true,
        "timeOut": 10000,
        "extendedTimeOut": 5000,
    }
	@if ($errors->any())
	    @foreach ($errors->all() as $error)
	     	toastr.error('{{$error}}');
	    @endforeach
	@endif
</script>