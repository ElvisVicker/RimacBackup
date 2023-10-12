<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

class ChartController extends Controller
{
    public function index()
    {





        $accountNumber = DB::table('users')
            ->selectRaw('status, count(status) as number')
            ->groupBy('status')
            ->get();


        $totalAcc = 0;
        foreach ($accountNumber as $data) {
            $totalAcc += $data->number;
        };


        $carNumber = DB::table('cars')
            ->selectRaw('status, count(status) as number')
            ->groupBy('status')
            ->get();


        $totalCar = 0;
        foreach ($carNumber as $data) {
            $totalCar += $data->number;
        };

        $labelArrayCategory = [];
        $dataArrayCategory = [];
        $carDatasCategory = DB::table('cars')
            ->leftJoin('car_categories', 'cars.car_category_id', '=', 'car_categories.id')
            ->selectRaw('car_categories.name, count(cars.car_category_id) as number ')
            ->groupBy('car_categories.name')
            ->get();
        foreach ($carDatasCategory as $data) {
            $labelArrayCategory[] = [$data->name];
            $dataArrayCategory[] = [$data->number];
        }



        $labelArrayBrand = [];
        $dataArrayBrand = [];
        $carDatasBrand = DB::table('cars')
            ->leftJoin('brands', 'cars.brand_id', '=', 'brands.id')
            ->selectRaw('brands.name, count(cars.brand_id) as number ')
            ->groupBy('brands.name')
            ->get();


        foreach ($carDatasBrand as $data) {
            $labelArrayBrand[] = [$data->name];
            $dataArrayBrand[] = [$data->number];
        }




















        return view(
            'admin.pages.chart.chart',
            [
                'labelArrayCategory' => $labelArrayCategory,
                'dataArrayCategory' => $dataArrayCategory,

                'labelArrayBrand' => $labelArrayBrand,
                'dataArrayBrand' => $dataArrayBrand,
                'accountNumber' => $accountNumber,
                'totalAcc' => $totalAcc,
                'carNumber' => $carNumber,
                'totalCar' => $totalCar

            ]
        );
    }
}
