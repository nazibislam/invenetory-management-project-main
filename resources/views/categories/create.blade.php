@extends('layouts.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Category</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Add</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">

                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <h5 class="card-title">Add Category</h5><br>

                            <form role="form" action="{{ route('categories.store') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                                            <input name="name" type="text" class="form-control"  placeholder="Enter Category Name">
                                            @if($errors->has('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                {{--<div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i>Submit</button>
                                </div>--}}
                            
                            <form role="form" action="{{ route('categories.store') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">purchase</label>
                                            <input name="purchase" type="date" class="form-control"  placeholder="Enter purchase">
                                            @if($errors->has('purchase'))
                                                <span class="text-danger">{{ $errors->first('purchase') }}</span>
                                            @endif
                                    </div>

                                </div>
                                <!-- /.card-body -->
                                <form role="form" action="{{ route('categories.store') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">expiry</label>
                                            <input name="expiry" type="date" class="form-control"  placeholder="Enter expiry">
                                            @if($errors->has('expiry'))
                                                <span class="text-danger">{{ $errors->first('expiry') }}</span>
                                            @endif
                                    </div>

                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i>Submit</button>
                                </div>
                            </form>

                        </div>
                    </div><!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
