@if ($message = Session::get('success'))

<div class="alert alert-primary notify-alert notification" type='theme' role='alert'>

	<button type="btn btn-solid" class="close" data-dismiss="alert">×</button>	

    <i class="fas fa-bell"></i></i><strong>{{$message}}</strong> 

</div>

@endif



@if ($message = Session::get('error'))

<div class="alert alert-danger alert-block notification">

	<button type="button" class="close" data-dismiss="alert">×</button>	

        <strong>{{ $message }}</strong>

</div>

@endif



@if ($message = Session::get('warning'))

<div class="alert alert-secondary alert-block notification">

	<button type="btn btn-solid" class="close" data-dismiss="alert">×</button>	

	<strong>{{ $message }}</strong>

</div>

@endif



@if ($message = Session::get('info'))

<div class="alert alert-link alert-block notification">

	<button type="button" class="close" data-dismiss="alert">×</button>	

	<strong>{{ $message }}</strong>

</div>

@endif



{{-- @if ($errors->any())

<div class="alert alert-secondary">

	<button type="button" class="close" data-dismiss="alert">×</button>	

	 @foreach ($errors->all() as $error)
    <p class="primary">{{ $error }}</p>

    @endforeach

</div>

@endif --}}