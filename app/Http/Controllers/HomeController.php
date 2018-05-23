<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;


class HomeController extends Controller
{
    public function index()
    {
        $all_published_products = DB::table('tbl_products')
        ->join('tbl_category', 'tbl_products.category_id','=','tbl_category.category_id')
        ->join('tbl_brand','tbl_products.brand_id','=','tbl_brand.brand_id')
        ->where('product_status', 1)
        ->limit(9)
        ->get();
        $manage_published_product = view('pages.home_content')
            ->with('all_published_products', $all_published_products);
        return view('layout')
            ->with('pages.home_content', $manage_published_product);
    }
}
