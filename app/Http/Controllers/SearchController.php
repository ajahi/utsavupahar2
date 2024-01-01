<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Spatie\Searchable\Search;
use Illuminate\Support\Facades\Validator;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $validator = Validator::make($request->all(), 
            [
                'search' => "required|string",
            ]);

            if($validator->validated())
            {
                return view('search-result', ['searchText' => $request->search]);
            }
    }

}
