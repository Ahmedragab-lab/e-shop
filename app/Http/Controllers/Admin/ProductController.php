<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cat;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Product::all();
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats= Cat::all();
        return view('admin.products.create',compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $product = new Product();
            if($request->hasfile('image')){
                $file = $request->file('image');
                $ext  = $file->getClientOriginalExtension();
                $filename = time().'.'.$ext;
                $file->move('uploads/product/', $filename);
                $product->image = $filename;
            }
            $product->cat_id = $request->cat_id;
            $product->product_name = $request->product_name;
            $product->slug = $request->slug;
            $product->small_desc = $request->small_desc;
            $product->desc = $request->desc;
            $product->original_price = $request->original_price;
            $product->selling_price = $request->selling_price;
            $product->tax = $request->tax;
            $product->qty = $request->qty;
            $product->qty = $request->qty;
            $product->status = $request->status==true?'1':'0';
            $product->trending = $request->trending==true?'1':'0';
            $product->meta_title = $request->meta_title;
            $product->meta_desc = $request->meta_desc;
            $product->meta_keywords = $request->meta_keywords;
            $product->save();
            toastr()->success(__('product create successfully'));
            return redirect()->route('products.index');
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $cats= Cat::all();
        return view('admin.products.edit',compact('cats','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $product = Product::find($id);
            if($request->hasFile('image')){
                $path = 'uploads/product/' . $product->image;
                if(File::exists($path)){
                    File::delete($path);
                }
                $file = $request->file('image');
                $ext  = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext ;
                $file->move('uploads/product',$filename);
                $product->image = $filename;
            }
            $product->cat_id = $request->cat_id;
            $product->product_name = $request->product_name;
            $product->slug = $request->slug;
            $product->small_desc = $request->small_desc;
            $product->desc = $request->desc;
            $product->original_price = $request->original_price;
            $product->selling_price = $request->selling_price;
            $product->tax = $request->tax;
            $product->qty = $request->qty;
            $product->qty = $request->qty;
            $product->status = $request->status==true?'1':'0';
            $product->trending = $request->trending==true?'1':'0';
            $product->meta_title = $request->meta_title;
            $product->meta_desc = $request->meta_desc;
            $product->meta_keywords = $request->meta_keywords;
            $product->save();
            toastr()->success(__('product update successfully'));
            return redirect()->route('products.index');
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $product = Product::find($id);
            if($product->image){
                $path = 'uploads/product/' . $product->image;
                if(File::exists($path)){
                    File::delete($path);
                }
            }
            $product->delete();
            toastr()->error(__('product delete successfully'));
            return redirect()->route('products.index');
        }catch (\Exception $e){
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }
    }
}
