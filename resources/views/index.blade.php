@extends('layouts.main')

@section('body')

<!-- Masthead-->
<header class="masthead">
    <div class="container">
        <div class="masthead-subheading">Welcome To Cat Food Recommendation System</div>
        <div class="masthead-heading text-uppercase">Please Give Your Rating </div>
        <a class="btn btn-primary btn-xl text-uppercase" href="/login">Give Your Rating</a>
    </div>
</header>
<!-- Portfolio Grid-->
<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Product</h2>
            <h3 class="section-subheading text-muted">
                These are some of the recommended products</h3>
            </div>
            
            <div class="row">
                @foreach ($products as $product)
                <div class="col-lg-4 col-sm-6 mb-4">
                <!-- Portfolio item 1-->
                <div class="portfolio-item">
                    <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1{{ $product->id }}">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fas fa-search fa-2x"></i></div>
                        </div>
                        @if ($product->image == null)
                        <img class="img-fluid" src="user_assets/assets/img/blank-image.jpg"  alt="..." />                 
                        @else
                        
                        
                        <img class="img-fluid" src="{{ $product->image }}"  alt="..." />
                        @endif
                    </a>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading">{{ $product->name }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div style="text-align: center">
            <a class="btn btn-primary btn-xl text-uppercase" href="/products">All Product</a>
        </div>
    </div>
</section>
   <!-- Portfolio Modals-->
<!-- Portfolio item 1 modal popup-->
@foreach ($products as $product)
<div class="portfolio-modal modal fade" id="portfolioModal1{{ $product->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-bs-dismiss="modal"><img src="user_assets/assets/img/close-icon.svg" alt="Close modal" /></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project details-->
                                
                            {{-- <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p> --}}
                            @if ($product->image == null)
                                
                            <img class="img-fluid d-block mx-auto" src="user_assets/assets/img/blank-image.jpg" width="250" alt="..." />
                            @else
                                
                            <img class="img-fluid d-block mx-auto" src="{{ $product->image }}" width="250" alt="..." />
                            @endif
                            <h2 class="text-uppercase">{{ $product->name }}</h2>
                            <p> {!! $product->description !!}</p>
                            {{-- <ul class="list-inline">
                                <li>
                                    <strong>Client:</strong>
                                    Threads
                                </li>
                                <li>
                                    <strong>Category:</strong>
                                    Illustration
                                </li>
                            </ul> --}}
                            <a href="/login">
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                    <i class="fas fa-sign-in me-1"></i>
                                    Give Rating
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach


@endsection