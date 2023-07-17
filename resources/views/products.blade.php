@extends('layouts.main')

@section('body')
    
<br>
<br>

<!-- Portfolio Grid-->
<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Product</h2>
            <h3 class="section-subheading text-muted">
                This is all recommended products</h3>
        </div>
        
        <div class="row">
            @foreach ($products as $product)
            <div class="col-lg-4 col-sm-2 mb-4">
                <!-- Portfolio item 1-->
                <div class="portfolio-item">
                    <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1{{ $product->id }}">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fas fa-search fa-2x"></i></div>
                        </div>
                        <img class="img-fluid" src="{{ $product->image }}"  alt="..." />
                    </a>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading">{{ $product->name }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{ $products->links() }}
    </div>
</section>

@endsection