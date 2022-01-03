@extends('vendors::index')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Catalogues</h1>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Categories</li>
                        </ol>
                    </div>
                </div>
                <div style="margin-top: 10px">
                    @include('vendors::partials._session')
                    @include('vendors::partials._errors')
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <form class="categoryForm" id="categoryForm"
                      action="{{route('vendors.categories.update',$category->id)}}"
                      method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Edit Category</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Category Name </label>
                                        <input class="form-control" id="category_name" name="category_name" value="{{$category ->name}}" type="text" placeholder="Enter category Name ">
                                        @error('category_name')
                                        <span class="text-danger"> {{$message}}</span>
                                        @enderror
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit </button>
                        </div>
                    </div>
                </form>

            </div>
        </section>
    </div>
@endsection
