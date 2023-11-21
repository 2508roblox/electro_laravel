<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Variant;
use Illuminate\Http\Request;

class VariantController extends Controller
{
    public function index()
    {
        return view('admin.variant.index',[
            'variants' => Variant::all()
          ]);
    }
    public function create()
    {

      return view('admin.variant.create');
    }
    public function store(Request $request, Variant $variant)
    {
       $formField = $request->validate([
        "value" => 'required',

       ]);


       $variant->create($formField);
       return redirect('admin/variants')->with('message', 'variants created successfully');
    }
    public function edit(string $id)
    {
        return view('admin.variant.edit', ['variant' => Variant::find($id)]);

    }
    public function update(Request $request, string $id)
    {

        $formField = $request->validate([
            "value" => 'required',

           ]);

            $variant = Variant::find($id);

            $variant->update($formField );



           return redirect('admin/variants')->with('message', 'Category created successfully');
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
