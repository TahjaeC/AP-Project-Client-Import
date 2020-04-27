<?php

namespace App\Http\Controllers;
<<<<<<< HEAD

use App\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$cart = session()->remove('cart');
        $products = Products::all();
        return view('home', compact('products'));
    }

    public function display()
    {
        $products = Products::all();
        //$products = Products::orderBy('name', 'category')->get();
        //$products = Products::where('name', 'coffee')->get();
        //$products = Products::latest();

        return view('products',[
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
   /* public function update(Request $up, Products $products)
    {
        $up=$up->get(id);

        if($up->id and $up->stock)
        {
            $cart = session()->get('cart');

            $cart[id]["stock"] = $up->stock;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');
        }
    }*/
    public function update(Request $request, Products $products)
    {
        if($request->id and $request->stock)
        {
            $cart = session()->get('cart');

            $cart[$request->id]["stock"] = $request->stock;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        //
    }

    public function cart()
    {
       //$cart = session()->remove('cart');
        return view('cart');
    }

    public function addToCart($id)
    {
        $products = Products::find($id);

        if(!$products) {

            abort(404);

        }

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart) {

            $cart = [
                    $id => [
                        "id" => $products->id,
                        "name" => $products->name,
                        "stock" => 1,
                        "cost" => $products->cost,
                        "image" => $products->image
                    ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment stock
        if(isset($cart[$id])) {

            $cart[$id]['stock']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');

        }

        // if item not exist in cart then add to cart with stock = 1
       $cart[$id] = [
            "id" => $products->id,
            "name" => $products->name,
            "stock" => 1,
            "cost" => $products->cost,
            "image" => $products->image
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Added to cart successfully!');
    }

    public function remove(Request $request)
   {
        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
        }
=======
use App\User;
use Auth;
use App\Products;
use Illuminate\Http\Request;
use App\Services\ProductService;

/**
 * @group Products controller client side
 * 
 * Connecting to the API from the client
 */
class ProductsController extends Controller
{
    /**
     * @instanceof App\Services\ProductService
     */
    protected $productService;


    public function __construct(ProductService $productService){
        $this->productService = $productService;
    }
    public function searchByName(Request $request)
    {
        $query = $request->input('query');

        $products = $this->productService->searchByName($query);

        return view('search')->with('products',$products);
    }

    public function audio(Request $request)
    {

        $query = $request->input('query');

        $products = Products::where('audio','like', "%$query%")->get();

        return view('audio')->with('products',$products);
    }

    public function image(Request $request)
    {

        $query = $request->input('query');

        $products = Products::where('image','like', "%$query%")->get();

        return view('image')->with('products',$products);
    }

    public function disp()
    {
        $products = $this->productService->disp();
        return view('allItems',['products' => $products]);
    }
    public function display()
    {
        $products = $this->productService->display();

        return view('products',['products'=>$products]);
    }
   
    public function update(Request $r)
    {

        //$id = $r->get('id');
        //The update function below accepts all the details 
        $updatedProductData = $r->all();
        $successMessage = $this->productService->update($updatedProductData);
        return redirect('allItems')->with('message', $successMessage);
    }

    public function create()
    {
        return view ('create');
    }

    public function store(Request $r)
    {
        $data = $r->all();
        //dd($data);
        $products = $this->productService->store($data);
        return redirect('allItems')->with('message', 'Item Successfully added/updated to database');
    }

    public function destroy($id)
    {
        $products = $this->productService->destroy($id);
        //$products->delete();
        return redirect('allItems');
>>>>>>> feature/api-integration
    }
}
