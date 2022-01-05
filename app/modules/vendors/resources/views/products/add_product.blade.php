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
                            <li class="breadcrumb-item active">Products</li>
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
                      action="{{route('vendors.products.store')}}"
                      method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Add Product</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product Name </label>
                                        <input class="form-control" id="product_name" name="product_name" type="text" placeholder="Enter Product Name ">
                                        @error('product_name')
                                        <span class="text-danger"> {{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Select Category</label>
                                        <select name="category_id" id="category_id" class="form-control select2" style="width: 100%;">
                                            <option value="">Select</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category ->id }} "
                                                >{{ $category ->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <span class="text-danger"> {{$message}}</span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product Color </label>
                                        <input class="form-control" id="product_color" name="product_color" type="text" placeholder="Enter product Name ">
                                        @error('product_color')
                                            <span class="text-danger"> {{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Product Price </label>
                                        <input class="form-control" id="product_price" name="product_price" type="text" placeholder="Enter product Price ">
                                        @error('product_price')
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
