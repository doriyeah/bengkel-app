<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index(){
        $category = Category::all();
        return view('backend.contents.barang-category', compact('category'));
    }

    public function store(Request $request){
        $category = new Category($request->only(
            'nama'
        ));
        $category->save();
        return redirect()->route('index_category');
    }

    public function destroy($id){
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('index_category');
    }

    public function update(Request $request){
        $category = Category::findOrFail($request->category_id);
        $category->update($request->all());
         return redirect()->back();
    }

    public function apiDelete($id){
        $category = Category::findOrFail($id);
        $category->delete();
        return response()->json(['succes' => true],200 );
    }
}
