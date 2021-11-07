@extends('layouts.master')
@section('css')
  @section('title')
  products
  @stop
@endsection
{{-- start content  --}}
@section('content')
@include('partial.error')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{ __('Edit products page') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('products.index') }}" class="default-color">Edit products</a></li>
                    <li class="breadcrumb-item active">{{ __('table') }}</li>
                </ol>
            </div>
        </div>
    </div>
   <div class="card">
       {{-- <div class="card-header">
         <h4>Add Categorie</h4>
       </div> --}}
       <div class="card-body">
         <form action="{{ route('products.update',$product->id) }}" method="post" autocomplete="off" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12 mb-3">
                    <select class="form-control" name="cat_id">
                        <option value="" >{{ $product->cat->cat_name }}</option>
                        @foreach ( $cats as $cat)
                             <option value="{{ $cat->id }}">{{ $cat->cat_name }}</option>
                        @endforeach
                    </select>
                  </div>
                 <div class="col-md-6 mb-3">
                     <label for="product_name">product name</label>
                     <input type="text" placeholder="Enter product name" name="product_name" class="form-control" value="{{ $product->product_name }}">
                 </div>
                 <div class="col-md-6 mb-3">
                     <label for="slug">slug</label>
                     <input type="text"  name="slug" class="form-control" value="{{ $product->slug }}">
                 </div>
                 <div class="col-md-12 mb-3">
                    <label for="small_desc">Small_Description</label>
                    <textarea rows="3" class="form-control" name="small_desc">{{ $product->small_desc }}</textarea>
                  </div>
                 <div class="col-md-12 mb-3">
                    <label for="desc">Description</label>
                     <textarea name="desc" id=""  rows="3" class="form-control">{{ $product->desc }}</textarea>
                 </div>
                 <div class="col-md-6 mb-3">
                    <label for="">Original Price</label>
                    <input type="number" class="form-control" name="original_price" value="{{ $product->original_price }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Selling Price</label>
                    <input type="number" class="form-control" name="selling_price" value="{{ $product->selling_price }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Tax</label>
                    <input type="number" class="form-control" name="tax" value="{{ $product->tax }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="qty">Quantity</label>
                    <input type="number" class="form-control" name="qty" value="{{ $product->qty }}">
                </div>
                 <div class="col-md-6 mb-3">
                    <label for="status">status</label>
                    <input type="checkbox"  name="status" {{ $product->status == 1?'checked':'' }}>
                 </div>
                 <div class="col-md-6 mb-3">
                    <label for="">trending</label>
                    <input type="checkbox"  name="trending" {{ $product->trending == 1?'checked':'' }}>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="meta_title">meta_title</label>
                    <input type="text"  name="meta_title" class="form-control" value="{{ $product->meta_title }}">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="meta_disc">meta_disc</label>
                    <textarea name="meta_desc" id=""  rows="3" class="form-control">{{ $product->meta_desc }}</textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="meta_keywords">meta_keywords</label>
                    <textarea name="meta_keywords" id=""  rows="3" class="form-control">{{ $product->meta_keywords }}</textarea>
                </div>
                <div class="col-lg-6">
                    <label>Add image :  <span style="color:rgb(199, 8, 8)">*</span></label>
                    <input class="form-control img" name="image"  type="file">
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('uploads/product/'.$product->image) }}" class="img-thumbnail img-preview" width="100" alt="">
                </div>
                <div class="col-md-12 mb-3">
                   <button type="submit" class="btn btn-primary">Save</button>
                </div>
             </div>
         </form>
       </div>
   </div>


@endsection

@section('js')

@endsection
