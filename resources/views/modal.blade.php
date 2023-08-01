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
                            <a href="">
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                    <i class="fas fa-xmark me-1"></i>
                                    Close Project
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
