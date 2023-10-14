<?php

namespace App\Http\Controllers\Admin;

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
        $buy_orders = DB::table('buy_orders')
            ->select(
                'buy_orders.id as id',
                'buy_orders.total_price as total_price',
                'buy_orders.created_at',
                'buyers.id as buyer_id',
                'buyers.first_name as cus_first_name',
                'buyers.last_name as cus_last_name',
                'cars.id as car_id',
                'cars.name as car_name',
                'cars.price as car_price',
                'cars.status as car_status',
                'users.id as staff_id',
                'users.name as staff_first_name',
                'users.last_name as staff_last_name',
            )
            ->join('cars', 'cars.id', '=', 'car_id')
            ->join('buyers', 'buyers.id', '=', 'buyer_id')
            ->join('users', 'users.id', '=', 'staff_id')


            // ->orderBy('created_at', 'desc')
            // // ->paginate(10);
            // ->get();

            ->paginate(10);
        // dd($buy_orders);



        // <td>{{ $loop->iteration }}</td>
        // <td>{{ $buy_order->id }}</td>
        // <td>{{ $buy_order->buyer_id }}</td>
        // <td>{{ $buy_order->cus_first_name }}</td>
        // <td>{{ $buy_order->cus_last_name }}</td>
        // <td>{{ $buy_order->car_id }}</td>
        // <td>{{ $buy_order->car_name }}</td>
        // <td>{{ $buy_order->staff_id }}</td>
        // <td>{{ $buy_order->staff_first_name }}</td>


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



        // $buy_orders = DB::table('buy_orders')
        //     ->paginate(10);

        // dd($buy_orders);

        // dd($buyers);
        return view('admin.pages.buy_order.list', ['buy_orders' => $buy_orders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $buy_order = DB::table('buy_orders')->where('id', $id)->get();
        $buyer = DB::table('buyers')->where('id', '=', $buy_order[0]->buyer_id)->get();
        $car = DB::table('cars')->where('id', '=', $buy_order[0]->car_id)->get();
        $user = DB::table('users')->where('id', '=', $buy_order[0]->staff_id)->get();

        return view(
            'admin.pages.buy_order.detail',
            [
                'buy_order' => $buy_order,
                'buyer' => $buyer,
                'car' => $car,
                'user' => $user
            ]
        );
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
        // dd($id);
        $check = DB::table('cars')->where('id', '=', $request->car_id)->update([
            "status" => $request->status,
            "updated_at" => Carbon::now()
        ]);

        return redirect()->route('admin.buy_order.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = DB::table('buy_orders')->delete($id);
        $message = $result ? 'Deleted successfully' : 'Delete failure';
        return redirect()->route('admin.buy_order.index')->with('message', $message);
    }
}
