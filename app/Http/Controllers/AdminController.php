<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Shipping;
use App\Models\Sitesetting;
use App\Models\Slider;
use App\Models\Aboutus;
use Image;
use DB;

class AdminController extends Controller
{


        // **Auth-function**
    public function showAdminLogin()
    {
        if (Auth::guard('admin')->check()) {

            return redirect()->intended('/admin/home');
        }else{
           return view('admin.auth.login');
        }
        
    }

    public function showAdminRegister()
    {
        return view('admin.auth.register');
    }

    public function showPassChange()
    {
        return view('admin.auth.change_password');
    }

    public function showAdminForgot()
    {
        return view('admin.auth.forgot_password');
    }

    public function adminHome()
    {
        return view('admin.pages.home');
    }


    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email|exists:admins',
            'password' => 'required|min:6'
        ],);
    
        

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password, 'is_active'=> 1 ])) {

            return redirect()->intended('/admin/home');
        }else{
            return response()->json(['message' => 'Password does`n match.']);
        }
      
        return back()->withInput($request->only('email', 'remember'));
    }

    protected function AdminRegister(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:admins',
            'password'=>'required|min:6',
            'password_confirmation'=>'required|same:password'
        ]);

        $admin = Admin::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        // return redirect()->intended('/admin/home');
         return redirect('/admin/home');
    }

    public function adminLogout() {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }


    public function passwordChange(Request $request)
    {
        $validatedData = $request->validate([
            'oldpass' => 'required',
            'password' => 'required|string|min:6|confirmed',
           ]);

            $password=Auth::guard('admin')->user()->password;
            $oldpass=$request->oldpass;
            $newpass=$request->password;
            $confirm=$request->password_confirmation;
            if (Hash::check($oldpass,$password)) {
                if ($newpass === $confirm) {
                         $admin=Admin::find(Auth::guard('admin')->id());
                         $admin->password=Hash::make($request->password);
                         $admin->save();
                         Auth::guard('admin')->logout();

                         return redirect('/admin/login');
                         
                     }else{
                         
                         return response()->json('undone');
                     }     
              }else{
            
               return response()->json(['error' => 'Old Password Doesn`t match to our records.']);

              }

        }


        //**Category-function**/
       
        public function showCategory(){
            $categories = Category::orderby('id', 'DESC')->get();
            return view('admin.pages.category', compact('categories'));
        }

        public function createCategory(Request $request){
            $request->validate([
                'cat_name' => 'required|unique:categories|max:255',
            ],[
                'cat_name.required' => 'The category field is required.'
            ]);
    
            $category = new Category();
            $category->cat_name = $request->cat_name;
            $category->cat_status = $request->cat_status;
            $category->save();

            echo "done";
            
        }

        public function deleteCategory($id){
            $category = Category::find($id);
            
            if ($category){
                $category->delete();
            }
            echo "done";
        }

        public function showEdit($id){
            $category = Category::find($id);
            return response()->json($category);
        }

        public function updateCategory(Request $request){
            $request->validate([
                'cat_name' => 'required|max:255',
            ],[
                'cat_name.required' => 'The category field is required.'
            ]); 
            $category = Category::find($request->id);
            $category->cat_name = $request->cat_name;
            $category->save();
           
        }

        public function publishCategory($id){
            $category = Category::find($id);
            $category->cat_status = 1;
            $category->save();
            echo "done";
            return Redirect()->back();
        }
    
        public function unpublishCategory($id){
            $category = Category::find($id);
            $category->cat_status = 0;
            $category->save();
            echo "done";
            return Redirect()->back();
        }


        //**Subcategory-function**/
       
        public function showSubcat(){
            $categories = Category::orderby('id', 'DESC')->get();
            $subcats = Subcategory::leftJoin('categories', 'subcategories.cat_id', '=', 'categories.id')
             ->select('subcategories.*', 'categories.cat_name')->orderby('id', 'DESC')->get();

            return view('admin.pages.subcategory', compact('categories','subcats'));
        }

        public function createSubcat(Request $request){
            $request->validate([
                'subcat_name' => 'required|unique:subcategories|max:255',
                'cat_id' => 'required',
            ],[
             'cat_id.required' =>'The category name field is required.'
            ]);
    
            $subcat = new Subcategory();
            $subcat->cat_id = $request->cat_id;
            $subcat->subcat_name = $request->subcat_name;
            $subcat->subcat_status = $request->subcat_status;
            $subcat->save();

            echo "done";
        }

        public function showEditSubcat($id){
            $subcats = Subcategory::find($id);
            return response()->json($subcats);
        }

        public function updateSubcat(Request $request){
            $request->validate([
                'subcat_name' => 'required|max:255',
            ]); 
            $subcat = Subcategory::find($request->id);
            $subcat->cat_id = $request->cat_id;
            $subcat->subcat_name = $request->subcat_name;
            $subcat->save();
    
            echo "done";
        }

        public function softdeleteSubcat($id){
            Subcategory::find($id)->delete();
           
        }

        public function viewTrash(){
            $subcats= Subcategory::onlyTrashed()->get();
            return view('admin.pages.allTrash', compact('subcats'));
        }

        public function restoreSubcat($id){
            Subcategory::onlyTrashed()->find($id)->restore();
            return redirect()->back();
        }

        public function forceDeleteSubcat($id){
            Subcategory::onlyTrashed()->find($id)->forceDelete();
            return redirect()->back();
        }

        public function publishSubcat($id){
            $subcat = Subcategory::find($id);
            $subcat->subcat_status = 1;
            $subcat->save();
            echo "done";
            return Redirect()->back();
        }
    
        public function unpublishSubcat($id){
            $subcat = Subcategory::find($id);
            $subcat->subcat_status = 0;
            $subcat->save();
            echo "done";
            return Redirect()->back();
        }


        //**Brand-function**/
        public function showBrand(){
            $brands = Brand::orderby('id', 'DESC')->get();
            return view('admin.pages.brand', compact('brands'));
        }

        public function createBrand(Request $request){
            $request->validate([
                'brand_name' => 'required|string|unique:brands|max:255',
                'brand_logo' => 'mimes:jpeg,jpg,png',
            ]);

            $brand_image= $request->brand_logo;

    
            $brand = new Brand();
            $brand->brand_name = $request->brand_name;
            if($brand_image){
                $brand_logo_name=hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();
                Image::make($brand_image)->resize(300,300)->save('admin/images/brand/'.$brand_logo_name);
                $imageUrl='admin/images/brand/'.$brand_logo_name;
                $brand->brand_logo = $imageUrl;
              }
            $brand->brand_status = $request->brand_status;
            $brand->save();
    
            echo "done";
        }

        public function showEditBrand($id){
            $brand = Brand::find($id); 
            return response()->json($brand);
        }


        public function updateBrand(Request $request){
            $request->validate([
                'brand_name' => 'required|max:255',
                'brand_logo' => 'image',
            ]);
            // $brand = new Brand();
            $brand = Brand::find($request->id);
            if ($file = $request->file('brand_logo')) {
                if($brand->brand_logo != null){
                    unlink($brand->brand_logo);
                }
                
                $brand_logo_name=hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
                Image::make($file)->resize(300,300)->save('admin/images/brand/'.$brand_logo_name);
                $imageUrl='admin/images/brand/'.$brand_logo_name;

                $brand->brand_logo = $imageUrl;
                $brand->save();
                
            }

    
            $brand->brand_name = $request->brand_name;
            $brand->save();
    
            echo "done";
        }


        public function publishBrand($id){
            $brand = Brand::find($id);
            $brand->brand_status = 1;
            $brand->save();
            echo "done";
            return Redirect()->back();
        }
    
        public function unpublishBrand($id){
            $brand = Brand::find($id);
            $brand->brand_status = 0;
            $brand->save();
            echo "done";
            return Redirect()->back();
        }

        public function deleteBrand($id){
            $brand = Brand::find($id);
            $image= $brand->brand_logo;
            if ($image == null){
                $brand->delete();
            }else{
                $brand->delete();
                unlink($image);
            }
            echo "done";
        }


                            //**Products-Functions**//
        public function showProduct(){
            $products = Product::leftJoin('categories', 'products.category_id', '=', 'categories.id')
              ->leftJoin('brands', 'products.brand_id', '=', 'brands.id')
              ->select('products.*', 'categories.cat_name', 'brands.brand_name')->paginate(10);
            return view('admin.pages.product.index', compact('products'));
        }

        public function addProduct(){
            $category =Category::get();
            $brand=Brand::get();
            return view('admin.pages.product.create', compact('category', 'brand'));
        }

        public function getProSubcat($cat_id){
            $cat =Subcategory::where('cat_id', $cat_id)->get();
            return json_encode($cat);
        }

        public function storeProduct (Request $request){

            $request->validate([
                // 'brand_name' => 'required|string|unique:brands|max:255',
                // 'brand_logo' => 'mimes:jpeg,jpg,png',
            ]);

            
            $product = new Product();
            $product->product_name = $request->product_name;
            $product->product_code = $request->product_code;
            $product->product_color = $request->product_color;
            $product->product_quantity = $request->product_quantity;
            $product->category_id = $request->cat_id;
            $product->subcategory_id = $request->subcat_id;
            $product->brand_id = $request->brand_id;
            $product->product_size = $request->product_size;
            $product->selling_price = $request->selling_price;
            $product->discount_price = $request->discount_price;
            $product->product_details = $request->product_details;
            $product->video_link = $request->video_link;
            $product->main_slider = $request->main_slider;
            $product->hot_deal = $request->hot_deal;
            $product->best_rated = $request->best_rated;
            $product->trend = $request->trend;
            $product->mid_slider = $request->mid_slider;
            $product->hot_new = $request->hot_new;
            $product->buyone_getone = $request->buyone_getone;
            $product->status =1;
            
            $image_one = $request->image_one;
            $image_two = $request->image_two;
            $image_three = $request->image_three;

            if($image_one){
                $image_one_name=hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
                Image::make($image_one)->resize(300,300)->save('admin/images/product/'.$image_one_name);
                $imageOne='admin/images/product/'.$image_one_name;
                $product->image_one = $imageOne;
            }

            if($image_two){
                $image_two_name=hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
                Image::make($image_two)->resize(300,300)->save('admin/images/product/'.$image_two_name);
                $imageTwo='admin/images/product/'.$image_two_name;
                $product->image_two = $imageTwo;
            }

            if($image_three){
                $image_three_name=hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
                Image::make($image_three)->resize(300,300)->save('admin/images/product/'.$image_three_name);
                $imageThree='admin/images/product/'.$image_three_name;
                $product->image_three = $imageThree;
            }
            
            
            $product->save();
    
            echo "done";

        }

        public function editProduct($id){
            $product = Product::where('products.id', $id)->first();
            $brand=Brand::get();
            $category =Category::get();
            $subcategory=Subcategory::get();
            return view('admin.pages.product.edit', compact('product','brand','category', 'subcategory'));
        }

        public function updateProduct(Request $request ,$id){
                       
        //    $request->validate([
        //         'product_name' => 'required',
                
        //     ]);
            // $product = new Product();
            $product=Product::find($id);
            $product->product_name = $request->product_name;
            $product->product_code = $request->product_code;
            $product->product_color = $request->product_color;
            $product->product_quantity = $request->product_quantity;
            $product->category_id = $request->cat_id;
            $product->subcategory_id = $request->subcat_id;
            $product->brand_id = $request->brand_id;
            $product->product_size = $request->product_size;
            $product->selling_price = $request->selling_price;
            $product->discount_price = $request->discount_price;
            $product->product_details = $request->product_details;
            $product->video_link = $request->video_link;
            $product->main_slider = $request->main_slider;
            $product->hot_deal = $request->hot_deal;
            $product->best_rated = $request->best_rated;
            $product->trend = $request->trend;
            $product->mid_slider = $request->mid_slider;
            $product->hot_new = $request->hot_new;
            $product->buyone_getone = $request->buyone_getone;

            $oldImage=Product::where('products.id', $request->id)->first();

            $old_one =$oldImage->image_one;
            $old_two =$oldImage->image_two;
            $old_three =$oldImage->image_three;

            $image_one = $request->image_one;
            $image_two = $request->image_two;
            $image_three = $request->image_three;

            if($image_one){
                if($old_one !=null){
                    unlink($old_one);
                }
                
                $image_one_name=hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
                Image::make($image_one)->resize(300,300)->save('admin/images/product/'.$image_one_name);
                $imageOne='admin/images/product/'.$image_one_name;
                $product->image_one = $imageOne;
                $product->save();
            }

            if($image_two){

                if($old_two != null){
                    unlink($old_two);
                }

                $image_two_name=hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
                Image::make($image_two)->resize(300,300)->save('admin/images/product/'.$image_two_name);
                $imageTwo='admin/images/product/'.$image_two_name;
                $product->image_two = $imageTwo;
            }

            if($image_three){

                if($old_three != null){
                    unlink($old_three);
                }

                $image_three_name=hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
                Image::make($image_three)->resize(300,300)->save('admin/images/product/'.$image_three_name);
                $imageThree='admin/images/product/'.$image_three_name;
                $product->image_three = $imageThree;
            }

            $product->save();
            // Product::where('id', $id)->update($request->all());
            // dd($product);
            // echo "done";
            $notification=array(
                'messege'=>'Product Updated Successfully!!',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);
    
        }


        public function viewProduct($id){
            $product = Product::leftJoin('categories', 'products.category_id', '=', 'categories.id')
                    ->leftJoin('brands', 'products.brand_id', '=', 'brands.id')
                    ->leftJoin('subcategories', 'products.subcategory_id', '=', 'subcategories.id')
                    ->select('products.*', 'categories.cat_name', 'subcategories.subcat_name', 'brands.brand_name')
                    ->where('products.id', $id)
                    ->first();
    
            return view('admin.pages.product.view', compact('product'));
        }

        public function deleteProduct($id){

            $product = Product::find($id);
            $image1=$product->image_one;
            $image2=$product->image_two;
            $image3=$product->image_three;

            if ($image1 == null){
                $product->delete();
            }else{
                $product->delete();
                unlink($image1);
            }

            if ($image2 == null){
                $product->delete();
            }else{
                $product->delete();
                unlink($image2);
            }

            if ($image3 == null){
                $product->delete();
            }else{
                $product->delete();
                unlink($image3);
            }
            
            echo "done";
    
        }

        public function inactiveProduct($id){
            Product::where('id', $id)->update(['status'=> 0]);

            $notification=array(
                'messege'=>'Successfully Product Inactive!!',
                'alert-type'=>'success'
                 );
               
               return Redirect()->back()->with($notification);
    
        }
    
        public function activeProduct($id){
            Product::where('id', $id)->update(['status'=> 1]);
            $notification=array(
                'messege'=>'Successfully Product Active!!',
                'alert-type'=>'success'
                 );
               
               return Redirect()->back()->with($notification);
    
        }
    


                        //All-Order-Functions


        public function NewOrder(){
            $order=Order::where('order_status', 'pending')->orderBy('id', 'desc')->get();
            return view('admin.pages.pending', compact('order'));
        }

        public function ViewOrder($id){ 
            
            $order=Order::leftjoin('users','orders.user_id','=','users.id')
                    ->select('users.name', 'orders.*')
                    ->where('orders.id', $id)->first();

            $shipping=Shipping::where('shippings.id', $order->ship_id)->first();
            
            $details=OrderDetail::where('order_details.order_id', $id)->get();
            
            return view('admin.pages.view_order', compact('order','shipping','details'));
            
        }

        public function PaymentAccept($id){
            Order::where('id',$id)->update(['order_status' => 'accepted']);
            $notification=array(
                'messege'=>'Payment Accept Done',
                'alert-type'=>'success'
                );
            return Redirect()->route('admin.neworder')->with($notification); 
        }


        public function PaymentCancel($id){
            Order::where('id',$id)->update(['order_status' => 'canceled']);
            $notification=array(
                'messege'=>'Order Canceled Successfully !!',
                'alert-type'=>'success'
                );
            return Redirect()->route('admin.neworder')->with($notification); 
        }

        public function AcceptPaymentOrder(){
            $order=Order::where('order_status','accepted')->get();
            return view('admin.pages.pending', compact('order'));
        }

        public function CancelPaymentOrder(){
            $order=Order::where('order_status', 'canceled')->get();
            return view('admin.pages.pending', compact('order'));
        }

        public function ProgressPaymentOrder(){
            $order=Order::where('order_status', 'progress')->get();
            return view('admin.pages.pending', compact('order'));
        }

        public function SuccessPaymentOrder(){
            $order=Order::where('order_status', 'delivered')->get();
            return view('admin.pages.pending', compact('order'));
        }

        public function DeliveryProgress($id){
            Order::where('id', $id)->update(['order_status'=>'progress']);
            $notification=array(
                'messege'=>'Send to Delivery!!',
                'alert-type'=>'success'
                );
            return Redirect()->route('admin.accept.payment')->with($notification);
        }

        public function DeliveryDone($id){
            $product=OrderDetail::where('order_id',$id)->get();
            foreach($product as $row){
                DB::table('products')
                ->where('id',$row->pro_id)
                ->update(['product_quantity'=>DB::raw('product_quantity-'.$row->qty)]);
            }

            Order::where('id', $id)->update(['order_status'=>'delivered']);
            $notification=array(
                'messege'=>'Send to Delivery!!',
                'alert-type'=>'success'
                );
            return Redirect()->route('admin.success.payment')->with($notification);
        }

        
 
                            //Company Info functions

        public function companyInfo(){
            $info=Sitesetting::first();
            return view('admin.pages.company-info' ,compact('info'));
            // dd($info);
        }

        public function updateSetting(Request $request){

            $validatedData=$request->validate([
                'phone_one'=>'required',
                'email'=>'required',
                'company_name'=>'required',
                'address'=>'required',
                'logo'=>'mimes:jpeg,jpg,png'
            ]);
            

             $id=$request->id;
             $setting=Sitesetting::find($id);
             $setting->phone_one = $request->phone_one;
             $setting->phone_two = $request->phone_two;
             $setting->email = $request->email;
             $setting->company_name = $request->company_name;
             $setting->address = $request->address;

             $logo = $request->logo;
             $old_logo=Sitesetting::where('id',$id)->first();

             if($logo){
                if($old_logo->logo != null){
                    unlink($old_logo->logo);
                }
                $logo_name=hexdec(uniqid()).'.'.$logo->getClientOriginalExtension();
                Image::make($logo)->resize(180,45)->save('admin/images/'.$logo_name);
                $newLogo='admin/images/'.$logo_name;
                $setting->logo = $newLogo;
            }

             $setting->facebook = $request->facebook;
             $setting->youtube = $request->youtube;
             $setting->instagram = $request->instagram;
             $setting->twitter = $request->twitter;
             $setting->save();

             $notification=array(
                     'messege'=>'Updated info Successfully !!',
                     'alert-type'=>'success'
                    );
            return Redirect()->back()->with($notification); 
        }




        
                        //**Brand-function**/

        
          public function slider(){
              $sliders = Slider::orderby('id', 'DESC')->get();
              return view('admin.pages.slider', compact('sliders'));
          }


        public function createSlider(Request $request){
            $request->validate([
                'title' => 'required|string|max:255',
                'title_two' => 'max:255',
                'image' => 'required|mimes:jpeg,jpg,png',
            ]);

            $slider_image= $request->image;

    
            $slider = new Slider();
            $slider->title = $request->title;
            $slider->title_two = $request->title_two;
            if($slider_image){
                $image_name=hexdec(uniqid()).'.'.$slider_image->getClientOriginalExtension();
                Image::make($slider_image)->resize(1190,595)->save('admin/images/slider/'.$image_name);
                $imageUrl='admin/images/slider/'.$image_name;
                $slider->image = $imageUrl;
              }
            $slider->status = $request->status;
            $slider->save();
    
            echo "done";
        }

        public function showEditSlider($id){
            $slider = Slider::find($id); 
            return response()->json($slider);
        }


        public function updateSlider(Request $request){
            $request->validate([
                'title' => 'required|max:255',
                'title_two' => 'max:255',
                'image' => 'image',
            ]);

            $slider = Slider::find($request->id);
            if ($file = $request->file('image')) {
                if($slider->image != null){
                    unlink($slider->image);
                }
                
                $image_name=hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
                Image::make($file)->resize(1190,595)->save('admin/images/slider/'.$image_name);
                $imageUrl='admin/images/slider/'.$image_name;

                $slider->image = $imageUrl;
                
            }

    
            $slider->title = $request->title;
            $slider->title_two = $request->title_two;
            $slider->save();
    
            echo "done";
        }


        public function publishSlider($id){
            $slider = Slider::find($id);
            $slider->status = 1;
            $slider->save();
            echo "done";

            $notification=array(
                'messege'=>'Successfully Slider Actived!!',
                'alert-type'=>'success'
                 );
               
            return Redirect()->back()->with($notification);
        }
    
        public function unpublishSlider($id){
            $slider = Slider::find($id);
            $slider->status = 0;
            $slider->save();
            echo "done";
            $notification=array(
                'messege'=>'Successfully Slider Inactived!!',
                'alert-type'=>'success'
                 );
               
            return Redirect()->back()->with($notification);
        }

        public function deleteSlider($id){
            $slider = Slider::find($id);
            $image= $slider->image;
            if ($image == null){
                $slider->delete();
            }else{
                $slider->delete();
                unlink($image);
            }
            echo "done";
        }


                        //About-Us functions

        public function aboutUs(){
            $abouts = Aboutus::first();
            return view('admin.pages.aboutUs', compact('abouts'));
        }

        public function updateAbout(Request $request){

            $validatedData=$request->validate([
                'banner1'=>'mimes:jpeg,jpg,png',
                'banner2'=>'mimes:jpeg,jpg,png',
                'banner3'=>'mimes:jpeg,jpg,png'
            ]);
            

             $id=$request->id;
             $aboutus=Aboutus::find($id);
             
             $aboutus->block1 = $request->block1;
             $aboutus->title1 = $request->title1;
             $aboutus->des1 = $request->des1;

             $aboutus->block2 = $request->block2;
             $aboutus->title2 = $request->title2;
             $aboutus->des2 = $request->des2;

             $aboutus->block3 = $request->block3;
             $aboutus->title3 = $request->title3;
             $aboutus->des3 = $request->des3;

             $aboutus->block4 = $request->block4;
             $aboutus->title4 = $request->title4;
             $aboutus->des4 = $request->des4;

             $aboutus->block5 = $request->block5;
             $aboutus->title5 = $request->title5;
             $aboutus->des5 = $request->des5;

             $aboutus->block6 = $request->block6;
             $aboutus->title6 = $request->title6;
             $aboutus->des6 = $request->des6;

             $aboutus->block7 = $request->block7;
             $aboutus->title7 = $request->title7;
             $aboutus->des7 = $request->des7;

             $aboutus->block8 = $request->block8;
             $aboutus->title8 = $request->title8;
             $aboutus->des8 = $request->des8;

             $aboutus->block9 = $request->block9;
             $aboutus->title9 = $request->title9;
             $aboutus->des9 = $request->des9;

             $aboutus->block10 = $request->block10;
             $aboutus->title10 = $request->title10;
             $aboutus->des10 = $request->des10;

             $aboutus->block11 = $request->block11;
             $aboutus->title11 = $request->title11;
             $aboutus->des11 = $request->des11;

             $aboutus->block12 = $request->block12;
             $aboutus->title12 = $request->title12;
             $aboutus->des12 = $request->des12;

             $aboutus->block13 = $request->block13;
             $aboutus->title13 = $request->title13;
             $aboutus->des13 = $request->des13;

             $aboutus->block14 = $request->block14;
             $aboutus->title14 = $request->title14;
             $aboutus->des14 = $request->des14;
             

             $oldImage=Aboutus::where('aboutuses.id', $request->id)->first();

            $old_one =$oldImage->banner1;
            $old_two =$oldImage->banner2;
            $old_three =$oldImage->banner3;

            $image_one = $request->banner1;
            $image_two = $request->banner2;
            $image_three = $request->banner3;

            if($image_one){
                if($old_one !=null){
                    unlink($old_one);
                }
                
                $image_one_name=hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
                Image::make($image_one)->resize(584,483)->save('admin/images/aboutus/'.$image_one_name);
                $imageOne='admin/images/aboutus/'.$image_one_name;
                $aboutus->banner1 = $imageOne;
                
            }

            if($image_two){

                if($old_two != null){
                    unlink($old_two);
                }

                $image_two_name=hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
                Image::make($image_two)->resize(1150,260)->save('admin/images/aboutus/'.$image_two_name);
                $imageTwo='admin/images/aboutus/'.$image_two_name;
                $aboutus->banner2 = $imageTwo;
            }

            if($image_three){

                if($old_three != null){
                    unlink($old_three);
                }

                $image_three_name=hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
                Image::make($image_three)->resize(400,455)->save('admin/images/aboutus/'.$image_three_name);
                $imageThree='admin/images/aboutus/'.$image_three_name;
                $aboutus->banner3 = $imageThree;
            }

            $aboutus->save();
             

             $notification=array(
                     'messege'=>'Updated info Successfully !!',
                     'alert-type'=>'success'
                    );
            return Redirect()->back()->with($notification); 
        }













}
