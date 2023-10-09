<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBuyerRequest;
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
        $buyers = DB::table('buyers')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.pages.buyer.list', ['buyers' => $buyers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.buyer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBuyerRequest $request)
    {

        $check = DB::table('buyers')->insert([
            "first_name" => $request->first_name,
            "middle_name" => $request->middle_name,
            "last_name" => $request->last_name,
            "address" => $request->address,
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
        return redirect()->route('admin.buyer.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $buyer = DB::table('buyers')->find($id);
        return view('admin.pages.buyer.detail', ['buyer' => $buyer]);
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
    public function update(StoreBuyerRequest $request, string $id)
    {
        $check = DB::table('buyers')->where('id', '=', $id)->update([
            "first_name" => $request->first_name,
            "middle_name" => $request->middle_name,
            "last_name" => $request->last_name,
            "address" => $request->address,
            "email" => $request->email,
            "phone_number" => $request->phone_number,
            "gender" => $request->gender,
            "status" => $request->status,
            "type" => $request->type,
            "updated_at" => Carbon::now()
        ]);


        $message = $check ? 'Tao san pham thanh cong' : 'Tao san pham that bai';
        return redirect()->route('admin.buyer.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = DB::table('buyers')->delete($id);
        $message = $result ? 'Deleted successfully' : 'Delete failure';
        return redirect()->route('admin.buyer.index')->with('message', $message);
    }
}
