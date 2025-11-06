@extends('backend.master')
@section('main')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Read product</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">

                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <a class="btn btn-primary" href="{{route('add_product')}}">Add Product</a>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Read Products</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>Category</th>
                                            <th>Title</th>
                                            <th>Qty</th>
                                            <th>Price</th>
                                            <th>Discount Price</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $product)
                                        <tr>
                                            <td>{{$product->id}}</td>
                                            <td>{{$product->image}}</td>
                                            <td>{{$product->category_id}}</td>
                                            <td>{{$product->title}}</td>
                                            <td>{{$product->Qty}}</td>
                                            <td>{{$product->price}}</td>
                                            <td>{{$product->discount_price}}</td>
                                            <td>{{$product->image}}</td>
                                            <td><a class="btn btn-primary" href="{{route('edit_product', $product->id)}}">Edit</a></td>
                                            <td><a class="btn btn-danger" href="{{route('delete_product', $product->id)}}">Delete</a></td>

                                        </tr>
                                        @endforeach

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>Category</th>
                                            <th>Title</th>
                                            <th>Qty</th>
                                            <th>Price</th>
                                            <th>Discount Price</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
