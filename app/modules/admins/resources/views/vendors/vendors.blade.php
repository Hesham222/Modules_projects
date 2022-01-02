@extends('admins::index')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Vendors</h1>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Vendors</li>
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
                        @include('admins::partials._session')
                        @include('admins::partials._errors')
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Vendors</h3>
                            <a href="{{route('admins.add_vendors')}}" style="max-width: 150px; float: right; display:inline-block" class="btn btn-block btn-success">Add Vendor</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="categories" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Area</th>
                                    <th>name </th>
                                    <th>email</th>
                                    <th>mobile</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($vendors as $vendor)

                                    <tr>
                                        <td>{{ $vendor ->id }}</td>
                                        <td>{{ $vendor ->area->name }}</td>
                                        <td>{{ $vendor ->name }} </td>
                                        <td>{{ $vendor ->email}} </td>
                                        <td>{{ $vendor ->mobile }}</td>
                                        <td>
                                            <a href="{{route('admins.edit-vendor',$vendor->id)}}"><i class="fas fa-edit"></i></a>
                                            &nbsp;&nbsp;
                                            <a href="javascript:void(0)"  class="confirmDelete" record="vendor" recordid="{{ $vendor ->id }}"
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
