@extends('admin.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-header">
                @include('admin.partials.messages')
                add product


            </div>
            <div class="card-body">
                    <form action="{{ route('admin.product.update',$product->id) }}"  enctype="multipart/form-data" method="post">
                        {{ csrf_field() }}
                    
                        <div class="form-group">
                          <label for="exampleInputEmail1">Title</label>
                          <input type="text" class="form-control" name="title" id="exampleInputEmail1" value="{{$product->title}}">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Description</label>
                          <textarea name="description" rows="8" cols="80" class="form-control">{{$product->description}}</textarea>
            
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Price</label>
                          <input type="number" class="form-control" name="price" id="exampleInputEmail1" value="{{$product->price}}">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Quantity</label>
                          <input type="number" class="form-control" name="quantity" id="exampleInputEmail1" value="{{$product->quantity}}">
                        </div>

                        <div class="form-group">
                          <label for="product_image">Product Image</label>
                          <div class="row">
                              <div class="col-md-4">
                                <input type="file" class="form-control" name="product_image[]" id="product_image"  >
                              </div>
                              <div class="col-md-4">
                                <input type="file" class="form-control" name="product_image[]" id="product_image" >
                              </div>
                              <div class="col-md-4">
                                <input type="file" class="form-control" name="product_image[]" id="product_image" >
                              </div>
                              <div class="col-md-4">
                                <input type="file" class="form-control" name="product_image[]" id="product_image" >
                              </div>
                              <div class="col-md-4">
                                <input type="file" class="form-control" name="product_image[]" id="product_image" >
                              </div>
                          </div>

                        </div>
            
                        <button type="submit" class="btn btn-primary">Update</button>
                  </form>
            </div>
     
        </div>
 
    <!-- partial -->
  </div>
</div>
  <!-- main-panel ends -->
@endsection