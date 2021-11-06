<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cat;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
class CatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Cat::all();
        return view('admin.cats.index',compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cats.create');
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
            $cat = new Cat();
            if($request->hasfile('image')){
                $file = $request->file('image');
                $ext  = $file->getClientOriginalExtension();
                $filename = time().'.'.$ext;
                $file->move('uploads/cat/', $filename);
                $cat->image = $filename;
            }
            $cat->cat_name = $request->cat_name;
            $cat->slug = $request->slug;
            $cat->desc = $request->desc;
            $cat->status = $request->status==true?'1':'0';
            $cat->popular = $request->popular==true?'1':'0';
            $cat->meta_title = $request->meta_title;
            $cat->meta_disc = $request->meta_disc;
            $cat->meta_keywords = $request->meta_keywords;
            $cat->save();
            toastr()->success(__('categories create successfully'));
            return redirect()->route('cats.index');
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cat  $cat
     * @return \Illuminate\Http\Response
     */
    public function show(Cat $cat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cat  $cat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat=Cat::find($id);
        return view('admin.cats.edit',compact('cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cat  $cat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $cat = Cat::find($id);
            if($request->hasFile('image')){
                $path = 'uploads/cat/' . $cat->image;
                if(File::exists($path)){
                    File::delete($path);
                }
                $file = $request->file('image');
                $ext  = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext ;
                $file->move('uploads/cat',$filename);
                $cat->image = $filename;
            }
            $cat->cat_name = $request->cat_name;
            $cat->slug = $request->slug;
            $cat->desc = $request->desc;
            $cat->status = $request->status==true?'1':'0';
            $cat->popular = $request->popular==true?'1':'0';
            $cat->meta_title = $request->meta_title;
            $cat->meta_disc = $request->meta_disc;
            $cat->meta_keywords = $request->meta_keywords;
            $cat->update();
            toastr()->success(__('categories update successfully'));
            return redirect()->route('cats.index');
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cat  $cat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    try{
        $cat = Cat::find($id);
        if($cat->image){
            $path = 'uploads/cat/' . $cat->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $cat->delete();
        toastr()->error(__('categories delete successfully'));
        return redirect()->route('cats.index');
    }catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
