<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Cart;
use App\User;
use App\Products;
use Illuminate\Http\Request;
use App\Services\CartService;

class CartController extends Controller
{
    protected $maxAttempts = 3; // Default is 5
    protected $decayMinutes = 2; // Default is 1
    protected $redirectTo = '/products';


    protected $cartService;


    public function __construct(CartService $cartService){
        $this->cartService = $cartService;
    }

    public function index()
    {
        //doesnt need api
        $userID = 1;
        $cartItems = Cart::session($userID)->getContent();

        return view('cart.index', compact('cartItems'));
    }

    public function add(Products $product){

        //testing ||| dd($product);
        //adding to cart

        $userID = 1;

        Cart::session($userID)->add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->cost,
            'quantity' => 1
        ));

        return redirect('/products');

    }

    public function cart(){
        $params = [
            'title' => 'Shopping Cart Checkout',
        ];

        return view('cart')->with($params);
    }

    public function clear(){
        Cart::clear();

        return back()->with('success',"The shopping cart has successfully beed added to the shopping cart!");
        
    }

    public function destroy($itemId)
    {
        $userID = 1;
        Cart::session($userID)->remove($itemId);
        return back();
    }

    public function update($rowId)
    {
        $userID = 1;
        Cart::session($userID)->update($rowId, [
            'quantity' => array(
                'relative' => false,
                'value' => request('quantity')
            )
        ]);
        return back();
    }

    public function confirm($itemId)
    {
        $userID = 1;

        $items = Cart::session($userID)->get($itemId);
        $sale = Cart::session($userID)->get($itemId)->getPriceSum();


        $RQuantity = $items->quantity;
        //dd($RQuantity);

        $data = $this->cartService->confirm($items, $sale, $RQuantity);
        return back();
    }
    public function clearCart()
    {
        $userID = 1;
        Cart::clear();
        Cart::session($userID)->clear();

        return redirect('products');
    }

    public function store(Request $request)
    {

        if( auth()-> attempt(request(['firstname','password'])) == false)
        {
            return back()->withErrors([
                'message' => 'the username or password is incorrect please try again'
            ]);
        }

        $userID = 1;
        $q = $request->get('firstname');
        $sale = Cart::session($userID)->getTotal();
        User::where('firstname', $q)->decrement('balance', $sale);
        Cart::clear();
        Cart::session($userID)->clear();
        return redirect('products')->with('alert', 'Purchase Successful!, Please clear any ');
    }

    protected function sendLockoutResponse(Request $request)
    {
        return redirect('/products');
    }
}
