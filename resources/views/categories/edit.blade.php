@extends('layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Categories</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Category Edit</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Category</h5><br>

                            <!-- form start -->
                            <form class="form-horizontal" action="{{ route('categories.update', $category->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input name="name" type="text" class="form-control"  placeholder="Enter Category Name" value="">
                                            @if($errors->has('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <form class="form-horizontal" action="{{ route('categories.update', $category->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">purchase</label>
                                        <div class="col-sm-10">
                                            <input name="purchase" type="date" class="form-control"  placeholder="Enter purchase date" value="">
                                            @if($errors->has('purchase'))
                                                <span class="text-danger">{{ $errors->first('purchase') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <form class="form-horizontal" action="{{ route('categories.update', $category->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">expiry</label>
                                        <div class="col-sm-10">
                                            <input name="expiry" type="date" class="form-control"  placeholder="Enter expiry date" value="">
                                            @if($errors->has('expiry'))
                                                <span class="text-danger">{{ $errors->first('expiry') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i>Submit</button>
        </div>
        <!-- /.card-footer -->

        </form>



    </div>
    </div>


    </div>
    <!-- /.col-md-6 -->

    <!-- /.col-md-6 -->
    </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
