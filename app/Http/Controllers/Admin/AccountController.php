<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\StoreAccountRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accounts = DB::table('users')->orderBy('created_at', 'desc')->paginate(10);
        // $accounts = DB::table('accounts')->get();
        return view('admin.pages.account.list', ['accounts' => $accounts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.account.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProfileUpdateRequest $request)
    {

        if ($request->hasFile('image')) {
            $fileOriginalName =  $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileOriginalName, PATHINFO_FILENAME);
            $fileName .= '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images'),  $fileName);
        }
        // dd($request->all());
        $check = DB::table('users')->insert([
            "name" => $request->name,
            "middle_name" => $request->middle_name,
            "last_name" => $request->last_name,
            "gender" => $request->gender,
            "email" => $request->email,
            // "password" => $request->password,
            "password" => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            "phone_number" => $request->phone_number,
            "address" => $request->address,
            "role" => $request->role,
            "image" => $fileName ?? null,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
            "status" => $request->status,
            "email_verified_at" => Carbon::now(),
            "remember_token" =>     Str::random(10)
        ]);


        $message = $check ? 'Created successfully' : 'Create failure';
        return redirect()->route('admin.account.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $account = DB::table('users')->find($id);
        return view('admin.pages.account.detail', ['account' => $account]);
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
    public function update(ProfileUpdateRequest $request, string $id)
    {
        $account = DB::table('users')->find($id);
        $oldImageFileName = $account->image;
        if ($request->hasFile('image')) {
            $fileOriginalName =  $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileOriginalName, PATHINFO_FILENAME);
            $fileName .= '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images'),  $fileName);

            if (!is_null($oldImageFileName) && file_exists('images/' . $oldImageFileName)) {
                unlink('images/' . $oldImageFileName);
            }
        }

        $check = DB::table('users')->where('id', '=', $id)->update([
            "name" => $request->name,
            "middle_name" => $request->middle_name,
            "last_name" => $request->last_name,
            "gender" => $request->gender,
            "email" => $request->email,
            // "password" => $request->password,
            "password" => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            "phone_number" => $request->phone_number,
            "address" => $request->address,
            "role" => $request->role,
            "status" => $request->status,
            "image" => $fileName ?? $oldImageFileName,
            "updated_at" => Carbon::now(),
            "email_verified_at" => Carbon::now(),
            "remember_token" => Str::random(10)
        ]);


        $message = $check ? 'Tao san pham thanh cong' : 'Tao san pham that bai';
        return redirect()->route('admin.account.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $account = DB::table('users')->find($id);
        $image = $account->image;
        if (!is_null($image) && file_exists('images/' . $image)) {
            unlink('images/' . $image);
        }

        // $result = DB::table('users')->delete($id);
        // $message = $result ? 'Deleted successfully' : 'Delete failure';
        // return redirect()->route('admin.account.index')->with('message', $message);




        $brandData = User::find($id);
        $brandData->delete();
        return redirect()->route('admin.account.index')->with('message', 'xoa san pham thanh cong');
    }


    public function restore(string $id)
    {
        //Eloquent
        $brandData = User::withTrashed()->find($id);
        // dd($id);
        $brandData->restore();

        return redirect()->route('admin.account.index')->with('message', 'khoi phuc san pham thanh cong');
    }
}
