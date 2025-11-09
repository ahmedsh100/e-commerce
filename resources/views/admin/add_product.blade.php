@extends('backend.master')
@section('main')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">

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
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Product Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('create_product')}}" method="POST" enctype="multipart/form-data">
               @csrf
                <div class="card-body">

                  <div class="form-group">
                    <label for="disabledTextInput" class="form-label">Category</label>
                      <select class="form-control" aria-label="Default select example" name="category_id">
                        <option selected>Open this select menu</option>
                          @foreach($categories as $category)
                         <option value="{{$category->id}}">{{$category->category_name}}</option>
                         @endforeach
                        </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Title">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Qty</label>
                    <input type="text" class="form-control" name="Qty" placeholder="Qty">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Price</label>
                    <input type="text" class="form-control" name="price" placeholder="Price">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Discount Price</label>
                    <input type="text" class="form-control" name="discount_price" placeholder="Discount Price">
                  </div>

                  <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="3" name="description" placeholder="Description"></textarea>
                 </div>

                 <div class="form-group">
                    <label for="exampleInputFile">Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Create</button>
                </div>
              </form>
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


