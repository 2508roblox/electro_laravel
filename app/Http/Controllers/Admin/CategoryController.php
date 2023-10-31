<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.category.index',[
            'categories' => Category::all()
          ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

      return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Category $category)
    {
       $formField = $request->validate([
        "name" => 'required',
        "image" => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        "slug" => 'required',
        "title" => 'required',
        "description" => 'required',
        "status" =>'required',
        "seo_description" =>'required',

       ]);
       $formField['publish_date'] = $formField['status'] == 'Scheduled' ?  $publishDate : date("d/m/Y");
       if ($request->hasFile('image')) {
        $path = $request->file('image')->store('images','public');
        $formField['image'] = $path;


    }

       $category->create($formField);
       return redirect('admin/category')->with('message', 'Category created successfully');
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
        return view('admin.category.edit', ['category' => Category::find($id)]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $formField = $request->validate([
            "name" => 'required',
            "image" => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            "slug" => 'required',
            "title" => 'required',
            "description" => 'required',
            "status" =>'required',
            "seo_description" =>'required',

           ]);
           $formField['publish_date'] = $formField['status'] == 'Scheduled' ?  $publishDate : date("d/m/Y");

           if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images','public');
            $formField['image'] = $path;

            }
            $category = Category::find($id);

            $category->update($formField );



           return redirect('admin/category')->with('message', 'Category created successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

       Category::destroy($id);
       return redirect('admin/category')->with('message', 'Category deleted successfully');
    }
}
