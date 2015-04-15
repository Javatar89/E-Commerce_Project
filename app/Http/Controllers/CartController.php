<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Product;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller {

    private $DEFAULT_QTY = 1;

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $products = Cart::content();

        return view('store.cart', compact('products'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $product = Product::find(Input::get('id'));

        Cart::add($product->id, $product->title, $this->DEFAULT_QTY, $product->price, [

            'image'        =>$product->image,
            'description'  =>$product->description,
            'availability' =>$product->availability
        ]);

        return Redirect::to('store/cart');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($rowid)
	{
        $qty = Input::get('qty');
        Cart::update($rowid, $qty);

		return Redirect::to('store/cart');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($rowid)
	{
        Cart::remove($rowid);

        return Redirect::to('store/cart');
	}
}