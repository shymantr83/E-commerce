<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\product;
use Illuminate\Support\Facades\Auth;
use App\Models\mycart;

class CustomerController extends Controller
{

    public function ShowMycard(){
        $user=Auth::guard('web')->user();
        $cards= mycart::where('user_id',$user->id)->with('product')->get()->all();
        // dd($cards);
        return view('template/mycard',compact('cards'));
    }
    public function confirm($productId){
        return view('template/AddToCard',compact('productId'));
    }
    public function AddToCart(Request $request){
        $user=Auth::guard('web')->user();
        $card= mycart::create([
            'user_id'=>$user->id,
            'product_id' => $request->productId,
            'orderStatus'=>0,
            'mount'=>$request->mount,
        ]);
        session()->flash('Success', 'The prodect has been successfully added tothe cart.','alert alert-success');
        return   redirect()->route('home');
    }
    public function ProductsWithCategory($id){
        $categories=category::get()->all();
$products=product::where('category_id',$id)->with('category')->get()->all();
$products_chunc=array_chunk($products,3);
// dd($products_chunc);
return view('template/index',compact('categories','products_chunc'));
    }
    public function index(){
        $categories=category::get()->all();
$products=product::with('category')->get()->all();
$products_chunc=array_chunk($products,3);
// dd($products_chunc);
return view('template/index',compact('categories','products_chunc'));
    }
    public function DeleteFromCard($cardId){
        $card= mycart::find($cardId);
        $card->delete();
        if($card){
            session()->flash('Success', 'The product has been successfully deleted from your card.','alert alert-success');
            return redirect(route('ShowMycard')) ;
        }
    }
    public function seeDetails($id){
        $product=product::find($id);
        return view('template/product-detail',compact('product'));
    }
}
