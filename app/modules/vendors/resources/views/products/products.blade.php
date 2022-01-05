@extends('vendors::index')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Products</h1>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Products</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div style="margin-top: 10px">
                        @include('vendors::partials._session')
                        @include('vendors::partials._errors')
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Categories</h3>
                            <a href="{{route('vendors.products.create')}}" style="max-width: 150px; float: right; display:inline-block" class="btn btn-block btn-success">Add Product</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="categories" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name </th>
                                    <th>Category </th>
                                    <th>Color </th>
                                    <th>Price </th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($products as $product)

                                    <tr>
                                        <td>{{ $product ->id }}</td>
                                        <td>{{ $product ->name }} </td>
                                        <td>{{ $product ->category->name }} </td>
                                        <td>{{ $product ->color }} </td>
                                        <td>{{ $product ->price }} </td>
                                        <td>
                                            <a href="{{route('vendors.products.edit',$product ->id )}}"><i class="fas fa-edit"></i></a>
                                            &nbsp;&nbsp;
                                            <a href="javascript:void(0)"  class="confirmDelete" record="product" recordid="{{ $product ->id }}"
                                            ><i class="fas fa-trash"></i></a>

                                        </td>
                                    </tr>
                                @endforeach


                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection
