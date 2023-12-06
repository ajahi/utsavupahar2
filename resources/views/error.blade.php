@if ($errors->any())
<div class="alert alert-secondary">

    @foreach ($errors->all() as $error)
    <p class="primary">{{ $error }}</p>

    @endforeach

</div>
@endif