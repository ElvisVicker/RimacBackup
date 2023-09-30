<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function index()
    {
        $cars = DB::table('cars')
            ->select('cars.*', 'car_categories.name as car_category_name', 'car_categories.rent_price as car_category_rent_price', 'brands.name as brand_name', 'brands.image as brand_image', 'car_images.name as car_image')
            ->join('car_categories', 'cars.car_category_id', '=', 'car_categories.id')
            ->join('brands', 'cars.brand_id', '=', 'brands.id')
            ->leftJoin('car_images', 'car_images.car_id', '=', 'cars.id')
            ->orderBy('created_at', 'desc')->limit(3)->get();
        return view('client.pages.home.home', ['cars' => $cars]);
    }
}
