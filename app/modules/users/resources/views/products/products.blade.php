@extends('users::index')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Products</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Products</a></li>
                            <li class="breadcrumb-item active">Products</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->


        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Products</h3>
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
                                    </tr>
                                @endforeach


                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
                <!-- /.row -->

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->

    </div>


@endsection
