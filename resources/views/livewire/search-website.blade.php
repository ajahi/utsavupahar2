<div wire:key="search-wb">
    <section class="search-section">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-xxl-6 col-xl-8 mx-auto">
                    <div class="title d-block text-center">
                        <h2>Search for products</h2>
                        <span class="title-leaf">
                            <svg class="icon-width">
                                <use xlink:href="../assets/svg/leaf.svg#leaf"></use>
                            </svg>
                        </span>
                    </div>

                    <div class="search-box">
                        <div class="input-group">
                            <input wire:model.live="searchText" type="text" class="form-control" placeholder=""
                                aria-label="Example text with button addon">
                            <button class="btn theme-bg-color text-white m-0" type="button"
                                id="button-addon1">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Search Bar Section End -->

    <!-- Product Section Start -->
    <section class="section-b-space">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="search-product product-wrapper">
                        @if(count($searchResults))
                       @foreach($searchResults->groupByType() as $type => $searchTypeResult)
                       <span>{{$type}} :</span>
                       @foreach ($searchTypeResult as $searchResult)
                       
                       <div>
                           <div class="product-box-3 h-100">
                               <div class="product-header">
                                   <div class="product-image">
                                       <a href="{{$searchResult->url}}">
                                           <img src="{{$searchResult->searchable->getMedia('images')->first()?->getFullUrl()}}" class="img-fluid" alt="{{$type}}">
                                       </a>
                                   </div>
                               </div>
                               
                               <div class="product-footer">
                                   <div class="product-detail">
                                       <span class="span-name">{{$searchResult->searchable->name}}</span>
                                       <a href="{{$searchResult->url}}">
                                           <h5 class="name">{!!  $searchResult->searchable->description ?? "<p>Click to view products related to this category.</p>"!!}</h5>
                                        </a>
                                        @if($type !== 'categories')
                                      
                                       <div class="product-rating mt-2">
                                           <ul class="rating">
                                               <li>
                                                   <i data-feather="star" class="fill"></i>
                                               </li>
                                               <li>
                                                   <i data-feather="star" class="fill"></i>
                                               </li>
                                               <li>
                                                   <i data-feather="star" class="fill"></i>
                                               </li>
                                               <li>
                                                   <i data-feather="star"></i>
                                               </li>
                                               <li>
                                                   <i data-feather="star"></i>
                                               </li>
                                           </ul>
                                           <span>(3.8)</span>
                                       </div>
                                       
                                       <h6 class="unit">{{$searchResult->searchable->weight}} Kg</h6>

                                       <h5 class="price"><span class="theme-color">${{$searchResult->searchable->purchase_price - $searchResult->searchable->discount_p}}</span> <del>${{$searchResult->searchable->purchase_price}}</del>
                                       </h5>
                                       <div class="add-to-cart-box bg-white">
                                           <button class="btn btn-add-cart addcart-button">Add
                                               <span class="add-icon bg-light-gray">
                                                   <i class="fa-solid fa-plus"></i>
                                               </span>
                                           </button>
                                           <div class="cart_qty qty-box">
                                               <div class="input-group bg-white">
                                                   <button type="button" class="qty-left-minus bg-gray"
                                                       data-type="minus" data-field="">
                                                       <i class="fa fa-minus" aria-hidden="true"></i>
                                                   </button>
                                                   <input class="form-control input-number qty-input" type="text"
                                                       name="quantity" value="0">
                                                   <button type="button" class="qty-right-plus bg-gray"
                                                       data-type="plus" data-field="">
                                                       <i class="fa fa-plus" aria-hidden="true"></i>
                                                   </button>
                                               </div>
                                           </div>
                                       </div>
                                       @endif
                                   </div>
                               </div>
                           </div>
                       </div>

                       @endforeach
                       <br>
                        @endforeach
                        @else
                        <p>No Products..</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>