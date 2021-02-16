<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth; 
// use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Shipping;
use App\Models\Order;
use App\Models\OrderDetail;
use Session;
use Cart;


class UserController extends Controller
{
    public function showLogin()
    {
        if (Auth::guard()->check()) {
            return redirect()->intended('/home');
        }
        return view('pages.auth.login');
    }

    public function showRegister()
    {
        if (Auth::guard()->check()) {
            return redirect()->intended('/home');
        }
        return view('pages.auth.register');
    }

    protected function register(Request $request)
    {
        // $this->validator($request->all())->validate();
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required|min:6',
            'password_confirmation'=>'required|same:password'
        ]);

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        // return redirect()->intended('/home');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email|exists:users',
            'password' => 'required|min:6'
        ],);
    

        if (Auth::guard()->attempt(['email' => $request->email, 'password' => $request->password ])) {

            return redirect()->intended('/home');
        }else{
            return response()->json(['message' => 'Password does`n match.']);
        }
      
        return back()->withInput($request->only('email', 'remember'));
    }


    public function changepass(Request $request)
    {
        $validatedData = $request->validate([
            'oldpass' => 'required',
            'password' => 'required|string|min:6|confirmed',
           ]);

            $password=Auth::guard()->user()->password;
            $oldpass=$request->oldpass;
            $newpass=$request->password;
            $confirm=$request->password_confirmation;
            if (Hash::check($oldpass,$password)) {
                if ($newpass === $confirm) {
                         $user=User::find(Auth::guard()->id());
                         $user->password=Hash::make($request->password);
                         $user->save();
                         Auth::guard()->logout();

                         return redirect('/login');
                         
                     }else{
                         
                         return response()->json('undone');
                     }     
              }else{
            
               return response()->json(['message' => 'The password Doesn`t match to our records.']);

              }

        }


    public function dashboard(){
        $shippings = Shipping::where('user_id', Auth::id())->first();
        $orders=Order::where('user_id',Auth::id())->get();
        return view('pages.dashboard', compact('shippings','orders'));
    }

    public function orderview($id){
        $viewDetails=OrderDetail::where('order_id', $id)->orderBy('id', 'desc')->get();

        return response()->json([
            'viewDetails' => $viewDetails
        ],200);
    }

    public function logout() {
        Auth::guard()->logout();
        Session::forget('shippingId');
            return redirect('/');
        
    }

                                    //Shipping-functions

    public function checkout(){

            $carts = Cart::content();
            $shippings = Shipping::where('user_id', Auth::id())->first();
    
            $id=Session::get('shippingId');
            $shipsession = Shipping::find($id);
    
            return view('pages.checkout', compact('carts','shippings','shipsession'));

    }

    public function shippingInfo(Request $request){

        $validatedData = $request->validate([

            'name' => 'required|max:255',
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i|max:255',
            'phone' => 'required|max:11|regex:/(01)[0-9]{9}/',
            'address' => 'required|max:255',

           ]);

        $userid= Auth::id();
        $shipping = Shipping::where('user_id', $userid)->first();

        if($shipping){

            $shippingInfo =Shipping::where('user_id', Auth::id())->first();
            $shippingInfo->name = $request->name;
            $shippingInfo->email = $request->email; 
            $shippingInfo->phone = $request->phone;
            $shippingInfo->address = $request->address;
            $shippingInfo->save();

            Session::put('shippingId', $shippingInfo->id);

            return response()->json("done");

        }else{
           $shippingInfo = new Shipping();
           $shippingInfo->user_id =  Auth::id();
           $shippingInfo->name = $request->name;
           $shippingInfo->email = $request->email; 
           $shippingInfo->phone = $request->phone;
           $shippingInfo->address = $request->address;
           $shippingInfo->save();

           Session::put('shippingId', $shippingInfo->id);
           return response()->json("done");

        }

    }


    public function cashPayment(Request $request){
        
        $order = new Order();
        $order->user_id = Auth::id();
        $order->ship_id = Session::get('shippingId');
        $order->total = Cart::subtotal()+50;
        $order->type = 'cash';
        $order->status_code = mt_rand(100000, 999999);
        $order->save(); 

        $cartProducts = Cart::content();
        foreach($cartProducts as $cartProduct){
            $orderDetails = new OrderDetail();
            $orderDetails->order_id = $order->id;
            $orderDetails->pro_id = $cartProduct->id;
            $orderDetails->product_name = $cartProduct->name;
            $orderDetails->price = $cartProduct->price;
            $orderDetails->qty = $cartProduct->qty;
            $orderDetails->size = $cartProduct->options->size;
            $orderDetails->color = $cartProduct->options->color;
            $orderDetails->image = $cartProduct->options->images;
            $orderDetails->pro_code = $cartProduct->options->p_code;
            $orderDetails->save();
        }
        Cart::destroy();
        Session::forget('shippingId');

            $notification=array(
            'messege'=>'Order Accepted Successfully !!',
            'alert-type'=>'success'
             );

           return Redirect()->to('/')->with($notification);

    }

    public function stripePayment(Request $request)
    {

                \Stripe\Stripe::setApiKey('#');
                $token = $_POST['stripeToken'];

                $charge = \Stripe\Charge::create([
                'amount' => Cart::subtotal()+50*100,
                'currency' => 'usd',
                'description' => 'Descriptions will go here',
                'source' => $token,
                ]);
            

                $order = new Order();
                $order->user_id = Auth::id();
                $order->ship_id = Session::get('shippingId');
                $order->total = Cart::subtotal()+50*100;
                $order->type = 'stripe';
                $order->status_code = mt_rand(100000, 999999);
                $order->save(); 
        
                $cartProducts = Cart::content();
                foreach($cartProducts as $cartProduct){
                    $orderDetails = new OrderDetail();
                    $orderDetails->order_id = $order->id;
                    $orderDetails->pro_id = $cartProduct->id;
                    $orderDetails->product_name = $cartProduct->name;
                    $orderDetails->price = $cartProduct->price;
                    $orderDetails->qty = $cartProduct->qty;
                    $orderDetails->size = $cartProduct->options->size;
                    $orderDetails->color = $cartProduct->options->color;
                    $orderDetails->image = $cartProduct->options->images;
                    $orderDetails->pro_code = $cartProduct->options->p_code;
                    $orderDetails->save();
                }
               
            Cart::destroy(); 
            Session::forget('shippingId');

            $notification=array(
                'messege'=>'Thanks! Your payment has been accepted.',
                'alert-type'=>'success'
                 );
    
               return Redirect()->to('/')->with($notification);
        
    }






}
