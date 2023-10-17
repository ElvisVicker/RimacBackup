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
    public function index()
    {
        $accounts = DB::table('users')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.pages.account.list', ['accounts' => $accounts]);
    }

    public function create()
    {
        return view('admin.pages.account.create');
    }

    public function store(ProfileUpdateRequest $request)
    {
        if ($request->hasFile('image')) {
            $fileOriginalName =  $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileOriginalName, PATHINFO_FILENAME);
            $fileName .= '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images'),  $fileName);
        }

        $check = DB::table('users')->insert([
            "name" => $request->name,
            "middle_name" => $request->middle_name,
            "last_name" => $request->last_name,
            "gender" => $request->gender,
            "email" => $request->email,
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

        $message = $check ? 'Created Account Success' : 'Created Account Fail';
        return redirect()->route('admin.account.index')->with('message', $message);
    }

    public function show(string $id)
    {
        $account = DB::table('users')->find($id);
        return view('admin.pages.account.detail', ['account' => $account]);
    }

    public function edit(string $id)
    {
    }

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

        $message = $check ? 'Updated Account Success' : 'Updated Account Fail';
        return redirect()->route('admin.account.index')->with('message', $message);
    }

    public function destroy(string $id)
    {
        $account = DB::table('users')->find($id);
        $image = $account->image;
        if (!is_null($image) && file_exists('images/' . $image)) {
            unlink('images/' . $image);
        }

        $accountData = User::find($id);
        $accountData->delete();
        return redirect()->route('admin.account.index')->with('message', 'Deleted Account Success');
    }

    public function restore(string $id)
    {
        $accountData = User::withTrashed()->find($id);
        $accountData->restore();
        return redirect()->route('admin.account.index')->with('message', 'Restored Account Success');
    }
}
