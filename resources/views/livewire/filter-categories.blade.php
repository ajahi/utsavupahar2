<div class="accordion-body" wire:key="categories">
    <div class="form-floating theme-form-floating-2 search-box">
        <input wire:model.live='searchText' type="search" class="form-control" id="search" placeholder="Search ..">
        <label for="search">Search</label>
    </div>

    <ul class="category-list custom-padding custom-height">
        @foreach ($categories as $category)

        <li>
            <div class="form-check ps-0 m-0 category-list-box">
                <input value="{{$category->id}}" wire:model.live="selected" class="checkbox_animated" type="checkbox" id="category-{{$category->id}}">
                <label class="form-check-label" for="category-{{$category->id}}">
                    <span class="name">{{$category->name}}</span>
                    <span class="number">({{$category->products()->count()}})</span>
                </label>
            </div>
        </li>
        @endforeach

    </ul>
</div>