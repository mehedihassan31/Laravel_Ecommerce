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
                <table class="table table-hover table-striped">
                    <tr>
                        <th>#</th>
                        <th>Product title</th>
                        <th>price</th>
                        <th>Quantity</th>
                        <th>Action</th>
                       
                    </tr>

                    @php
                    $i=1;
                @endphp 
                @foreach ($products as $product)



                        <td>{{$i++}}</td>
                        <td>{{$product->title}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->quantity}}</td>
                        <td><a href="{{route('admin.product.edit',$product->id)}}" class="btn btn-success">Edit</a></td>
                        <td><a href="#deleteModal{{$product->id}}" data-toggle="modal" class="btn btn-danger">Delete</a></td>
    
{{-- delete modal --}}

<!-- Modal -->
<div class="modal fade" id="deleteModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('admin.product.delete',$product->id)}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
        <div class="modal-footer">

          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
                       
                    </tr>
                @endforeach


                </table>

            </div>
     
        </div>
 
    <!-- partial -->
  </div>
</div>
  <!-- main-panel ends -->
@endsection