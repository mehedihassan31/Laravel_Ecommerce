<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class AdminPagesController extends Controller
{
      public function index(){
          return view('admin.pages.index');
      } 


    public function create(){
          return view('admin.pages.product.create');
      }

    public function product_edit($id){

        $products=Product::find($id);

          return view('admin.pages.product.edit')->with('product',$products);
      }


      public function product_delete($id){

      
        $products=Product::find($id);
        if(!is_null($products)){

            $products->delete();

        }

        session()->flash('success','Product has deleted successfully');
        return back();

      }


    public function manage_products(){

        $products=Product::orderBy('id','desc')->get();

          return view('admin.pages.product.index')->with('products',$products);
      }


    public function product_store(Request $request)
    {



    $validated = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'price' => 'required|numeric',
        'quantity' => 'required|numeric',

    ]);




      $product = new Product;

      $product->title = $request->title;
      $product->description = $request->description;
      $product->price = $request->price;
      $product->quantity = $request->quantity;

      $product->slug = Str::slug('$request->title');
      $product->category_id = 1;
      $product->brand_id = 1;
      $product->admin_id = 1;
      $product->save();

    //   product_image model


    if(count($request->product_image)>0)
    {
foreach($request->product_image as $image)
{

    // if($request->hasFile('product_image'))
    // {
    //     $image=$request->file('product_image');
        $img=time().'.'.$image->getClientOriginalExtension();
        $location=public_path('images/products/'.$img);
        Image::make($image)->save($location);

        $product_image= new ProductImage();
        $product_image->product_id=$product->id;
        $product_image->image=$img;
        $product_image->save();

    // }


}


    }

      return redirect()->route('admin.product.create');
    }






    public function product_update(Request $request,$id)
    {



    $validated = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'price' => 'required|numeric',
        'quantity' => 'required|numeric',

    ]);




      $product =Product::find($id);

      $product->title = $request->title;
      $product->description = $request->description;
      $product->price = $request->price;
      $product->quantity = $request->quantity;

      $product->save();


      return redirect()->route('admin.products');
    }





}