@extends('dashboard.layouts.main')
@section('body')
    
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
        <h1>Products Rating</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
          <div class="breadcrumb-item">Products Rating</div>
        </div>
      </div>
      <div class="row">
          <div class="col-12">
              <div class="card">
                  <div class="card-body">
                      <h2 class="section-title">
                        Please provide product ratings from 1 to 5 to get product recommendations</h2>
                      <p class="section-lead">
                        rating with several parameters below
                        </p>              
                        <div class="row">
                          @foreach ($products as $product)
                          <div class="col-12 col-md-6 col-lg-6">
                            <div class="card card-primary">
                              <div class="card-header">
                    <h4>{{ $product->name }}</h4>
                    <div class="card-header-action">
                      <button class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#createModal{{ $product->id }}">
                        <i class="far fa-primary"></i>Add Rating</button>
                    </div>
                  </div>
                  <div class="card-body">
                    @if ($product->image == null)
                    <img src="{{ asset('user_assets/assets/img/blank-image.jpg') }}" width="250" height="250" alt="">
                    @else                                
                    <img src="{{ $product->image }}" width="250" height="250" alt="">
                    @endif
                    <p>{!! $product->description !!}</p>
                  </div>
                </div>
              </div>
              @endforeach
        </div>
        </div>
        </div>
        {{ $products->links() }}
    </div>
</div>
</div>
  
 @endsection
 @include('dashboard/user_product/modal/create')

