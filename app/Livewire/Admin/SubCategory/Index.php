<?php

namespace App\Livewire\Admin\SubCategory;
use App\Models\SubCategory;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Index extends Component
{
    public $name;
    public  $slug ;
    public $status;
    public function rules () {
        return [
            'name' => 'required',
            'slug' => 'required',
            'cateogry_id' => 'required',
            'status' => 'nullable',
        ];
    }
    public function storeBrand() {
        $validated = $this->validate();
        $validated['status'] = $validated['status'] == 'published' ? '1' : '0';
        Brand::create($validated);


        return   redirect('admin/subcategory');
    }
    public function render()
    {
        $subcategories = SubCategory::all();
        return view('livewire.admin.subcategory.index', compact('subcategories'))->extends('layout.admin')->section('content');
    }
}

