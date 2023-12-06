@extends('layouts.test')

@section('page-content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table">
                <!-- Table Start -->
                <div class="card-body">
                    <div class="title-header option-title">
                        <h5>Product Reviews</h5>
                    </div>
                    <div>
                        <div class="table-responsive">
                            <table class="user-table ticket-table review-table theme-table table" id="table_id">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Customer Name</th>
                                        <th>Product Name</th>
                                        <th>Rating</th>
                                        <th>Comment</th>
                                        <th>Published</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($reviews as $index => $review)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $review->user->name }}</td>
                                        <td>{{ $review->product->name }}</td>
                                        <td>
                                            <ul class="rating">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <li>
                                                        @if ($i <= $review->rating)
                                                            <i class="fas fa-star theme-color"></i>
                                                        @else
                                                            <i class="fas fa-star"></i>
                                                        @endif
                                                    </li>
                                                @endfor
                                            </ul>
                                        </td>
                                        <td>{{ $review->comment }}</td>
                                        <td class="td-check">
                                            @if ($review->published)
                                                <i class="ri-checkbox-circle-line"></i>
                                            @else
                                                <i class="ri-checkbox-blank-circle-line"></i>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Table End -->
            </div>
        </div>
    </div>
</div>
    
@endsection
