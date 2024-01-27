<div wire:key="discount" id="collapseFour" class="accordion-collapse collapse show" aria-labelledby="headingFour">
    <div class="accordion-body">
        <ul class="category-list custom-padding">
            <li>
                <div class="form-check ps-0 m-0 category-list-box">
                    <input wire:model.live="discount" value="-1, 5" class="checkbox_animated" type="checkbox" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        <span class="name">upto 5%</span>
                        <span class="number">(06)</span>
                    </label>
                </div>
            </li>

            <li>
                <div class="form-check ps-0 m-0 category-list-box">
                    <input wire:model.live="discount" value="5, 10" class="checkbox_animated" type="checkbox" id="flexCheckDefault1">
                    <label class="form-check-label" for="flexCheckDefault1">
                        <span class="name">5% - 10%</span>
                        <span class="number">(08)</span>
                    </label>
                </div>
            </li>

            <li>
                <div class="form-check ps-0 m-0 category-list-box">
                    <input wire:model.live="discount" value="10, 15" class="checkbox_animated" type="checkbox" id="flexCheckDefault2">
                    <label class="form-check-label" for="flexCheckDefault2">
                        <span class="name">10% - 15%</span>
                        <span class="number">(10)</span>
                    </label>
                </div>
            </li>

            <li>
                <div class="form-check ps-0 m-0 category-list-box">
                    <input wire:model.live="discount" value="15, 25" class="checkbox_animated" type="checkbox" id="flexCheckDefault3">
                    <label class="form-check-label" for="flexCheckDefault3">
                        <span class="name">15% - 25%</span>
                        <span class="number">(14)</span>
                    </label>
                </div>
            </li>

            <li>
                <div class="form-check ps-0 m-0 category-list-box">
                    <input wire:model.live="discount" value="25, 100" class="checkbox_animated" type="checkbox" id="flexCheckDefault4">
                    <label class="form-check-label" for="flexCheckDefault4">
                        <span class="name">More than 25%</span>
                        <span class="number">(13)</span>
                    </label>
                </div>
            </li>
        </ul>
    </div>
</div>