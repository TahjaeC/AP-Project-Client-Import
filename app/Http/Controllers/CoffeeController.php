<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Products;
use Auth;


class CoffeeController extends Controller
{
    public function display()
    {
        $products = Products::all();
        //$products = Products::orderBy('name', 'category')->get();
        //$products = Products::where('name', 'coffee')->get();
        //$products = Products::latest();

        return view('allItems',[
            'products' => $products,
        ]);
    }

    

    public function search(Request $r)
    {
        $q = $r->get('q');
        if(!empty($q)){
            $products = Products::where('name', 'LIKE', '%' . $q . '%' )
            ->orWhere('category', 'LIKE', '%' . $q . '%' )
            ->get();
            if(count($products) > 0){
                return view('searchfunc')->withDetails($products)->withQuery ($q);
            }
        }
        return view ('searchfunc')->withMessage('No Details found. Try to search again !');       
        
    }

    public function edit($id)
    {
        $products = Products::find($id);
        return view('edit', compact('id'));
    }

    public function update(Request $r)
    {
        $id = $r->get('id');
        $products = Products::find($id);
        $products->name = request('name');
        $products->cost = request('cost');
        $products->category = request('category');
        $products->stock = request('stock');
        $products->item_image = request('iimage');
        $products->image = request('image');
        $products->audio = request('audio');
        $products->created_by = request('creator');
        $products->save();

        return redirect('allItems')->with('message', 'Item Successfully added/updated to database');
    }
    public function create()
    {
        return view ('create');
    }

    public function store()
    {
        $products = new Products();
        $products->name = request('name');
        $products->cost = request('cost');
        $products->category = request('category');
        $products->stock = request('stock');
        $products->item_image = request('iimage');
        $products->image = request('image');
        $products->audio = request('audio');
        $products->created_by = request('creator');

        $products->save();

        return redirect('allItems')->with('message', 'Item Successfully added/updated to database');
    }

    public function destroy($id)
    {
        $products = Products::findOrFail($id);
        $products->delete();
        return redirect('allItems');
    }

    public function postSignup(Request $r)
    {
        $this->validate($r,[
            'firstname' => 'required|unique:users',
            'lastname' => 'required',
            'password' => 'required|min:8'
        ]);

        $user = new User();
        $user->firstname = request('firstname');
        $user->lastname = request('lastname');
        $user->password = bcrypt(request('password'));
        $user->save();
        
        auth()->login($user);
        
<<<<<<< HEAD
        return redirect('home');
=======
        return redirect('products');
>>>>>>> feature/api-integration
    }
}
