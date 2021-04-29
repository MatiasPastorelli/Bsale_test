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
        try {
            /**
             * Si se encuentra una variable de nombre, agregara a la consulta una busqueda por nombre
             */
            if($request->name)
            {
                //dd($request->name);
                $products = $products->where('name','like','%'. $request->name . '%');
            }
            /**
             * Si se encuentra una variable de categoria, agregara a la consulta una busqueda por categoria
             */
            if($request->category)
            {
                //dd($request->category);
                if($request->category != "")
                {
                     //dd($request->category);
                    $products = $products->where('category',$request->category);
                }
            }
    
            $products = $products->get();
            
            /**
            * Mandara un mensaje si el arreglo viene en 0
            */
            if(sizeof($products) == 0)
            {
                toastr()->error('No se encuentra el producto');
                return redirect('/');
            }

            /**
             * Se usa el foreach para recorrer el arreglo, si encuentra un dato con imagen en 
             * null, reemplazara el dato por una imagen en blanco.
             */
            foreach ($products as $p) {
                if($p->url_image == '')
                {
                    $p->url_image = 'img/list/1.png';
                }
            }

            
            return view('product.index',compact('products','categorys'));

       } catch (Exception $e) {
           /**
            * retornara un error
            */
            toastr()->error($e->getMessage());
            return redirect('/');
       }
    }
}
