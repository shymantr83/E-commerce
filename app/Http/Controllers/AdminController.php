<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\category;
use App\Models\product;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\mycart;
class AdminController extends Controller
{
    public function dashboard(){
        $user=Auth::guard('web')->user();
    $categories=category::get()->all();
    if($user->isAdmin==1)
        return view('admin/dashboard',compact('categories'));
    else
    {
        $categories=category::get()->all();
        session()->flash('Success', 'Sorry, only Admins are allowed to  Enter.','alert alert-success');
        $products=product::with('category')->get()->all();
    return view('template/index',compact('categories','products'));
    }
    }
    public function ProductsWithCategory($id){
        $categories=category::get()->all();
        $products=product::where('category_id',$id)->with('category')->get()->all();
        return view('admin/product',compact('categories','products'));
    }
    public function AddNewProduct(){
        $categories=category::get()->all();
        return view('admin/addProduct',compact('categories'));
    }
    public function AddNewCategory(){
        $categories=category::get()->all();
        return view('admin/addcategory',compact('categories'));
    }
    public function storeCategory(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255','unique:'.category::class],]);
        $category = category::create([
            'name' => $request->name,]);
if( $category)

        session()->flash('Success', 'The category has been successfully added.','alert alert-success');

        else
        session()->flash('Success', 'This category already there','alert alert-success');

    return view('admin/dashboard');
    }
public function ShowCategories(){
    $categories=category::get()->all();
    return view('admin/category',compact('categories'));
}
public function DeleteCategory($id){
    $category=category::find($id);
    $category->delete();
        if($category){
            session()->flash('Success', 'The category has been successfully deleted.','alert alert-success');
            return redirect(route('ShowCategories')) ;
        }
}
public function EditeCategory ($id){
    $category=category::find($id);
    return view('admin/editCategory',compact('category'));
}
public function updateCategory(Request $request){
    //    dd ($request->id);
    $category=category::find($id);
            $category->update([
                'name' => ($request->name)?$request->name:$category->name,
            ]);
            session()->flash('Success', 'The category has been successfully updated.','alert alert-success');
            return redirect(route('ShowCategories'));
    }
    public function AddNewAdmin(){
        return view('admin/addAdmin');
    }
    public function AddAdmin(Request $request){
          $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => ['required'],
            'address' => ['required', 'string'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone'=>$request->phone,
            'address'=>$request->address,
            'isAdmin'=>1,
        ]);
        session()->flash('Success', 'The Admin has been successfully added.','alert alert-success');
        return view('admin/dashboard');
    }

    public function EditeProduct ($id){
        $categories=category::get()->all();
        $product=product::with('category')->find($id);

        return view('admin/editProduct',compact('product','categories'));
    }

    public function showProducts(){
        $categories=category::get()->all();
        $products=product::with('category')->get()->all();
        return view('admin/product',compact('products','categories'));
    }
    public function storeProduct(Request $request){
        if($request->image){
            $file = $request->file('image');
                 $ext = $file->getClientOriginalName();
                 $filename = "product" . uniqid() . ".$ext";
                 $file->move(public_path('images/ProductImage'), $filename);
             }
            else {
                $filename=null;
            }
            $category= category::whereName($request->category)->first();
            $product = product::create([
                'name' => $request->name,
                'price' => $request->price,
                'productMount' => $request->productMount,
                'image' =>  $filename,
                'discription'=>$request->discription,
                'category_id' => $category->id,
            ]);
            session()->flash('Success', 'The Product has been successfully added.','alert alert-success');

            return redirect(route('showProducts'));
    }
    public function updateProduct(Request $request){
    //    dd ($request->id);
        $product=product::find($request->id);
        if($request->image){
            $file = $request->file('image');
                 $ext = $file->getClientOriginalName();
                 $filename = "product" . uniqid() . ".$ext";
                 $file->move(public_path('images/ProductImage'), $filename);
             }
            else {
                $filename=$product->image;
            }
            $category= category::whereName($request->category)->first();
            $product->update([
                'name' => ($request->name)?$request->name:$product->name,
                'price' => ($request->price)?$request->price:$product->price,
                'productMount' => ($request->productMount)?$request->productMount:$product->productMount,
                'discription'=> ($request->discription)?$request->discription:$product->discription,
                'image' =>  $filename,
                'category_id' => ($category)?$category->id:$product->category_id,
            ]);
            session()->flash('Success', 'The product has been successfully updated.','alert alert-success');
            return redirect(route('showProducts'));
    }
    public function DeleteProduct($id){
        $product=product::find($id);
        $product->delete();
        if($product){
            session()->flash('Success', 'The product has been successfully deleted.','alert alert-success');
            return redirect(route('showProducts')) ;
        }

    }
    public function Showcards(){
        $cards= mycart::with('product','user')->get()->all();

        return view('admin/Orders',compact('cards'));
    }
    public function updateOrderStatus($id){
        $card= mycart::find($id);
        $product=product::find($card->product_id);
        $card->update([
            'orderStatus'=>1,]);
        // dd($card);
         $product->update([
            'productMount'=>$product->productMount - $card->mount]);
            if($card){
            session()->flash('Success', 'The product has been Deliverd.','alert alert-success');
        return redirect(route('Showcards')) ;}
    }


}
