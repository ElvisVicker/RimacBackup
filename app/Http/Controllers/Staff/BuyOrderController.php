<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BuyOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $buyers = DB::table('buyers')
        //     ->select('buyers.*', 'cars.name as car_name', 'cars.price as price')
        //     ->join('cars', 'cars.id', '=', 'car_id')
        //     ->where('type', '=', '1')
        //     ->orderBy('created_at', 'desc')
        //     // ->paginate(10);
        //     ->get();



        // dd($buyers);


        // foreach ($buyers as $buyer) {
        //     DB::table('buy_orders')->insert([
        //         "buyer_id" => $buyer->id,
        //         "first_name" => $buyer->first_name,
        //         "last_name" => $buyer->last_name,
        //         "email" => $buyer->email,
        //         "phone_number" => $buyer->phone_number,
        //         "car_id" => $buyer->car_id,
        //         "car_name" => $buyer->car_name,
        //         "price" => $buyer->price,
        //         "staff_id" => $buyer->staff_id,
        //         "staff_name" => $buyer->staff_name,
        //         // 1 = Buy, 0 = Rent
        //         "created_at" => Carbon::now(),
        //         "updated_at" => Carbon::now()
        //     ]);
        // };



        $buy_orders = DB::table('buy_orders')
            ->paginate(10);

        // dd($buy_orders);

        // dd($buyers);
        return view('staff.pages.buy_order.list', ['buy_orders' => $buy_orders]);
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
            "type" => $request->type,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);

        $message = $check ? 'Created successfully' : 'Create failure';
        return redirect()->route('staff.buy_order.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $buy_order = DB::table('buy_orders')->find($id);

        return view('staff.pages.buy_order.detail', ['buy_order' => $buy_order]);
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
        // $check = DB::table('buyers')->where('id', '=', $id)->update([
        //     "updated_at" => Carbon::now()
        // ]);

        // $message = $check ? 'Tao san pham thanh cong' : 'Tao san pham that bai';
        // return redirect()->route('staff.buy_order.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = DB::table('buyers')->delete($id);
        $message = $result ? 'Deleted successfully' : 'Delete failure';
        return redirect()->route('staff.buy_order.index')->with('message', $message);
    }
}
