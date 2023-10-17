<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBuyerRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BuyerController extends Controller
{
    public function index()
    {
        $buyers = DB::table('buyers')
            ->select(
                'buyers.*',
                'cars.name as car_name',
                'cars.price as price',
                'cars.status as car_status',
                'car_categories.rent_price as rent_price'
            )
            ->join('cars', 'cars.id', '=', 'car_id')
            ->join('car_categories', 'cars.car_category_id', '=', 'car_categories.id')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('staff.pages.buyer.list', ['buyers' => $buyers]);
    }

    public function create()
    {
    }

    public function store(StoreBuyerRequest $request)
    {
    }

    public function show(string $id)
    {
        $buyer = DB::table('buyers')->find($id);
        return view('staff.pages.buyer.detail', ['buyer' => $buyer]);
    }

    public function edit(string $id)
    {
    }

    public function update(StoreBuyerRequest $request, string $id)
    {
        $check = DB::table('buyers')->where('id', '=', $id)->update([
            "status" => $request->status === null ? 1 : $request->status,
            // "status" => $request->status,
            "updated_at" => Carbon::now()
        ]);

        $message = $check ? 'Updated Buyer Success' : 'Updated Buyer Fail';
        return redirect()->route('staff.buyer.index')->with('message', $message);
    }

    public function destroy(string $id)
    {
        $result = DB::table('buyers')->delete($id);
        $message = $result ? 'Deleted Buyer Success' : 'Deleted Buyer Fail';
        return redirect()->route('staff.buyer.index')->with('message', $message);
    }

    public function sendToOrder(string $id)
    {
        $buyer = DB::table('buyers')->where('buyers.id', '=', $id)
            ->select('buyers.*', 'cars.name as car_name', 'cars.price as price', 'car_categories.rent_price as rent_price')
            ->join('cars', 'cars.id', '=', 'car_id')
            ->join('car_categories', 'cars.car_category_id', '=', 'car_categories.id')
            ->get();

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
                return redirect()->route('staff.buyer.index')->with('message', 'Sent Successfully');
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
                return redirect()->route('staff.buyer.index')->with('message', 'Sent Successfully');
            } else {
                return redirect()->route('staff.buyer.index')->with('message', 'Sent Fail');
            }
        } else {
            return redirect()->route('staff.buyer.index')->with('message', 'Check Before Send');
        }
    }
}
