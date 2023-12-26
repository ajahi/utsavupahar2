<ul>
    <li class="onhover-dropdown">
        <div class="notification-box">
            Change Status
        </div>
        <ul class="notification-dropdown onhover-show-div p-3">

            <li class="mb-2 ">
                <button wire:click="changeStatus('ordered')" class="text-secondary outline-0 border-0 p-2 rounded">
                    Ordered
                </button>
            </li>

            <li class="mb-2  ">
                <button wire:click="changeStatus('packed')" class="text-secondary outline-0 border-0 p-2 rounded">
                    Packed
                </button>
            </li>
            <li class="mb-2  ">
                <button wire:click="changeStatus('delivered')" class="text-secondary outline-0 border-0 p-2 rounded">
                    Delivered
                </button>
            </li>
            <li class="mb-2  ">
                <button wire:click="changeStatus('canceled')" class="text-secondary outline-0 border-0 p-2 rounded">
                    Canceled
                </button>
            </li>
        </ul>
    </li>
</ul>