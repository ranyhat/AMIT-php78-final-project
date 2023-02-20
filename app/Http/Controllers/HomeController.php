<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Cart;
use Illuminate\Support\Facades\Hash;


class HomeController extends Controller
{

    public function index()
    {
        $products = Product::limit('3')->get();

        return view('front.home')->with('products',$products);
    }

    public function about()
    {
        return view('front.about');
    }

    public function account()
    {
        $cart= Cart::where('user_id',auth()->user()->id)->get();
        return view('front.account')->with('cart',$cart);
    }

    public function products()
    {


        $search = request()->search;

        $products = Product::when($search, function($q) use ($search){
            return $q->where('name','like', "%$search%")->orWhere('category','like',"%$search%");
        })->get();



        return view('front.products')->with('products',$products);
    }

    public function update(UpdateUserRequest $request,  $user)
    {
        $user = User::find($user);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect(url('home'));
    }

}
