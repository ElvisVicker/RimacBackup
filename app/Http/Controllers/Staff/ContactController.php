<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = DB::table('contacts')->orderBy('created_at', 'desc')->paginate(10);
        return view('staff.pages.contact.list', ['contacts' => $contacts]);
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
        $check = DB::table('contacts')->insert([
            "name" => $request->name,
            "email" => $request->email,
            "message" => $request->message,
            "status" => $request->status,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);

        $message = $check ? 'Created successfully' : 'Create failure';
        return redirect()->route('staff.contact.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact = DB::table('contacts')->find($id);
        return view('staff.pages.contact.detail', ['contact' => $contact]);
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
        $check = DB::table('contacts')->where('id', '=', $id)->update([
            "name" => $request->name,
            "email" => $request->email,
            "message" => $request->message,
            "status" => $request->status,
            "updated_at" => Carbon::now()
        ]);

        $message = $check ? 'Tao san pham thanh cong' : 'Tao san pham that bai';
        return redirect()->route('staff.contact.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = DB::table('contacts')->delete($id);
        $message = $result ? 'Deleted successfully' : 'Delete failure';
        return redirect()->route('staff.contact.index')->with('message', $message);
    }
}
