<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    // public function index()
    // {
    //     $carCategories = DB::table('car_categories')->get();
    //     $brands = DB::table('brands')->get();
    //     $colors = DB::table('cars')->distinct()->get('color');
    //     $fueltypies = DB::table('cars')->distinct()->get('fueltype');
    //     $years = DB::table('cars')->distinct()->get('year');

    //     $cars = DB::table('cars')
    //         ->select('cars.*', 'car_categories.name as car_category_name', 'car_categories.rent_price as car_category_rent_price', 'brands.name as brand_name', 'brands.image as brand_image', 'car_images.name as car_image')
    //         ->join('car_categories', 'cars.car_category_id', '=', 'car_categories.id')
    //         ->join('brands', 'cars.brand_id', '=', 'brands.id')
    //         ->leftJoin('car_images', 'car_images.car_id', '=', 'cars.id')
    //         // ->where('brands.name', 'like', $brands)
    //         ->orderBy('created_at', 'desc')
    //         ->paginate(6);

    //     return view('client.pages.cars.cars', [
    //         'cars' => $cars,
    //         'carCategories' => $carCategories,
    //         'brands' => $brands,
    //         'colors' => $colors,
    //         'fueltypies' => $fueltypies,
    //         'years' => $years
    //     ]);
    // }

    public function index(Request $request)
    {

        $carCategories = DB::table('car_categories')->get();
        $brands = DB::table('brands')->get();
        $colors = DB::table('cars')->distinct()->get('color');
        $fueltypies = DB::table('cars')->distinct()->get('fueltype');
        $years = DB::table('cars')->distinct()->get('year');

        $cars = DB::table('cars')
            ->select('cars.*', 'car_categories.name as car_category_name', 'car_categories.rent_price as car_category_rent_price', 'brands.name as brand_name', 'brands.image as brand_image', 'car_images.name as car_image')
            ->join('car_categories', 'cars.car_category_id', '=', 'car_categories.id')
            ->join('brands', 'cars.brand_id', '=', 'brands.id')
            ->leftJoin('car_images', 'car_images.car_id', '=', 'cars.id')
            ->when(!$request->color == null, function ($query) use ($request) {
                $query->where('color', $request->color);
            }, function ($query) {
                $query->where('color', '<>', null);
            })

            ->when(!$request->fueltype == null, function ($query) use ($request) {
                $query->where('fueltype', $request->fueltype);
            }, function ($query) {
                $query->where('fueltype', '<>', null);
            })

            ->when(!$request->category == null, function ($query) use ($request) {
                $query->where('car_category_id', $request->category);
            }, function ($query) {
                $query->where('car_category_id', '<>', null);
            })

            ->when(!$request->brand == null, function ($query) use ($request) {
                $query->where('brand_id', $request->brand);
            }, function ($query) {
                $query->where('brand_id', '<>', null);
            })

            ->when(!$request->year == null, function ($query) use ($request) {
                $query->where('year', $request->year);
            }, function ($query) {
                $query->where('year', '<>', null);
            })

            ->when(!$request->price == null, function ($query) use ($request) {
                if ($request->price == '1') {
                    $query->where('price', '>', 0)->where('price', '<=', 43478);
                } else if ($request->price == '2') {
                    $query->where('price', '>', 43478)->where('price', '<=', 86956);
                } else {
                    $query->where('price', '>', 86956);
                }
            }, function ($query) {
                $query->where('price', '<>', null);
            })



            ->orderBy('created_at', 'desc')
            ->paginate(6);




        // dd($cars);
        // dd($request->price);




        return view('client.pages.cars.cars', [
            'cars' => $cars,
            'carCategories' => $carCategories,
            'brands' => $brands,
            'colors' => $colors,
            'fueltypies' => $fueltypies,
            'years' => $years
        ]);
    }

    public function detail(string $id)
    {

        $car = DB::table('cars')
            ->select('cars.*', 'car_categories.name as car_category_name', 'car_categories.rent_price as car_category_rent_price', 'brands.name as brand_name', 'brands.image as brand_image', 'car_images.name as car_image')
            ->join('car_categories', 'cars.car_category_id', '=', 'car_categories.id')
            ->join('brands', 'cars.brand_id', '=', 'brands.id')
            ->leftJoin('car_images', 'car_images.car_id', '=', 'cars.id')
            ->where('cars.id', $id)
            ->get();
        return view('client.pages.car_detail.car_detail', ['car' => $car]);
    }
}
