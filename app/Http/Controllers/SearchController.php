<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Models\Femproduct;
use App\Models\Eproduct;
use App\Models\Order;

class SearchController extends Controller
{
    public function index()
    {
        return view('search.index');
    }

    public function search(Request $req)
    {
        $query = $req->input('query');

        if ($query) {
            $searchProducts = Product::where('Name', 'LIKE', '%' . $query . '%')->latest()->paginate(15);
            $searchFemProducts = FemProduct::where('Name', 'LIKE', '%' . $query . '%')->latest()->paginate(15);
            return view('SearchResults', compact('searchProducts','searchFemProducts'));
        } else {
            return redirect()->back()->with('message', 'Empty Search');
        }
    }
}