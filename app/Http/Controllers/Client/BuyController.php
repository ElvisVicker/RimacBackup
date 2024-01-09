<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBuyerRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BuyController extends Controller
{
    public function store(StoreBuyerRequest $request, string $id)
    {
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
            // 0 = Buy, 1 = Rent
            "type" => $request->type,
            "day" => $request->day ?? 0,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);
        $message = $check ? 'Created Buyer Success' : 'Created Buyer Fail';
        return redirect()->route('client.cars')->with('message', $message);
    }
}
