<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function show(){
        $list = Category::all();
        return view('category/list', ['categories'=> $list]);
    }

    function form($id = null){
        $category = new Category();
        if($id != null){
            $category = Category::findOrFail($id);
        }
        return view('category/form', ['category' => $category]);
    }

    function save(Request $request){

        $request->validate([
            'name'=> 'required|max:50',
            'description'=> 'required|max:200'
        ]);

        $category = new Category();
        if($request->id > 0){
            $category = Category::findOrFail($request->id);
        }
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();
        return redirect('/categories')->with('message', 'Categoria guardada');
    }

    function delete($id){        
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect('/categories')->with('message', 'Categoria borrada');
    }
}
