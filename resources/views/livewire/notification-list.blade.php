<div>

    <div class="notification-box">
        <i class="ri-notification-line"></i>
        <span class="badge rounded-pill badge-theme">{{$notifications->count()}}</span>
    </div>
    <ul class="notification-dropdown onhover-show-div">
        <li>
            <i class="ri-notification-line"></i>
            <h6 class="f-18 mb-0">Notitications</h6>
        </li>

        @foreach ($notifications as $notification)
        <li wire:key="{{$notification->id}}" wire:click.prevent="markOneAsRead('{{$notification->id}}')">
            <p>
                <i class="fa fa-circle me-2 font-primary"></i>{{$notification->data['message']}} <span class="pull-right">{{$notification->created_at->diffForHumans()}}</span>
            </p>
        </li>
        @endforeach
        @if($notifications->count())
        <li>
            <a class="btn btn-primary" wire:click.prevent="markAllAsRead" href="#" data-bs-original-title="" title="">Check all notification</a>
        </li>
        @endif
    </ul>

    @script
    <script>
        setInterval(() => {
            $wire.$refresh()
        }, 2000)
    </script>
    @endscript
</div>