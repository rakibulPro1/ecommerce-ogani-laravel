<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.category.index', compact('categories'));
    }

    // ========== store category============
    public function store(Request $request)
    {
        $request->validate([
            'category_name'=> 'required|unique:categories,category_name'
        ]);

        Category::insert([
            'category_name' => $request->category_name,
            'created_at' => Carbon::now()
        ]);
        return Redirect()->back()->with('success', "Category Added");
        
    }

    // =========== edit category =========== 
     public function edit($cat_id){
        $category = Category::find($cat_id);
        return view('admin.category.edit', compact('category'));
     }

    //  ========== update Category
    public function update(Request $request)
    {
        $cat_id = $request->category_id;
        dump($cat_id);
        
        Category::find($cat_id)->update([
            'category_name' => $request->category_name,
            'updated_at' => Carbon::now()
            
        ]);
        return Redirect()->route('admin.category')->with('category_updated', "Category Updated Successfully.!");
        
    }

    // ============= Delete category ============================ 
    public function delete($cat_id){
        $cat_id = Category::find($cat_id)->delete();
        return Redirect()->back();
    }

}