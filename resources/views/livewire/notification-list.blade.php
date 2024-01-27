<div wire:key="notification-list">

    <div class="notification-box">
        <i class="ri-notification-line"></i>
        <span class="badge rounded-pill badge-theme">{{$unreadNotifications->count()}}</span>
    </div>
    <ul class="notification-dropdown onhover-show-div" style="overflow-y: scroll; max-height: 50vh;">
        <li class="mb-2">
            <i class="ri-notification-line"></i>
            <h6 class="f-18 mb-0">Notitications</h6>
        </li>
        @foreach ($unreadNotifications as $notification)
        <li class="mb-2" style="background-color: rgba(13, 164, 135, 0.5);" wire:key="{{$notification->id}}" wire:click.prevent="markOneAsRead('{{$notification->id}}', '{{$notification->data['oid']}}')">
            <p>
                <i class="fa fa-circle me-2 font-primary"></i>{{$notification->data['message']}} <span class="pull-right font-primary">{{$notification->created_at->diffForHumans()}}</span>
            </p>
        </li>
        @endforeach
        @foreach ($readNotifications as $notification)
        <li class="mb-2" wire:key="{{$notification->id}}" wire:click.prevent="markOneAsRead('{{$notification->id}}', '{{$notification->data['oid']}}')">
            <p>
                <i class="fa fa-circle me-2 font-secondary"></i>{{$notification->data['message']}} <span class="pull-right">{{$notification->created_at->diffForHumans()}}</span>
            </p>
        </li>
        @endforeach

    </ul>

    @script
    <script>
        setInterval(() => {
            $wire.$refresh()
        }, 4000)
    </script>
    @endscript
</div>