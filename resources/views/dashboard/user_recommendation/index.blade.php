@extends('dashboard.layouts.main')
@section('body')
    
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
        <h1>Product recommendations</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
          <div class="breadcrumb-item">Recommendation Product</div>
        </div>
      </div>
      <div class="row">
          <div class="col-12">
              <div class="card">
                  <div class="card-body">
                      <h2 class="section-title">
                        This is all recommendations product  for you</h2>
                      <p class="section-lead">
                        This product recommendations is taken from the results of calculating the value of the product that you have rated using the collaborative filtering method
                        </p>        
                        <div class="row">
                          @foreach ($productrecommend as $product)
                          <div class="col-12 col-md-6 col-lg-6">
                            <div class="card card-primary">
                              <div class="card-header">
                    <h4>{{ $product["name"] }}</h4>
                    <div class="card-header-action">
                    </div>
                  </div>
                  <div class="card-body">
                    @if ($product["image"] == null)
                    <img src="{{ asset('user_assets/assets/img/blank-image.jpg') }}" width="250" height="250" alt="">
                    @else                                
                    <img src="{{ $product["image"] }}" width="250" height="250" alt="">
                    @endif
                    <p>{!! $product["description"] !!}</p>
                    <code>{{  $product["nilai"]  }}</code>
                  </div>
                </div>
              </div>
              @endforeach
        </div>      
                 
        </div>
        </div>
    </div>
</div>
</div>
  
 @endsection


