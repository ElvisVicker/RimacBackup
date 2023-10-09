<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCarRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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





        // $cars = DB::table('cars')->get();
        // dd($cars);

        // dd($cars);


        // $cars = DB::table('cars')
        //     ->select('cars.*', 'car_categories.name as car_category_name', 'car_categories.rent_price as car_category_rent_price', 'brands.name as brand_name', 'brands.image as brand_image')
        //     ->leftJoin('car_categories', 'cars.car_category_id', '=', 'car_categories.id')
        //     ->leftJoin('brands', 'cars.car_category_id', '=', 'brands.id')
        //     ->orderBy('created_at', 'desc')
        //     ->paginate(10);

        return view('admin.pages.car.list', ['cars' => $cars]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $carCategories = DB::table('car_categories')->whereNull('deleted_at')->where('status', '=', 1)->get();
        $brands = DB::table('brands')->whereNull('deleted_at')->where('status', '=', 1)->get();

        return view('admin.pages.car.create', ['carCategories' => $carCategories, 'brands' => $brands]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCarRequest $request)
    {
        // if ($request->hasFile('image')) {
        //     $fileOriginalName =  $request->file('image')->getClientOriginalName();
        //     $fileName = pathinfo($fileOriginalName, PATHINFO_FILENAME);
        //     $fileName .= '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
        //     $request->file('image')->move(public_path('images'),  $fileName);
        // }
        // dd($request->all());

        $check = DB::table('cars')->insert([
            "name" => $request->name,
            "slug" => $request->slug,
            "price" => $request->price,
            "description" => $request->description,
            "qty" => $request->qty,
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

        $message = $check ? 'Tao san pham thanh cong' : 'Tao san pham that bai';
        return redirect()->route('admin.car.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = DB::table('cars')->find($id);
        $carCategories = DB::table('car_categories')->whereNull('deleted_at')->where('status', '=', 1)->get();

        $brands = DB::table('brands')->whereNull('deleted_at')->where('status', '=', 1)->get();

        return view('admin.pages.car.detail', ['car' => $car, 'carCategories' => $carCategories, 'brands' => $brands]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCarRequest $request, string $id)
    {
        // dd($request->all());
        $check = DB::table('cars')->where('id', '=', $id)->update([
            "name" => $request->name,
            "slug" => $request->slug,
            "price" => $request->price,
            "description" => $request->description,
            "qty" => $request->qty,
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
        $message = $check ? 'Tao san pham thanh cong' : 'Tao san pham that bai';
        return redirect()->route('admin.car.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = DB::table('cars')->delete($id);
        $message = $result ? 'Xoa thanh cong' : 'Xoa that bai';
        return redirect()->route('admin.car.index')->with('message', $message);
    }


    public function createSlug(Request $request)
    {
        return response()->json(['slug' => Str::slug($request->name, '-')]);
    }
}
