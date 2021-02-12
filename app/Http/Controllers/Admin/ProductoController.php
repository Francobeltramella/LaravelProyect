<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }


    public function index()
    {
         $productos = Product::all();
         $categorias= Category::all();
         return view('admin.productos.index',[
             'productos'=>$productos,
             'categorias'=>$categorias
         ]);
    }

    public function store(Request $request){
        $product= new Product();
        $product->name=$request->name;
        $product->description=$request->description;
        $product->category_id=$request->category_id;


        if($request->hasFile("imgProduct")){
            $file=$request->file('imgProduct');
            $destinationPath ='images/productos/';
            $fileName= time(). '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file(('imgProduct'))->move($destinationPath,$fileName);
            $product->imgProduct = $destinationPath.$fileName;


        }

        $product->save();
        return redirect()->back();

    }


    public function update(Request $request, $productId)
    {

        $product=Product::find($productId);
        $product->name=$request->name;
        $product->description=$request->description;
        $product->category_id=$request->category_id;
        $product->save();

        return redirect()->back();

    }
    
    public function delete(Request $request, $productId)
{

    $product=Product::find($productId);
    $product->delete();
    return redirect()->back();

}


}
