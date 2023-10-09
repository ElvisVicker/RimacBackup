<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RentOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rent_orders = DB::table('rent_orders')
            ->select(
                'rent_orders.id as id',
                'rent_orders.created_at',
                'buyers.id as buyer_id',
                'buyers.first_name as cus_first_name',
                'buyers.last_name as cus_last_name',
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






            // ->orderBy('created_at', 'desc')
            // // ->paginate(10);
            ->get();




        // ->paginate(10);

        dd($rent_orders);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
