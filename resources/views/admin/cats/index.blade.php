@extends('layouts.master')
@section('css')
  @section('title')
  categories
  @stop
@endsection
{{-- start content  --}}
@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{ __('categories page') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                    <li class="breadcrumb-item"><a href="#" class="default-color">categories</a></li>
                    <li class="breadcrumb-item active">{{ __('table') }}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- widgets -->
    <div class="row">
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
            <a href="{{ route('cats.create') }}" class="btn btn-primary">Add Categorie</a>
        </div>
    </div>
 <!-- row -->
 <div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                       data-page-length="50"
                                       style="text-align: center">
                                    <thead>
                                    <tr class="alert-success">
                                        <th>#</th>
                                        <th>categorie name</th>
                                        <th>description</th>
                                        <th>image</th>
                                        <th>action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cats as $index=>$cat)
                                        <tr>
                                            <td>{{ $index+1 }}</td>
                                            <td>{{ $cat->cat_name }}</td>
                                            <td>{{ $cat->desc }}</td>
                                            <td>
                                                <img src="{{ asset('uploads/cat/'.$cat->image) }}" alt="" width="100px" height="100px" class="img-thumbnail">
                                            </td>
                                            <td>
                                                <a href="{{ route('cats.edit',$cat->id) }}" class="btn btn-info btn-sm" role="button" aria-pressed="true" title="edit">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_cat{{ $cat->id }}" title="delete">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @include('admin.cats.delete')
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->

@endsection

@section('js')

@endsection
