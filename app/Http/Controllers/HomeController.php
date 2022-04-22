<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /* public function __construct()
    {
        $this->middleware('auth');
    } */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if(isset($request['product_search'])) {
            $searched_products = Product::where('name', 'like', '%' . $request['product_search'] . '%')
                ->paginate(20)
                ->withQueryString()
            ;

            return view('home', compact('searched_products'));
        }

        $latest_products = Product::orderBy('created_at', 'desc')
            ->take(20)
            ->get()
        ;

        return view('home', compact('latest_products'));
    }
}
