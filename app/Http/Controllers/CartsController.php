<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.checkout');
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
         //check user items count


        if(!$request->get('product_id')){
            return [
                'message'=>'Cart items returned',
                'items' =>  Cart::where('user_id', auth()->user()->id)->sum('quantity'),
            
            ];

        }
        // Getting product details.
        //先定義變數product為傳入的product_id的特定單筆資料的所有欄位

        $product = Product::where('id', $request->get('product_id'))->first();

        $productFoundInCart = Cart::where('product_id', 
        $request->get('product_id'))->pluck('id');
        

        if($productFoundInCart->isEmpty())
        {
             // Adding Product in cart.
            $cart = Cart::create([
                'product_id' => $product->id,
                'quantity' => 1,
                'price' => $product->sale_price,
                'user_id' => auth()->user()->id,
            ]);
        } 
        else
        {
            // Incrementing Product quantity in cart.
            $cart = Cart::where(
                'product_id', $request->get('product_id'))
                ->increment('quantity');
        }

        if($cart)
        {
            return [
                'message'=>'Cart Updated',
                'items' =>  Cart::where('user_id', auth()->user()->id)->sum('quantity'),
            ];
        }

        // add
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getCartItemsForCheckout()
    {

        $cartItems = Cart::with('product')->where('user_id', auth()->user()->id)->get('quantity');
        $finalData = [];

        if(isset($cartItems))
        {
            foreach($cartItems as $cartItem)
            {
                if($cartItem->product)
                {
                    foreach($cartItem->product as $cartProduct)
                    {
                        if($cartProduct->id == $cartItem->product_id)
                        {
                        $finalData[$cartItem->product_id]['id'] = $cartProduct->id;
                        $finalData[$cartItem->product_id]['name'] = $cartProduct->name;
                        $finalData[$cartItem->product_id]['quantity'] = $cartItem->quantity;
                        $finalData[$cartItem->product_id]['sale_price'] = $cartItem->price;
                        $finalData[$cartItem->product_id]['total'] = $cartItem->price * $cartItem->quantity;
                        $finalData['totalAmount'] = $amount;

                        }
                    }
                }
            }
        }
        
        return response()->json($finalData);
    }
}
