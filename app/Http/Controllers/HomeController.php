<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Group;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topcustomer = DB::table('customers')
        ->join('orders', 'customers.id', '=', 'orders.customer_id')
        ->selectRaw('customers.*, sum(orders.total) total_Order')
        ->groupBy('customers.id')
        ->orderBy('total_Order', 'desc')
        ->take(5)
        ->get();
    $productnew = Product::take(4)->get();
    $totalProduct = Product::count();
    $categorynew = Category::take(4)->get();

    $totalCategory = Category::count();
    $totalOrder = Order::count();
    $totalUser = User::count();
    $totalCustomer = Customer::count();
    // $customernew = Customer::take(4)->get();
    $totalGroup = Group::count();

    $topproduct = DB::table('orderdetail')
    ->leftJoin('products', 'products.id', '=', 'orderdetail.product_id')
    ->selectRaw('products.*, sum(orderdetail.quantity) total_Product, sum(orderdetail.total) total_Price')
    ->groupBy('orderdetail.product_id')
    ->orderBy('total_Product', 'desc')
    ->take(200)
    ->get();
    // dd($topproduct);

    return view('dasboar', compact('topproduct','topcustomer','categorynew','totalProduct','totalCategory','totalOrder','totalUser','totalCustomer','totalGroup','productnew'));
}

}
