<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    public function read_category(){

        $categories = Category::all();

        return view('admin.read_category',compact('categories'));
    }

    public function add_category(){

        return view('admin.add_category');
    }

    public function create_category(Request $request){

        $category = new Category;


        $category->category_name = $request->category_name;

        $category->save();

        return redirect()->route('read_category');

    }

    public function delete_category($id){

        $category = Category::find($id);
  
        $category->delete();

        return redirect()->back();

    }



    public function edit_category($id){

        $category = Category::find($id);

        return view('admin.edit_category',compact('category'));

        
    }

    public function update_category(Request $request, $id){

        $category= Category::find($id);

        $category->category_name = $request->category_name;


        $category->save();

        return redirect()->route('read_category');

    }
}