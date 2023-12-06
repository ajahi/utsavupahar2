@extends('layouts.test')

@section('page-content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table">
                <div class="card-body">
                    <div class="title-header option-title d-sm-flex d-block">
                        <h5>Products List</h5>
                        <div class="right-options">
                            <ul>
                                
                                <li>
                                    <a href="javascript:void(0)">Export</a>
                                </li>
                                <li>
                                    <a class="btn btn-solid" href="{{route('product.create')}}">Add Product</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div>
                        <div class="table-responsive">
                            <table class="table all-package theme-table table-product" id="table_id">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Image</th>
                                        <th>Product Name</th>
                                        <th>Category</th>
                                        <th>Variant:Price</th>
                                        <th>Quantity</th>
                                        <th>Cost Price/Unit </th>
                                        
                                        <th>Option</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($products as $product)
                                    
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            <div class="table-image">
                                                @if($product->getMedia('images')->first()!==null)
                                                <img src={{$product->getMedia('images')->first()->getFullUrl()}}>
                                                @else
                                                <img src="{{asset('assets/images/product/1.png')}}" class="img-fluid"
                                                    alt="{{$product->name}}">
                                                    
                                                @endif
                                            </div>
                                        </td>

                                        <td>{{$product->name}}</td>

                                        <td>
                                            @foreach($product->category as $category)
                                            {{$category->name}},
                                            @endforeach
                                        </td>

                                        <td class="justify-start">
                                            <ul>
                                                @foreach($product->variants as $var)
                                                <li>{{$var->name. ':' . $var->price}}</li>
                                                @endforeach
                                            </ul>
                                           
                                            
                                            </td>
                                        <td>
                                            <ul>
                                                @foreach($product->variants as $var2)
                                                <li>{{$var2->quantity}}</li>
                                                @endforeach
                                            </ul>
                                            
                                        </td>

                                        <td class="td-price">RS {{$product->purchase_price}}</td>

                                        @if($product->status=='draft')
                                        <td class="status-danger">
                                            <span>Draft</span>
                                        </td>
                                        @elseif($product->status=='published')
                                        <td class="status-close">
                                            <span>Published</span>
                                        </td>
                                        @elseif($product->status=='archived')
                                        <td class="status-warning">
                                            <span>Archived</span>
                                        </td>
                                        @endif
                                        <td>
                                            <ul>
                                                <li>
                                                    <a href="{{route('product.show',$product)}}">
                                                        <i class="ri-eye-line"></i>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="{{route('product.edit',$product)}}">
                                                        <i class="ri-pencil-line"></i>
                                                    </a>
                                                </li>

                                                <li>
                                                    <form action="{{route('product.delete',$product)}}" method="post" style="display:inline" 
                                                        onclick="return confirm('Are you sure you want to delete this product?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"> <i class="ri-delete-bin-line"></i></button>
                                                       
                                                </form>
                                                    
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection