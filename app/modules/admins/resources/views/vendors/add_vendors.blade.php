@extends('admins::index')
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
                            <li class="breadcrumb-item active">Vendors</li>
                        </ol>
                    </div>
                </div>
                <div style="margin-top: 10px">
                    @include('admins::partials._session')
                    @include('admins::partials._errors')
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <form class="categoryForm" id="categoryForm"
                      action="{{route('admins.store-vendor')}}"
                      method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Add vendors</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Vendor Name </label>
                                        <input class="form-control" id="vendor_name" name="vendor_name" type="text" placeholder="Enter vendor Name ">
                                        @error('vendor_name')
                                        <span class="text-danger"> {{$message}}</span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select Area</label>
                                        <select name="area_id" id="area_id" class="form-control select2" style="width: 100%;">
                                            <option value="">Select</option>
                                            @foreach ($areas as $area)
                                                <option value="{{ $area ->id }} "
                                                >{{ $area ->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('area_id')
                                        <span class="text-danger"> {{$message}}</span>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Vendor Email </label>
                                        <input class="form-control" id="vendor_email" name="vendor_email" type="email" placeholder="Enter Vendor Email ">
                                        @error('vendor_email')
                                        <span class="text-danger"> {{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Vendor Mobile </label>
                                        <input class="form-control" id="vendor_mobile" name="vendor_mobile" type="text" placeholder="Enter Vendor Mobile ">
                                        @error('vendor_mobile')
                                        <span class="text-danger"> {{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">

                                    <div class="form-group">
                                        <label>Vendor Password </label>
                                        <input class="form-control" id="vendor_password" name="vendor_password" type="password" placeholder="Enter Vendor Password ">
                                        @error('vendor_password')
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
