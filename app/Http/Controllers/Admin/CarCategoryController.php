<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCarCategoryRequest;
use App\Models\CarCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $carCategories = DB::table('car_categories')->orderBy('created_at', 'desc')->paginate(10);
        // ->when(!$request->color == null, function ($query) use ($request) {
        //     $query->where('color', $request->color);
        // }, function ($query) {
        //     $query->where('color', '<>', null);
        // })

        // dd($request->sortBy);


        // ->when(!$request->fueltype == null, function ($query) use ($request) {
        //     $query->where('fueltype', $request->fueltype);
        // }, function ($query) {
        //     $query->where('fueltype', '<>', null);
        // })

        // $carCategories = CarCategory::withTrashed()->paginate(10);


        $carCategories = DB::table('car_categories')->orderBy('created_at', 'desc')->paginate(10);

        // dd($carCategories);

        return view('admin.pages.car_category.list', ['carCategories' => $carCategories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.car_category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCarCategoryRequest $request)
    {
        $check = DB::table('car_categories')->insert([
            "name" => $request->name,
            "description" => $request->description,
            "rent_price" => $request->rent_price,
            "status" => $request->status,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);

        $message = $check ? 'Created successfully' : 'Create failure';
        return redirect()->route('admin.car_category.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $carCategory = DB::table('car_categories')->find($id);
        return view('admin.pages.car_category.detail', ['carCategory' => $carCategory]);
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
    public function update(StoreCarCategoryRequest $request, string $id)
    {

        $check = DB::table('car_categories')->where('id', '=', $id)->update([
            "name" => $request->name,
            "description" => $request->description,
            "rent_price" => $request->rent_price,
            "status" => $request->status,
            "updated_at" => Carbon::now()
        ]);

        $message = $check ? 'Tao san pham thanh cong' : 'Tao san pham that bai';
        return redirect()->route('admin.car_category.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     $result = DB::table('car_categories')->delete($id);
    //     $message = $result ? 'Deleted successfully' : 'Delete failure';
    //     return redirect()->route('admin.car_category.index')->with('message', $message);
    // }
    public function destroy(string $id)
    {
        //Eloquent
        $carCategoryData = CarCategory::find($id);
        $carCategoryData->delete();
        return redirect()->route('admin.car_category.index')->with('message', 'xoa san pham thanh cong');
    }


    public function restore(string $id)
    {
        //Eloquent
        $carCategoryData = CarCategory::withTrashed()->find($id);
        // dd($id);


        $carCategoryData->restore();

        return redirect()->route('admin.car_category.index')->with('message', 'khoi phuc san pham thanh cong');
    }
}
