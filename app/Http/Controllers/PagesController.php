<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use Illuminate\Http\Request;
use Auth;
use App\Message;

use App\Http\Requests;

class PagesController extends Controller
{
    /**
     * Display home page
     *
     * @return Response
     */
    public function index()
    {
        $games = Product::orderBy('created_at', 'desc')->where('to','>',date('Y-m-d'))->whereRaw('quantity > sold')->where("category","Games")->get();
        $cards = Product::orderBy('created_at', 'desc')->where('to','>',date('Y-m-d'))->whereRaw('quantity > sold')->where("category","Graphic Cards")->get();
        $accessories = Product::orderBy('created_at', 'desc')->where('to','>',date('Y-m-d'))->whereRaw('quantity > sold')->where("category","Accessories")->get();
        $chairs = Product::orderBy('created_at', 'desc')->where('to','>',date('Y-m-d'))->whereRaw('quantity > sold')->where("category","Gaming Chairs")->get();

        return view('home')->with([
            'games' => $games,
            'cards' => $cards,
            'accessories' => $accessories,
            'chairs' => $chairs
        ]);
    }

    /**
     * Display the specific product.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('product')->with('product',$product);
    }

    /**
     * Add item to cart
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $seller = User::findOrFail($product->user_id);

        if(!$request->session()->has('cart')) {
            $request->session()->put('cart',array());
        }

        $flag = false; // checks if item already exists in cart
        $items = $request->session()->get('cart');
        foreach ($items as &$item)
        {
            if ($item['id'] == $id) {
                //if item is found then increment quantity
                $item['quantity']++;
                $flag = true;
                break;
            }
        }

        if($flag) {
            //if item exists then update entire cart
            $request->session()->set('cart',$items);
        }
        else {
            //if item doesnt exist then add item to cart
            $item = [
                "id" => $id,
                "name" => $product->name,
                "photo" => $product->image,
                "price" => $product->price,
                "seller" => $seller->fname." ".$seller->lname,
                "category" => $product->category,
                "quantity" => 1
            ];
            $request->session()->push('cart', $item);
        }

        $items = $request->session()->get('cart');

        return redirect('/cart')->with('product',$items);
    }

    /**
     * Remove item from cart.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function remove(Request $request, $id)
    {
        $items = $request->session()->get('cart');

        foreach ($items as $key => $item)
        {
            if ($item['id'] == $id) {
                //if item is found then delete
                unset($items[$key]);
                break;
            }
        }

        //update entire cart
        $request->session()->set('cart',$items);

        return redirect('/cart')->with('items',$items);
    }

    /**
     * Display cart
     *
     * @param  Request  $request
     * @return Response
     */
    public function cart(Request $request)
    {
        $items = $request->session()->get('cart');

        return view('cart')->with('items',$items);
    }

    /**
     * Add a message
     *
     * @param  Request  $request
     * @param  pid $pid
     * @return Response
     */
    public function addMessage(Request $request, $pid)
    {
        $sid = Auth::user()->id;
        $rid = Product::findOrFail($pid)->user_id;

        Message::create([
            'sender_id' => $sid,
            'receiver_id' => $rid,
            'product_id' => $pid,
            'message' => $request->input('message')
        ]);

        return redirect('/dashboard/crm/'.$rid.'/'.$pid);
    }

}
