
<div wire:key="flash-message" class="fixed-top mx-auto mt-3 ml-3">
    @if($flashMessage)
    <div class="alert alert-success w-25" role="alert" id='flashMessage'>
        
        <p>{{$flashMessage}}  <button wire:click='remove' class="buttonRemove" type="btn btn-solid close" >
            x
        </button></p>
        
    </div>
    @endif
</div>

    




