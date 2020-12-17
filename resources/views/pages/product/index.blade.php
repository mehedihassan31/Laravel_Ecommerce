@extends('layouts.master')
 
 @section('content')
     
 <!-- Start Sidebar + Content -->
 <div class='container margin-top-20'>
    <div class="row">
@include('partials.product-sidebar')

      <div class="col-md-8">
        <div class="widget">
          <h3>Products</h3>
          <div class="row">

            @foreach ($products as $product)
                
            <div class="col-md-4">
              <div class="card">
                @foreach ($product->images as $images)
                    
                @endforeach
                <img class="card-img-top feature-img" src="{{ asset('images/products/'. $images->image) }}" alt="Card image" >
                
                <div class="card-body">
                  <h4 class="card-title"> {{$product->title}}</h4>
                  <p class="card-text">Taka- {{$product->price}}</p>
                  <a href="#" class="btn btn-outline-warning">Add to cart</a>
                </div>
              </div>
            </div>
            @endforeach



          </div>
        </div>
        <div class="widget">

        </div>
      </div>


    </div>
  </div>

  <!-- End Sidebar + Content -->
 @endsection