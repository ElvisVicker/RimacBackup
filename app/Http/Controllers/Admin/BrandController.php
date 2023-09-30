<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = DB::table('brands')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.pages.brand.list', ['brands' => $brands]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request)
    {

        if ($request->hasFile('image')) {
            $fileOriginalName =  $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileOriginalName, PATHINFO_FILENAME);
            $fileName .= '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images'),  $fileName);
        }


        $check = DB::table('brands')->insert([
            "name" => $request->name,
            "description" => $request->description,
            "status" => $request->status,
            "image" => $fileName ?? null,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);

        $message = $check ? 'Created successfully' : 'Create failure';
        return redirect()->route('admin.brand.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $brand = DB::table('brands')->find($id);
        return view('admin.pages.brand.detail', ['brand' => $brand]);
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
    public function update(StoreBrandRequest $request, string $id)
    {
        $brand = DB::table('brands')->find($id);
        $oldImageFileName = $brand->image;
        if ($request->hasFile('image')) {
            $fileOriginalName =  $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileOriginalName, PATHINFO_FILENAME);
            $fileName .= '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images'),  $fileName);

            if (!is_null($oldImageFileName) && file_exists('images/' . $oldImageFileName)) {
                unlink('images/' . $oldImageFileName);
            }
        }

        $check = DB::table('brands')->where('id', '=', $id)->update([
            "name" => $request->name,
            "description" => $request->description,
            "status" => $request->status,
            "image" => $fileName ?? $oldImageFileName,
            "updated_at" => Carbon::now()
        ]);


        $message = $check ? 'Tao san pham thanh cong' : 'Tao san pham that bai';
        return redirect()->route('admin.brand.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $account = DB::table('brands')->find($id);
        $image = $account->image;
        if (!is_null($image) && file_exists('images/' . $image)) {
            unlink('images/' . $image);
        }

        $result = DB::table('brands')->delete($id);
        $message = $result ? 'Deleted successfully' : 'Delete failure';
        return redirect()->route('admin.brand.index')->with('message', $message);
    }
}
