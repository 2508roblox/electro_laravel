<?php
namespace App\Http\Controllers\Admin;

use App\Models\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colors = Color::all();
        return view('admin.color.index', compact('colors'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.color.create' );

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Color $color)
    {
        $formField = $request->validate([
            "name" => 'required',

            "code" => 'required',
            "status" => 'nullable',


           ]);
           $formField['status'] = $formField['status'] == 'published' ?  '1' : '0';

           $color->create($formField);
           return redirect('admin/color')->with('message', 'color created successfully');
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
    public function edit( $id)
    {
        $color = Color::find($id);
        return view('admin.color.edit', compact('color'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData  = $request->validate([

            "name"=> 'required|max:255',
            "code"=> 'required',

            "status"=> 'nullable',

           ]);


        // create
        $validateData['status'] = $validateData['status'] == 'published' ?  '1' : '0';
        $color = Color::find($id);
       $color->update($validateData);


     // product_imgs


    return redirect('/admin/color') ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        Color::destroy($id);
        return redirect('admin/color')->with('message', 'Category deleted successfully');
    }
}
