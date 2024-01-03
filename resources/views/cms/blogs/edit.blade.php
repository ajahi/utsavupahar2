@extends('layouts.test')
@section('page-content')
<style>
.category-container {
    display: flex;
    flex-wrap: wrap;
}


.category-button {
    display: inline-block;
    padding: 10px;
    margin: 5px;
    border: none;
    cursor: pointer;
    background-color: #e0e0e0; /* Default background color */
}



/* Hide the checkboxes */



</style>
@if ($errors->any())
<div class="alert alert-secondary">

    @foreach ($errors->all() as $error)
    <p class="primary">{{ $error }}</p>

    @endforeach

</div>
@endif
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-sm-8 m-auto">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header-2">
                                <h5>Product Information</h5>
                            </div>

                            <form class="theme-form theme-form-2 mega-form" method="POST" action="{{route('product.update',$product)}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-4 row align-items-center" @if($errors->has('name'))style="background-color: rgb(248, 186, 181);" @endif>
                                    <label class="form-label-title col-sm-3 mb-0">Product
                                        Name</label>
                                    <div class="col-sm-9">
                                        <input name="name" class="form-control" type="text" value="{{$product->name}}"
                                            placeholder="Product Name">
                                    </div>
                                    
                                </div>

                                <div class="mb-4 row align-items-center" @if($errors->has('description'))style="background-color: rgb(248, 186, 181);" @endif>
                                    <label class="col-sm-3 col-form-label form-label-title">Product Description</label>
                                    <div class="col-sm-9" >
                                        
                                        <textarea id="editor" name="description"  cols="30" rows="10" >{{ $product->description }}</textarea>
                                    </div>
                                    
                                </div>

                                

                                
                                
                                <div class="mb-4 row align-items-center" >
                                    <label
                                        class="col-sm-3 col-form-label form-label-title">Featured</label>
                                    <div class="col-sm-9">
                                        <label class="switch">
                                            <input type="checkbox" name="featured" @if($product->featured=='on')checked @endif><span class="switch-state"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <label
                                        class="col-sm-3 col-form-label form-label-title">Refundable</label>
                                    <div class="col-sm-9">
                                        <label class="switch">
                                            <input type="checkbox" name='refundable' @if($product->refundable=='on')checked @endif><span
                                                class="switch-state"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row align-items-center" @if($errors->has('categories'))style="background-color: rgb(248, 186, 181);" @endif>
                                    <label
                                        class="col-sm-3 col-form-label form-label-title">Categories</label>
                                        <div class="category-container col-sm-9 ">
                                            <input type="hidden" name="selected_categories" id="selected_categories">
                                            <!-- Your other form fields here -->
                                            @foreach($categories as $category)
                                                <button class='category-button' type="button" data-category-id="{{$category->id}}" onclick="toggleCategory(this)">{{$category->name}}</button>
                                            @endforeach
                                        
                                                <!-- Add more category checkboxes and labels as needed -->
                                        </div>
                                </div>
                            
                        </div>
                    </div>

                    

                    <div class="card">
                        <div class="card-body" @if($errors->has('images'))style="background-color: rgb(248, 186, 181);" @endif>
                            <div class="card-header-2">
                                <h5>Product Images</h5>
                            </div>

                            <div class="theme-form theme-form-2 mega-form" >
                                <div class="mb-4 row align-items-center" >
                                    <label
                                        class="col-sm-3 col-form-label form-label-title">Images</label>
                                    <div class="col-sm-9">
                                        <input class="form-control form-choose" name="images[]" type="file"
                                            id="selectImage"  multiple>
                                    </div>
                                </div>
                                <h4>Preview</h4>
                                
                                <div id="previewContainer"></div>
                                <hr>
                                <h3>Previous Images</h3>
                                @foreach($product->getMedia('images') as $image)
                                <img src="{{$image->getFullUrl()}}" alt="{{$product->name}}" height='200px' width="200px">
                                @endforeach
                            </div>

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="card-header-2">
                                <h5>Shipping</h5>
                            </div>

                            <div class="theme-form theme-form-2 mega-form">
                                <div class="mb-4 row align-items-center" >
                                    <label class="form-label-title col-sm-3 mb-0">Weight
                                        (kg)</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name='weight' type="number" placeholder="Weight" value="{{$product->weight}}">
                                    </div>
                                </div>

                                <div class="row align-items-center" >
                                    <label class="col-sm-3 col-form-label form-label-title">Dimensions
                                        (cm)</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="dimensions" placeholder='12*3*12' id="" value="{{$product->dimensions}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="card-header-2">
                                <h5>Product Price</h5>
                            </div>

                            <div class="theme-form theme-form-2 mega-form">
                                <div class="mb-4 row align-items-center" @if($errors->has('purchase_price'))style="background-color: rgb(248, 186, 181);" @endif>
                                    <label class="col-sm-3 form-label-title">Purchase price</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="number" placeholder="0" name="purchase_price" value="{{$product->purchase_price}}">
                                    </div>
                                </div>
                                
                                <div class="mb-4 row align-items-center" @if($errors->has('sell_margin_p'))style="background-color: rgb(248, 186, 181);" @endif>
                                    <label class="col-sm-3 form-label-title">Sell Margin Percentage</label>
                                    <div class="col-sm-5">
                                        <input class="form-control" type="number" placeholder="write in terms of percentage" name="sell_margin_p" value={{$product->sell_margin_p}}>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body" @if($errors->has('variants','quantities'))style="background-color: rgb(248, 186, 181);" @endif>
                            <div class="card-header-2">
                                <h5>Product Inventory</h5>
                            </div>

                            
                            <table class="table variation-table table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">Variant</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Stock status</th>
                                        <th scope="col">Quantity</th>
                                        
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody class="tbody">
                                    @foreach($product->variants as $variants)
                                    <tr class="tempalte-row">
                                        <td><input type="text" name="variants[]" value={{$variants['name']}} required></td>
                                        <td>
                                            <input class="form-control" type="number" name="prices[]" placeholder="0" value="{{$variants['price']}}" required>
                                        </td>
                                        <td>
                                            <select name="status[]" id="" class="form-control">
                                                <option value="inStock" @if($variants['status']=='inStock') selected @endif>In Stock</option>
                                                <option value="OutOfStock" @if($variants['status']=='OutOfStock') selected @endif>Out Stock</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input class="form-control" type="number" name="quantities[]" placeholder="0" value="{{$variants['quantity']}}" required>
                                        </td>
                                        <td>
                                            <ul class="order-option">
                                                <li><a onclick='deletvariant(this)'><i class="ri-delete-bin-line"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr class="tempalte-row">
                                        <td><input type="text" name="variants[]" required></td>
                                        <td>
                                            <input class="form-control" type="number" name="prices[]" placeholder="0" required>
                                        </td>
                                        <td>
                                            <select name="status[]" id="" class="form-control">
                                                <option value="inStock" selected>In Stock</option>
                                                <option value="OutOfStock">Out Stock</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input class="form-control" type="number" name="quantities[]" placeholder="0" required>
                                        </td>
                                        <td>
                                            <ul class="order-option">
                                                <li><a onclick='deletvariant(this)'><i class="ri-delete-bin-line"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
 
                                </tbody>
                            </table>
                            {{-- <a class='btn btn-solid form-control' onclick='Addvariant(this)'>Add Variant</a> --}}
                        </div>
                    </div>

                    {{-- <div class="card">
                        <div class="card-body">
                            <div class="card-header-2">
                                <h5>Link Products</h5>
                            </div>

                            <div class="theme-form theme-form-2 mega-form">
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Upsells</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="search">
                                    </div>
                                </div>

                                <div class="row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Cross-Sells</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="search">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    <div class="card">
                        <div class="card-body">
                            <div class="card-header-2">
                                <h5>Search engine listing</h5>
                            </div>

                            {{-- <div class="seo-view">
                                <span class="link">https://fastkart.com</span>
                                <h5>Buy fresh vegetables & Fruits online at best price</h5>
                                <p>Online Vegetable Store - Buy fresh vegetables & Fruits online at best
                                    prices. Order online and get free delivery.</p>
                            </div> --}}

                            <div class="theme-form theme-form-2 mega-form">
                                <div class="mb-4 row align-items-center" @if($errors->has('meta_title'))style="background-color: rgb(248, 186, 181);" @endif>
                                    <label class="form-label-title col-sm-3 mb-0">Page title</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="search" name='meta_word' value='{{$product->meta_word}}'
                                            placeholder="Fresh Fruits">
                                    </div>
                                </div>

                                <div class="mb-4 row" @if($errors->has('meta_description'))style="background-color: rgb(248, 186, 181);" @endif>
                                    <label class="form-label-title col-sm-3 mb-0">Meta
                                        description</label>
                                    <div class="col-sm-9">
                                        <textarea id='editor' class="form-control" rows="3" name='meta_description'>{{$product->meta_description}}</textarea>
                                    </div>
                                </div>

                                {{-- <div class="row">
                                    <label class="form-label-title col-sm-3 mb-0">URL handle</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="search"
                                            placeholder="https://fastkart.com/fresh-veggies">
                                    </div>
                                </div> --}}
                                <button class="btn btn-solid" type='submit'>Submit</button>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    let selectedCategories = @json($selected_categories);
    //selects the selected categories
    selectedCategories.forEach(categoryId => {
        const categoryButton = document.querySelector(`[data-category-id="${categoryId}"]`);
        if (categoryButton) {
            
            // Simulate a click to select the category
            toggleCategory(categoryButton);
        }
    });

    function toggleCategory(button) {
        const categoryId = button.getAttribute("data-category-id");

        if (selectedCategories.includes(categoryId)) {
            // Deselect the category
            selectedCategories = selectedCategories.filter(id => id !== categoryId);
            button.style.backgroundColor = "";
        } else {
            // Select the category
            selectedCategories.push(categoryId);
            button.style.backgroundColor = "lightblue";
        }

        // Update the hidden input field
        document.getElementById("selected_categories").value = selectedCategories.join(",");
    }

    function Addvariant(){
        const table=document.querySelector('.tbody');
        const row =document.createElement('tr');
        row.addClass('template');
        row.innerHTML=`<td><input type="text" name="variants[]" ></td>`+
            `<td>
                <input class="form-control" type="number" name="prices[]" placeholder="0" >
            </td>`+
            `<td>
                <select name="status[]" id="" class="form-control" >
                    <option value="inStock">In Stock</option>
                    <option value="OutOfStock">Out Stock</option>
                </select>
            </td>`+
            `<td>
                <input class="form-control" type="number" name="quantities[]" placeholder="0" >
            </td>`+
            `<td>
                <ul class="order-option">
                    <li><a onclick='deletvariant(this)'><i class="ri-delete-bin-line"></i></a></li>
                </ul>
            </td>
        `;
        const res=table.appendChild(row);
        console.log(res);
        
    }

    function deletvariant(button){
        const row = button.closest('tr')
        row.remove();

    }
    ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );

 //listens to changes on dom with id selectImage
    selectImage.onchange = evt => {
    // grabs element with id previewContainer
        const previewContainer = document.getElementById('previewContainer');
        // sets its innerHTML to an empty string to clear previous previews
        previewContainer.innerHTML = '';

        const files = selectImage.files;

        for (const file of files) {
            // creates an image element for each file
            const img = document.createElement('img');
            img.style.maxWidth = '200px'; // Adjust the size as needed
            img.style.maxHeight = '200px'; // Adjust the size as needed

            // if there is a file, change src of img to the upload object URL
            if (file) {
                img.src = URL.createObjectURL(file);
                previewContainer.appendChild(img);
                
            }
        }
    };
</script>

    
@endsection