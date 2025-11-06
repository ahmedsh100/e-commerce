<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;


class ProductController extends Controller
{

    public function read_product(){

        $products = Product::all();

        return view('admin.read_product',compact('products'));
    }

    public function add_product(){

        $categories = Category::all();

        return view('admin.add_product',compact('categories'));
    }

    public function create_product(Request $request){

        $product = new Product;

        $product->category_id = $request->category_id;
        $product->title = $request->title;
        $product->Qty = $request->Qty;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;

        $image = $request->image;

        $photoname = time().'.'.$image->getClientOriginalExtension();

        $image->move('photo_product',$photoname);

        $product->image = $photoname;


        $product->save();

        return redirect()->route('read_product');




    }

    public function delete_product($id){

        $product = Product::find($id);

        unlink('photo_product/'.$product->image);

        $product->delete();

        return redirect()->back();


    }



    public function edit_product($id){

        $product = Product::find($id);
        $categories = Category::all();

        return view('admin.edit_product',compact('product','categories'));


    }

    public function update_product(Request $request, $id){

        $product= Product::find($id);

        $product->category_id = $request->category_id;
        $product->title = $request->title;
        $product->Qty = $request->Qty;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;


        $image = $request->image;

        If($image){

            unlink('photo_product/'.$product->image);

            $photoname = time().'.'.$image->getClientOriginalExtension();

            $image->move('photo_product',$photoname);

            $product->image = $photoname;

        }


        $product->save();

        return redirect()->route('read_product');

    }

    public function frontend_index(){

        $products= Product::all();

        return view('frontend.index',compact('products'));
    }

    public function product_detail($id){

        $product = Product::find($id);

        return view('frontend.product_detail',compact('product'));
    }

    public function add_cart(Request $request,$id){

        if(Auth::id()){

            $user = Auth::User();
            $cart = new Cart();
            $product= Product::find($id);

            $cart->user_id = $user->id;
            $cart->name = $user->name;
            $cart->email = $user->email;

            $cart->product_id = $product->id;
            $cart->image = $product->image;
            $cart->title = $product->title;
            $cart->price = $product->price;
            $cart->Qty = $request->Qty;

            if($product->discount_price>0){

                $cart->price=$product->discount_price;

            }else{

                  $cart->price=$product->price;

            }

            $cart->save();


            return redirect()->route('show_cart');
        }else{


            return redirect()->route('login');
        }


    }

    public function show_cart(){

        if(Auth::id()){

            $user_id= Auth::user()->id;

            $carts= Cart::where('user_id',$user_id)->get();

            return view('frontend.cart',compact('carts'));

    }else{

        return redirect()->route('login');
    }

   }

   public function delete_cart($id){

    $cart = Cart::find($id);

    $cart->delete();

    return redirect()->back();


    }

    public function checkout(){

        $user_id = Auth::User()->id;
        $carts = Cart::where('user_id',$user_id)->get();

        foreach($carts as $cart){

            $order = new Order;

            $order->user_id=$cart->user_id;
            $order->product_id=$cart->product_id;
            $order->name=$cart->name;
            $order->email=$cart->email;
            $order->title=$cart->title;
            $order->image=$cart->image;
            $order->Qty=$cart->Qty;
            $order->price=$cart->price;
            $order->status='Pending';

            $order->save();

            $cart->delete();



        }



        return view('frontend.thanks');


    }



}
