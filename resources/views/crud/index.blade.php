@extends('layouts.master')
@section('css')
  @section('title')
       test crud
  @stop
@endsection

@section('content')
@include('partial.error')
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> crud show</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">crud show</li>
            </ol>
        </div>
        <div class="col-md-6 mb-30">
            {{-- <a href="{{ route('cruds.create') }}"  class="btn btn-primary "><i class="fa fa-user-circle"></i> Add new crud</a> --}}
            <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                {{ trans('add crud2') }}
            </button>
            <button type="button" class="button x-small" onclick="create()" >
                {{ trans('add crud100') }}
            </button>
        </div>
    </div>
</div>
{{-- show index crud --}}
<div class="row">
    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                        style="text-align: center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('Name') }}</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cruds as $index=>$crud)
                             <tr>
                                <td>{{ $index +1 }}</td>
                                <td>{{ $crud->name }}</td>
                                <td>
                                   <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                       data-target="#edit{{ $crud->id }}"
                                       title="{{ trans('Edit') }}"><i class="fa fa-edit"></i>
                                   </button>
                                   <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                       data-target="#delete{{ $crud->id }}"
                                       title="{{ trans('Delete') }}"><i class="fa fa-trash"></i>
                                   </button>
                                </td>
                             </tr>
                            <!-- edit_modal_crud-->
                            <div class="modal fade" id="edit{{ $crud->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                                {{ trans('edit crud') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('cruds.update', $crud) }}" method="post">
                                                {{ method_field('patch') }}
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="Name" class="mr-sm-2">{{ trans('name') }} :</label>
                                                        <input id="Name" type="text" name="name" class="form-control" value="{{ $crud->name}}" required >
                                                    </div>
                                                </div>
                                                <br><br>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ trans('Close') }}
                                                    </button>
                                                    <button type="submit"
                                                        class="btn btn-success">{{ trans('submit') }}
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- end edit modal crud --}}
                            {{--  delete modal crud --}}
                            <div class="modal fade" id="delete{{ $crud->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                                {{ trans('delete_crud') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('cruds.destroy', $crud) }}" method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                                {{ trans('Warning_crud') }}
                                                {{-- <input id="id" type="hidden" name="id" class="form-control" value="{{ $crud->id }}"> --}}
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ trans('Close') }}
                                                    </button>
                                                    <button type="submit"
                                                        class="btn btn-danger">{{ trans('submit') }}
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- end delete modal crud --}}
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end show index crud --}}


<!-- add_modal_crud-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('add grade') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('cruds.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="Name" class="mr-sm-2">{{ trans('Add crud') }} : </label>
                            <input id="Name" type="text" name="name" class="form-control">
                        </div>
                    </div>
                    <br><br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('Close') }} </button>
                        <button type="submit" class="btn btn-success">{{ trans('submit') }} </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end add_modal_crud-->

@endsection
@section('js')
<script>
    function create(){
        $("#exampleModal").modal('show');
    }
</script>
@endsection
