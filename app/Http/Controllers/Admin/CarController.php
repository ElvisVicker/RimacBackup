<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCarRequest;
use App\Models\Car;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CarController extends Controller
{
    public function index()
    {
        $cars = DB::table('cars')
            ->select(
                'cars.*',
                'car_categories.name as car_category_name',
                'car_categories.rent_price as car_category_rent_price',
                'brands.name as brand_name',
                'brands.image as brand_image',
                'car_images.name as car_image'
            )
            ->join('car_categories', 'cars.car_category_id', '=', 'car_categories.id')
            ->join('brands', 'cars.brand_id', '=', 'brands.id')
            ->leftJoin('car_images', 'car_images.car_id', '=', 'cars.id')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('admin.pages.car.list', ['cars' => $cars]);
    }

    public function create()
    {
        $carCategories = DB::table('car_categories')->whereNull('deleted_at')->where('status', '=', 1)->get();
        $brands = DB::table('brands')->whereNull('deleted_at')->where('status', '=', 1)->get();

        return view('admin.pages.car.create', ['carCategories' => $carCategories, 'brands' => $brands]);
    }

    public function store(StoreCarRequest $request)
    {
        $check = DB::table('cars')->insert([
            "name" => $request->name,
            "slug" => $request->slug,
            "price" => $request->price,
            "description" => $request->description,
            "model" => $request->model,
            "color" => $request->color,
            "fueltype" => $request->fueltype,
            "year" => $request->year,
            "video" => $request->video,
            "sittingfor" => $request->sittingfor,
            "transmission_type" => $request->transmission_type,
            "width" => $request->width,
            "height" => $request->height,
            "length" => $request->length,
            "wheelbase" => $request->wheelbase,
            "combined" => $request->combined,
            "motorway" => $request->motorway,
            "urban" => $request->urban,
            "emission_co2" => $request->emission_co2,
            "engine_size" => $request->engine_size,
            "maxKw" => $request->maxKw,
            "maxHp" => $request->maxHp,
            "acceleration" => $request->acceleration,
            "status" => $request->status,
            "extra_equipment" => $request->extra_equipment,
            "brand_id" => $request->brand_id,
            "car_category_id" => $request->car_category_id,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);

        $message = $check ? 'Created Car Success' : 'Created Car Fail';
        return redirect()->route('admin.car.index')->with('message', $message);
    }

    public function show(string $id)
    {
        $car = DB::table('cars')->find($id);
        $carCategories = DB::table('car_categories')->whereNull('deleted_at')->where('status', '=', 1)->get();
        $brands = DB::table('brands')->whereNull('deleted_at')->where('status', '=', 1)->get();
        return view('admin.pages.car.detail', ['car' => $car, 'carCategories' => $carCategories, 'brands' => $brands]);
    }

    public function edit(string $id)
    {
    }

    public function update(StoreCarRequest $request, string $id)
    {
        $check = DB::table('cars')->where('id', '=', $id)->update([
            "name" => $request->name,
            "slug" => $request->slug,
            "price" => $request->price,
            "description" => $request->description,
            "model" => $request->model,
            "color" => $request->color,
            "fueltype" => $request->fueltype,
            "year" => $request->year,
            "video" => $request->video,
            "sittingfor" => $request->sittingfor,
            "transmission_type" => $request->transmission_type,
            "width" => $request->width,
            "height" => $request->height,
            "length" => $request->length,
            "wheelbase" => $request->wheelbase,
            "combined" => $request->combined,
            "motorway" => $request->motorway,
            "urban" => $request->urban,
            "emission_co2" => $request->emission_co2,
            "engine_size" => $request->engine_size,
            "maxKw" => $request->maxKw,
            "maxHp" => $request->maxHp,
            "acceleration" => $request->acceleration,
            "status" => $request->status,
            "extra_equipment" => $request->extra_equipment,
            "brand_id" => $request->brand_id,
            "car_category_id" => $request->car_category_id,
            "updated_at" => Carbon::now()
        ]);
        $message = $check ? 'Updated Car Success' : 'Updated Car Fail';
        return redirect()->route('admin.car.index')->with('message', $message);
    }

    public function destroy(string $id)
    {
        $carData = Car::find($id);
        $carData->delete();
        return redirect()->route('admin.car.index')->with('message', 'Deleted Car Success');
    }

    public function restore(string $id)
    {
        $carData = Car::withTrashed()->find($id);
        $carData->restore();
        return redirect()->route('admin.car.index')->with('message', 'Restored Car Success');
    }

    public function createSlug(Request $request)
    {
        return response()->json(['slug' => Str::slug($request->name, '-')]);
    }
}
