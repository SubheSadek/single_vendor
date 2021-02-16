<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\Message;
use App\Models\Sitesetting;
use App\Models\Slider;
use App\Models\Aboutus;
use Cart;
use Auth;

class publicController extends Controller
{
    

    public function index(){
        $categories = Category::where('cat_status',1)->orderby('id', 'DESC')->get();
        
        $allproducts =Product::where('status', 1)->inRandomOrder()->limit(11)->get();
        $bestproducts =Product::where('best_rated', 1)->inRandomOrder()->limit(6)->get();
        
        $brands =Brand::where('brand_status',1)->get();
        $sliders = Slider::orderby('id', 'DESC')->get();

        return view('pages.index', compact('categories','allproducts','bestproducts','brands','sliders'));


    }

    public function proByCategories($id){
        $catProduct = Product::where('category_id', $id)->where('status', 1)
        ->orderBy('id', 'desc')->get();
        // return response()->json($catProduct);
        return response()->json([
            'product'=>$catProduct
        ], 200);
    }

                         
    public function proById($id){
        $prodetails = Product::find($id);
                    $color=$prodetails->product_color;
                    $product_color=explode(',',$color);
        
                    $size=$prodetails->product_size;
                    $product_size=explode(',',$size);
        return response()->json([
            'product'=>$prodetails,
            'color'=>$product_color,
            'size'=>$product_size
        ], 200);
    }

    public function proDetails($id){
        $prodetails = Product::leftjoin('categories','products.category_id', '=', 'categories.id')
                    ->select('products.*','categories.cat_name')->where('products.id', $id)->where('products.status',1)->first();

                    $color=$prodetails->product_color;
                    $product_color=explode(',',$color);
        
                    $size=$prodetails->product_size;
                    $product_size=explode(',',$size);
         
        return view('pages.product-details', compact('prodetails','product_color', 'product_size'));
    }


    public function catByName($id){
        $category=Category::find($id);
        $categories=Category::get();
        $catProduct = Product::where('category_id', $id)->where('status', 1)
        ->orderBy('id', 'desc')->get();
        return view('pages.categories', compact('catProduct','category','categories'));
    }

    public function products(){
        $allproducts =Product::where('status',1)->paginate(10);
        $categories=Category::get();
        return view('pages.allproduct', compact('allproducts','categories'));
    }

    public function aboutUs(){
        $about = Aboutus::first();
        $info = Sitesetting::first();
        return view('pages.aboutUs', compact('about','info'));
    }

    public function contactUs(){
        $info = Sitesetting::first();
        return view('pages.contactUs',compact('info'));
    }

    public function messages(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i|max:255',
            'content' => 'required|max:255',
           ]);

        $message = new Message();
        $message->name = $request->name;
        $message->email = $request->email; 
        $message->content = $request->content;
        $message->save();
        // return response()->json(['success' => 'Thanks for messaging us. An admin will reply to your message soon.']);
        $notification=array(
            'messege'=>'Thanks. An admin will reply to your message soon.',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
        
        }

                                   // cart-function
    public function viewcart(){
        $carts = Cart::content();
        return view('pages.cart', compact('carts'));
    }

    public function get(){
        $d['carts'] = cart::content();
        return view('pages.getCartdata', $d);
    }


    public function addToCart(Request $request){
        
    	$cartproduct = Product::find($request->id);
        if ($request->qty) {
            $qty = $request->qty;
        }else{
            $qty = 1;
        }

        if ($cartproduct->discount_price) {
            $price =$cartproduct->discount_price;
        }else{
            $price = $cartproduct->selling_price;
        }
       
        Cart::add([
            'id' => $request->id, 
            'name' => $cartproduct->product_name, 
            'qty' => $qty, 
            'price' => $price, 
            'weight' => 0, 
            'options' => [
                'images' => $cartproduct->image_one,
                'color' => $request->color,
                'size' => $request->size,
                'p_code'=>$cartproduct->product_code
            ]
        ]);
        $notification=array(
            'messege'=>'Successfully Added to Cart !!',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);

        // return "Cart Inserted";
    }

    public function removecart($id){
        Cart::remove($id);
        return redirect()->back();
    }


    public function subtotal(){
        $subtotals=Cart::Subtotal();
        return response()->json($subtotals);
        // return redirect()->back();
       

    }


    public function updateqty($id){
        $single = Cart::get($id);
        $qty =$single->qty +1;
        Cart::update($id, $qty);
        echo "done";

    }

    public function decrement($id){
        $single = Cart::get($id);
        $qty =$single->qty -1;
        Cart::update($id, $qty);
        echo "done";

    }

                        //all-wishlist-functions

    public function addToWishlist($id){
        
        $userid= Auth::id();
        $wishlist = Wishlist::where('user_id',$userid)->where('product_id', $id)->first();
        if (Auth::check()) {
    		if ($wishlist) {      
                return response()->json('warning');       
    		}else{
                $wishlist = new Wishlist();
                $wishlist->user_id = $userid;
                $wishlist->product_id = $id;
                $wishlist->save();
                return response()->json(['success' => 'Successfully Added on your wishlist']);   		
    		}
    	}else{
              return response()->json('error');        
    	}

    }

    public function Wishlist(){
        $userid = Auth::id();
        $wishProduct=Wishlist::leftjoin('products','wishlists.product_id', '=','products.id')
                ->select('products.*','wishlists.user_id')
                ->where('wishlists.user_id',$userid)->get();
        
        // $wishCount=Wishlist::where('user_id', $userid)->count();
        return view('pages.wishlist', compact('wishProduct'));
        // return response()->json([
        //     'wish_Product' => $wishProduct,
        //     'wish_count' => $wishCount
        // ],200);
    }

    public function deleteWish($id){
        $userid = Auth::id();
        Wishlist::where('product_id',$id)->where('user_id',$userid)->delete();
        return redirect()->back();
    }

    public function wishToCart(Request $request){
        
    	$cartproduct = Product::find($request->id);
        if ($request->qty) {
            $qty = $request->qty;
        }else{
            $qty = 1;
        }

        if ($cartproduct->discount_price) {
            $price =$cartproduct->discount_price;
        }else{
            $price = $cartproduct->selling_price;
        }
       
        Cart::add([
            'id' => $request->id, 
            'name' => $cartproduct->product_name, 
            'qty' => $qty, 
            'price' => $price, 
            'weight' => 0, 
            'options' => [
                'images' => $cartproduct->image_one,
                'p_code'=>$cartproduct->product_code
            ]
        ]);
        Wishlist::where('product_id',$request->id)->where('user_id',Auth::id())->delete();
        $notification=array(
            'messege'=>'Successfully Added to Cart !!',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);

        // return "Cart Inserted";
    }











}
