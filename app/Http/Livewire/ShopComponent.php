<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
// use Livewire\WithPagination;
use Cart;

class ShopComponent extends Component
{
    public function store($product_id,$product_name,$product_price){
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added in Cart');
        return redirect()->route('product.cart');
    }
    // use WithPagination;
    public function render()
    {
        $product = Product::paginate(12);
        return view('livewire.shop-component',['products'=>$product])->layout('layouts.base');
    }
}
