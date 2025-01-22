<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DefaultAttribute;

class ProductAttributeController extends Controller
{
    public function index(){
        $allattributes = DefaultAttribute::all();
        return view('admin.product_attribute.create');
    }

    public function manage(){
        $allattributes = DefaultAttribute::all();
        return view('admin.product_attribute.manage', compact('allattributes'));
    }

    public function createattribute(Request $request){
        $validate_data = $request->validate([
            'attribute_value'=> 'unique:default_attributes|max:100|min:1',
        ]);

        DefaultAttribute::create($validate_data);

        return redirect()->back()->with('message', 'Default Attribute Added Successfully');
    }

    public function showattribute($id){
        $attri_info = DefaultAttribute::find($id);
        return view('admin.product_attribute.edit', compact('attri_info'));

        // return redirect()->back()->with('message', 'Category Added Successfully');
    }

    public function updateattribute(Request $request, $id){
        $attri = DefaultAttribute::findOrFail($id);
        $validate_data = $request->validate([
            'attribute_value'=> 'unique:default_attributes|max:100|min:1',
        ]);
        $attri->update($validate_data);

        return redirect()->back()->with('message', 'Attribute Updated Successfully');
    }

    public function deleteattribute($id){
        DefaultAttribute::findOrFail($id)->delete();
        // $validate_data = $request->validate([
        //     'category_name'=> 'unique:categories|max:100|min:5',
        // ]);
        // $category->update($validate_data);

        return redirect()->back()->with('message', 'Attribute Deleted Successfully');
    }
}
