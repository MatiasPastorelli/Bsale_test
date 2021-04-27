<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Validator;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {           
        $categorys = Category::get();
        $products = Product::orderby('category','desc');

        //si se encuentra un nombre para buscar se agregara como condicion al la consulta
        if($request->name)
        {
            //dd($request->name);
            $products = $products->where('name','like','%'. $request->name . '%');
        }
         //si se encuentra una categoria para buscar se agregara como condicion al la consulta
        if($request->category)
        {
            //dd($request->category);
            if($request->category != "")
            {
                 //dd($request->category);
                $products = $products->where('category',$request->category);
            }
        }

        $products = $products->paginate(8);

        return view('product.index',compact('products','categorys'));
    }
}
