<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubCategoryController  extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view('admin.subcategory.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.subcategory.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'image' => 'nullable',
            'category_id' => 'required',
            'status' => 'nullable',
        ]);
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images','public');
            $validatedData['image'] = $path;


        }
        $validatedData['status'] = $validatedData['status'] == 'published' ? '1' : '0';
        $category = Category::find($validatedData['category_id']);
        $category->sub_categories()->create($validatedData);
        return redirect('admin/subcategory')->with('message','subcategory has been created successfully!');
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
        $subcategory = SubCategory::find($id);
        $categories = Category::all();

        return view('admin/subcategory/edit', compact('subcategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'image' => 'nullable',
            'category_id' => 'required',

            'status' => 'nullable',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images','public');
            $validatedData['image'] = $path;

            }
        $validatedData['status'] = $validatedData['status'] == 'published' ? '1' : '0';

        SubCategory::find($id)->update($validatedData);
        return redirect('admin/subcategory')->with('message','subcategory updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $subcategory = SubCategory::find($id);
        $subcategory->delete();
        return redirect('admin/subcategory');
    }
}
