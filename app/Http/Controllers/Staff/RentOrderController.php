<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RentOrderController extends Controller
{
    public function index()
    {
        $rent_orders = DB::table('rent_orders')
            ->select(
                'rent_orders.id as id',
                'rent_orders.total_price as total_price',
                'rent_orders.created_at',
                'buyers.id as buyer_id',
                'buyers.first_name as cus_first_name',
                'buyers.last_name as cus_last_name',
                'buyers.day as rent_day',
                'cars.id as car_id',
                'cars.name as car_name',
                'car_categories.rent_price as car_rent_price',
                'users.id as staff_id',
                'users.name as staff_first_name',
                'users.last_name as staff_last_name',
            )
            ->join('cars', 'cars.id', '=', 'car_id')
            ->join('buyers', 'buyers.id', '=', 'buyer_id')
            ->join('users', 'users.id', '=', 'staff_id')
            ->join('car_categories', 'car_categories.id', '=', 'cars.car_category_id')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('staff.pages.rent_order.list', ['rent_orders' => $rent_orders]);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(string $id)
    {
        $rent_order = DB::table('rent_orders')->where('id', $id)->get();
        $buyer = DB::table('buyers')->where('id', '=', $rent_order[0]->buyer_id)->get();
        $car = DB::table('cars')
            ->where('cars.id', '=', $rent_order[0]->car_id)
            ->join('car_categories', 'car_categories.id', '=', 'cars.car_category_id')
            ->get();
        $user = DB::table('users')->where('id', '=', $rent_order[0]->staff_id)->get();
        return view(
            'staff.pages.rent_order.detail',
            [
                'rent_order' => $rent_order,
                'buyer' => $buyer,
                'car' => $car,
                'user' => $user
            ]
        );
    }

    public function edit(string $id)
    {
    }

    public function update(Request $request, string $id)
    {
        return redirect()->route('staff.rent_order.index');
    }

    public function destroy(string $id)
    {
    }
}
