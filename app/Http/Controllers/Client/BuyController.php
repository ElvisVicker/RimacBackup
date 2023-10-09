<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BuyController extends Controller
{
    public function store(Request $request, string $id)
    {
        // dd($request->all());
        $car = DB::table('cars')->where('id', $id)->get();
        $check = DB::table('buyers')->insert([
            "first_name" => $request->first_name,
            "middle_name" => $request->middle_name,
            "last_name" => $request->last_name,
            "address" => $request->address,
            "email" => $request->email,
            "phone_number" => $request->phone_number,
            "gender" => $request->gender,
            "status" => '0',
            "car_id" => $car[0]->id,
            // 1 = Buy, 2 = Rent
            "type" => $request->type,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);
        $message = $check ? 'Created successfully' : 'Create failure';
        return redirect()->route('client.home')->with('message', $message);
    }
}
