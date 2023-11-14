<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();
       return view('admin.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.brand.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'status' => 'nullable',
        ]);

        $validatedData['status'] = $validatedData['status'] == 'published' ? '1' : '0';
        Brand::create($validatedData);
        return redirect('admin/brand')->with('message','brand has been created successfully!');
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
    public function edit($id)
    {
        $brand = brand::find($id);
        $categories = Category::all();
        return view('admin.brand.edit', compact('brand', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'status' => 'nullable',
        ]);

        $validatedData['status'] = $request->has('status') ? '1' : '0';
        Brand::find($id)->update($validatedData);

        return redirect()->route('admin.brand.list')->with('message', 'Brand updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $brand = brand::find($id);
        $brand->delete();
        return redirect('admin/brand');
    }
}
