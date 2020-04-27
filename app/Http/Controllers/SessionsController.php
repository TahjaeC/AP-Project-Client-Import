<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
use App\Sales;
=======
use App\Products;
use App\User;
use Cart;
use DB;
>>>>>>> feature/api-integration

class SessionsController extends Controller
{
    //

    public function create()
    {
        return view('signin');
    }

<<<<<<< HEAD
    public function store($ss)
    {
        if( auth()-> attempt(request(['firstname','password'])) == false)
        {
            return back()->withErrors([
                'message' => 'the username or password is incorrect please try again' 
            ]);
        }

        for ($idx = 0; $idx < count($ss); $idx++)
        {
            $sales = new Sales();
            $sales->name = $sales[$idx]['name'];
            $sales->sale = $sales[$idx]['sale'];
            $sales->save();
        }


        return redirect('/home', compact('saless'));
        //return redirect('/home');
    }
    public function store1($saless)
    {
=======
    public function store1(Request $request)
    {
        if(session('attempts')==null)session(['attempts'=>0]);
        //increement each tme

        //if count in session exceeds attempts - clear the session and redirect them to a page
>>>>>>> feature/api-integration
        if( auth()-> attempt(request(['firstname','password'])) == false)
        {
            return back()->withErrors([
                'message' => 'the username or password is incorrect please try again' 
            ]);
        }

<<<<<<< HEAD
        for ($idx = 0; $idx < count($saless); $idx++)
        {
            $sales = new Sales();
            $sales->name = $sales[$idx]['name'];
            $sales->sale = $sales[$idx]['sale'];
            $sales->save();
        }


        return redirect('/home', compact('saless'));
=======
        $userID = 1;
        Cart::clear();
        Cart::session($userID)->clear();
        return redirect('products')->with('alert', 'Purchase Successful!');
>>>>>>> feature/api-integration
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('products');
    }
<<<<<<< HEAD
=======

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
        
        return redirect('products');
    }
>>>>>>> feature/api-integration
}
