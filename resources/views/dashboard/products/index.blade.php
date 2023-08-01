@extends('dashboard.layouts.main')

@section('body')
    
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
        <h1>Data Products</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
          <div class="breadcrumb-item">Products</div>
        </div>
      </div>

      <div class="section-body">
        <h2 class="section-title">Data Products</h2>
        <p class="section-lead">
          Change information about product, like create, edit and delete
        </p>

        <div class="row">
          <div class="col-12">
           <button class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#createModal"><i class="far fa-user"></i>Add Product</button>
            <div class="card mt-3">
              <div class="card-header">
                <h4>Table All Product</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped" id="table-1">
                    <thead>                                 
                      <tr>
                        <th class="text-center">
                          No
                        </th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>image</th>
                        {{-- <th>Created At</th>
                        <th>Updated At</th> --}}
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>                                 
                      @foreach ($products as $product)
                      <tr>
                        <td>
                          {{ $loop->iteration }}
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{!! $product->description !!}</td>
                        @if ($product->image == null)
                        <td><img src="{{ asset('user_assets/assets/img/blank-image.jpg') }}" width="100" height="100" alt=""></td>        
                        @else    
                        <td><img src="{{ asset($product->image) }}" width="100" height="100" alt=""></td>
                        @endif
                        {{-- <td>{{ $product->created_at }}</td>
                        <td>{{ $product->updated_at }}</td> --}}
                        <td>
                            <button class="btn btn-icon editbtn icon-left btn-warning border-0"  data-toggle="modal" data-target="#editModal{{ $product->id }}"><i class="fas fa-exclamation-triangle"></i>Edit</button>
                          <form action="/dashboard/products/{{$product->id }} " method="POST" >
                            @method('delete')
                            @csrf
                            <button  class="btn btn-icon icon-left btn-danger show_confirm mt-1 " ><i class="fas fa-times"></i>Delete</button>
                          </form>
                          
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
  
 @endsection

 @include('dashboard/products/modal/edit')
 @include('dashboard/products/modal/create')
 



