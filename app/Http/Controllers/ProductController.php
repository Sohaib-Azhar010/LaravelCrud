<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $products = Product::latest()->get();
        // $products = Product::latest()->paginate(5);
        return view("products.index", ["products" =>Product::latest()->paginate(5) ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("products.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validating DATA
        request()->validate([

            "name" => "required",
            "description" => "required",
            "image" => "required|mimes:jpeg,jpg,png,gif|max:10000"
        ]);

        //getting data and moving to DB
        $imageName = time() . "." . $request->image->extension();
        $request->image->move(public_path("products"), $imageName);
        // dd($imageName);
        $product = new Product;
        $product->image = $imageName;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();
        return back()->withSuccess("Product Added Successfuly");

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::where("id", $id)->first();
        
        return view("products.show",["product" => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // dd($id);
        $product = Product::where('id', $id)->first();
        return view('products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        request()->validate([

            "name" => "required",
            "description" => "required",
            "image" => "nullable|mimes:jpeg,jpg,png,gif|max:10000" //size is in kbs
        ]);

        $product= Product::where("id", $id)->first();
        if (isset($request->image)) {

            //getting data and moving to DB
            $imageName = time() . "." . $request->image->extension();
            $request->image->move(public_path("products"), $imageName);
            // $product = new Product;
            $product->image = $imageName;

        }

        // dd($imageName);
        
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();
        return back()->withSuccess("Product Updated Successfuly");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::where("id", $id)->first();
        $product->delete();
        return back()->withSuccess("Product Deleted Successfully");
    }
    
}
