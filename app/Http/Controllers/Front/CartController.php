<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\Cart\CartModelRepository;
use App\Repositories\Cart\CartRepository;
use Illuminate\Http\Request;

class CartController extends Controller
{  
     protected  $repository;
     public function __construct(CartRepository $repository){
          $this->repository=$repository;

      }

    public function index( )
    {
        $repository=$this->repository;
        return view('front.cart',compact('repository'));
    }
     
    public function store(Request $request )
    {
        $request->validate([
              'product_id'=>['required','int','exists:products,id'],
              'quantity'=>['nullable','int','min:1']
        ]);
        $product=Product::find($request->product_id);
        $this->repository->add( $product , $request->quantity);
        return redirect()->route('cart.index')->with('success','product added to cart successfuly');
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
       
    public function update(Request $request)
    {
        $request->validate([
            'product_id'=>['required','int','exists:products,id'],
            'quantity'=>['nullable','int','min:1']
      ]);
      $product=Product::find($request->product_id);
      $this->repository->update( $product ,$request->quantity);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->repository->delete($id);
    }
}
