<ul wire:key="order-export">
    <li class="onhover-dropdown">
        <div class="btn btn-primary">
            Export as
        </div>
        <ul class="notification-dropdown onhover-show-div p-3">

            <li class="mb-2 ">
                <button wire:click="export('csv')" class="text-white btn btn-primary">
                    CSV
                </button>
            </li>

            <li class="mb-2  ">
                <button wire:click="export('pdf')" class="text-white btn btn-primary">
                    PDF
                </button>
            </li>
        </ul>
    </li>
</ul>