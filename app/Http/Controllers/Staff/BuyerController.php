<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BuyerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buyers = DB::table('buyers')
            ->select('buyers.*', 'cars.name as car_name', 'cars.price as price', 'car_categories.rent_price as rent_price')
            ->join('cars', 'cars.id', '=', 'car_id')
            ->join('car_categories', 'cars.id', '=', 'car_categories.id')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        // ->get();


        return view('staff.pages.buyer.list', ['buyers' => $buyers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $check = DB::table('buyers')->insert([
            "first_name" => $request->first_name,
            "middle_name" => $request->middle_name,
            "last_name" => $request->last_name,
            "email" => $request->email,
            "phone_number" => $request->phone_number,
            "gender" => $request->gender,
            "status" => $request->status,

            // 1 = Buy, 2 = Rent
            "type" => $request->type,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);
        $message = $check ? 'Created successfully' : 'Create failure';
        return redirect()->route('staff.buyer.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $buyer = DB::table('buyers')->find($id);

        return view('staff.pages.buyer.detail', ['buyer' => $buyer]);
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
    public function update(Request $request, string $id)
    {
        $check = DB::table('buyers')->where('id', '=', $id)->update([
            "staff_id" => auth()->user()->id,
            "staff_name" => auth()->user()->name,
            "status" => $request->status,
            "updated_at" => Carbon::now()
        ]);


        // dd($check);
        //================================
        //ERROR
        $buyer = DB::table('buyers')->where('buyers.id', '=', $id)
            ->select('buyers.*', 'cars.name as car_name', 'cars.price as price')
            ->leftJoin('cars', 'cars.id', '=', 'car_id')
            ->get();

        // dd($buyer->get());
        dd($buyer);
        //================================

        DB::table('buy_orders')->insert([
            "buyer_id" => $buyer->id,
            "first_name" => $buyer->first_name,
            "last_name" => $buyer->last_name,
            "email" => $buyer->email,
            "phone_number" => $buyer->phone_number,
            "car_id" => $buyer->car_id,
            "car_name" => $buyer->car_name,
            "price" => $buyer->price,
            "staff_id" => $buyer->staff_id,
            "staff_name" => $buyer->staff_name,
            // 1 = Buy, 0 = Rent
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);














        $message = $check ? 'Tao san pham thanh cong' : 'Tao san pham that bai';
        return redirect()->route('staff.buyer.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    }
}
