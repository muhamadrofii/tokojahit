<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use Illuminate\Http\Request;

class MasterSubCategoryController extends Controller
{
    public function storesubcat(Request $request){
        $validate_data = $request->validate([
            'subcategory_name'=> 'unique:subcategories|max:100|min:5',
            'category_id' => 'required|exists:categories,id'
        ]);

        Subcategory::create($validate_data);

        return redirect()->back()->with('message', 'Subcategory Added Successfully');
    }

    public function showsubcat($id){
        $subcategory_info = Subcategory::find($id);
        return view('admin.sub_category.edit', compact('subcategory_info'));

        // return redirect()->back()->with('message', 'Category Added Successfully');
    }

    public function updatesubcat(Request $request, $id){
        $subcategory = Subcategory::findOrFail($id);
        $validate_data = $request->validate([
            'subcategory_name'=> 'unique:subcategories|max:100|min:5',
            // 'category_id' => 'required|exists:categories,id'
        ]);
        $subcategory->update($validate_data);

        return redirect()->back()->with('message', 'Subcategory Updated Successfully');
    }

    public function deletesubcat($id){
        Subcategory::findOrFail($id)->delete();
        // $validate_data = $request->validate([
        //     'category_name'=> 'unique:categories|max:100|min:5',
        // ]);
        // $category->update($validate_data);

        return redirect()->back()->with('message', 'Subategory Deleted Successfully');
    }
}
