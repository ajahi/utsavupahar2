<div class="category-dropdown" wire:key="sortby">
    <h5 class=" text-content">Sort By :</h5>
    <div class="dropdown">
        <button class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown">
            <span>{{$selectedOrder}}</span> <i class="fa-solid fa-angle-down"></i>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li>
                <a wire:click="setSortFilter('purchase_price', 'asc')" class="dropdown-item" id="low" href="#">Low - High
                    Price</a>
            </li>
            <li>
                <a wire:click="setSortFilter('purchase_price', 'desc')" class="dropdown-item" id="high" href="#">High - Low
                    Price</a>
            </li>
            <li>
                <a wire:click="setSortFilter('rating', 'desc')" class="dropdown-item" id="rating" href="#">Average
                    Rating</a>
            </li>
            <li>
                <a wire:click="setSortFilter('name', 'asc')" class="dropdown-item" id="aToz" href="#">A - Z Order</a>
            </li>
            <li>
                <a wire:click="setSortFilter('name', 'desc')" class="dropdown-item" id="zToa" href="#">Z - A Order</a>
            </li>
            <li>
                <a wire:click="setSortFilter('discount_p', 'desc')" class="dropdown-item" id="off" href="#">% Off - Hight To
                    Low</a>
            </li>
        </ul>
    </div>
</div>