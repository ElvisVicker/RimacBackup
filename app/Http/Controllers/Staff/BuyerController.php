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
            ->join('car_categories', 'cars.car_category_id', '=', 'car_categories.id')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        // ->get();
        // dd($buyers);

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
        // $check = DB::table('buyers')->insert([
        //     "first_name" => $request->first_name,
        //     "middle_name" => $request->middle_name,
        //     "last_name" => $request->last_name,
        //     "address" => $request->address,
        //     "email" => $request->email,
        //     "phone_number" => $request->phone_number,
        //     "gender" => $request->gender,
        //     "status" => $request->status,

        //     // 1 = Buy, 2 = Rent
        //     "type" => $request->type,
        //     "created_at" => Carbon::now(),
        //     "updated_at" => Carbon::now()
        // ]);
        // $message = $check ? 'Created successfully' : 'Create failure';
        // return redirect()->route('staff.buyer.index')->with('message', $message);
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
            "status" => $request->status === null ? 1 : $request->status,
            // "status" => $request->status,
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


    public function sendToOrder(string $id)
    {
        // $buyer = DB::table('buyers')->where('buyers.id', '=', $id)
        //     ->select('buyers.*', 'cars.name as car_name', 'cars.price as price', 'car_categories.rent_price as rent_price')
        //     ->join('cars', 'cars.id', '=', 'car_id')
        //     ->join('car_categories', 'cars.id', '=', 'car_categories.id')
        //     ->get();
        // ================================
        $buyer = DB::table('buyers')->where('buyers.id', '=', $id)
            ->select('buyers.*', 'cars.name as car_name', 'cars.price as price', 'car_categories.rent_price as rent_price')
            ->join('cars', 'cars.id', '=', 'car_id')
            ->join('car_categories', 'cars.car_category_id', '=', 'car_categories.id')
            ->get();
        // ==================================

        // $table->unsignedBigInteger('buyer_id');
        // $table->foreign('buyer_id')->references('id')->on('buyers');
        // $table->unsignedBigInteger('car_id');
        // $table->foreign('car_id')->references('id')->on('cars');
        // $table->unsignedBigInteger('staff_id');
        // $table->foreign('staff_id')->references('id')->on('users');
        // $table->timestamps();

        // dd($buyer);

        if ($buyer[0]->status === 1) {
            if ($buyer[0]->type === 1) {
                DB::table('buy_orders')->insert([
                    "buyer_id" => $buyer[0]->id,
                    "car_id" => $buyer[0]->car_id,
                    "staff_id" => auth()->user()->id,
                    "total_price" => $buyer[0]->price + ((15 / 100) * $buyer[0]->price),
                    // 1 = Buy, 0 = Rent
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now()
                ]);

                DB::table('buyers')->where('id', '=', $id)->update([
                    "send" => 1,
                    "updated_at" => Carbon::now()
                ]);
                return redirect()->route('staff.buyer.index')->with('message', 'Pass');
            } else if ($buyer[0]->type === 0) {
                DB::table('rent_orders')->insert([
                    "buyer_id" => $buyer[0]->id,
                    "car_id" => $buyer[0]->car_id,
                    "staff_id" => auth()->user()->id,
                    "total_price" => $buyer[0]->day * $buyer[0]->rent_price,
                    // 1 = Buy, 0 = Rent
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now()
                ]);

                DB::table('buyers')->where('id', '=', $id)->update([
                    "send" => 1,
                    "updated_at" => Carbon::now()
                ]);
                return redirect()->route('staff.buyer.index')->with('message', 'Pass');
            } else {
                return redirect()->route('staff.buyer.index')->with('message', 'failure');
            }
        } else {
            return redirect()->route('staff.buyer.index')->with('message', 'Test');
        }







        // if ($buyer[0]->status === 1) {
        //     if ($buyer[0]->type === 1) {
        //         DB::table('buy_orders')->insert([
        //             "buyer_id" => $buyer[0]->id,
        //             "first_name" => $buyer[0]->first_name,
        //             "last_name" => $buyer[0]->last_name,
        //             "address" => $buyer[0]->address,
        //             "email" => $buyer[0]->email,
        //             "phone_number" => $buyer[0]->phone_number,
        //             "car_id" => $buyer[0]->car_id,
        //             "car_name" => $buyer[0]->car_name,
        //             "price" => $buyer[0]->price,
        //             "staff_id" => $buyer[0]->staff_id,
        //             "staff_name" => $buyer[0]->staff_name,
        //             // 1 = Buy, 0 = Rent
        //             "created_at" => Carbon::now(),
        //             "updated_at" => Carbon::now()
        //         ]);
        //         $result = DB::table('buyers')->delete($id);
        //         $message = $result ? 'Deleted successfully' : 'Delete failure';
        //         return redirect()->route('staff.buyer.index')->with('message', $message);
        //     } else if ($buyer[0]->type === 0) {
        //         DB::table('rent_orders')->insert([
        //             "buyer_id" => $buyer[0]->id,
        //             "first_name" => $buyer[0]->first_name,
        //             "last_name" => $buyer[0]->last_name,
        //             "address" => $buyer[0]->address,
        //             "email" => $buyer[0]->email,
        //             "phone_number" => $buyer[0]->phone_number,
        //             "car_id" => $buyer[0]->car_id,
        //             "car_name" => $buyer[0]->car_name,
        //             "rent_price" => $buyer[0]->price,
        //             "staff_id" => $buyer[0]->staff_id,
        //             "staff_name" => $buyer[0]->staff_name,
        //             // 1 = Buy, 0 = Rent
        //             "created_at" => Carbon::now(),
        //             "updated_at" => Carbon::now()
        //         ]);
        //         $result = DB::table('buyers')->delete($id);
        //         $message = $result ? 'Deleted successfully' : 'Delete failure';
        //         return redirect()->route('staff.buyer.index')->with('message', $message);
        //     }
        // } else {
        //     return redirect()->route('staff.buyer.index')->with('message', 'Delete failure');
        // }
    }
}
