<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class CategoriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {
        $categorias = Category::all();
        return view('admin.categorias.index',['categorias'=>$categorias]);
    }

    public function store(Request $request)
    {
        $newcategorias= new Category();

        $newcategorias->name=$request->name;

        $newcategorias->save();
        
        return redirect()->back();
    }

    public function update(Request $request, $categoryId)
    {

        $category=Category::find($categoryId);
        $category->name=$request->name;
        $category->save();

        return redirect()->back();

    }

    public function delete(Request $request, $categoryId)
    {

        $category=Category::find($categoryId);
        $category->delete();
        return redirect()->back();

    }
} 
 