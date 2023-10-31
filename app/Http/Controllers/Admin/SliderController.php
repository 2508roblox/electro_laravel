<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create' );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Slider $slider)
    {
        $formField = $request->validate([
            "image" => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            "title" => 'required',
            "description" => 'required',
            "status" =>'required',

           ]);
        $formField['status'] = $formField['status'] == 'published' ? '1' : '0';

           if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images','public');
            $formField['image'] = $path;


        }

           $slider->create($formField);
           return redirect('admin/slider')->with('message', 'slider created successfully');
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
        return view('admin.slider.edit', ['slider' => Slider::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $formField = $request->validate([
            "image" => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            "title" => 'required',
            "description" => 'required',
            "status" =>'nullable',

           ]);
           $formField['status'] = $formField['status'] == 'published' ? '1' : '0';


           if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images','public');
            $formField['image'] = $path;

            }
            $slider = Slider::find($id);

            $slider->update($formField);



           return redirect('admin/slider')->with('message', 'slider created successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        Slider::destroy($id);
        return redirect('admin/slider')->with('message', 'Slider deleted successfully');
    }
}
