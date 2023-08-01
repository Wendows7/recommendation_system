@extends('layouts.main')

@section('body')
    
<br>
<br>

<!-- Portfolio Grid-->
<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Recommendation Product</h2>
            <h3 class="section-subheading text-muted">
                Please first select the parameters you want to get product recommendations</h3>
        </div>
        <form action="/ratings/parameter" method="GET">
            <div class="form-group ">
                <h4>Parameter</h4>
                <select class="form-control selectric" name="id" >
                    @foreach ($parameters as $parameter)
                    @if (request("id") == $parameter->id )
                    <option value="{{ $parameter->id }}" selected>{{ $parameter->name }}</option>
                    @else
                    <option value="{{ $parameter->id }}">{{ $parameter->name }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <br>
            <button class="btn btn-primary" type="submit">Search</button>     
        </form>
        <br>
        {{-- @dd($ratings == false) --}}
        @if (count($ratings) === 0)
        <center><h3>No products have been rated with this parameter</h3></center>
        @else
        <div class="row">
            {{-- @dd($ratings) --}}
            @foreach ($ratings as $rating =>$value)
            {{-- @dd($ratings, $rating, $value) --}}
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card card-warning">
                    <div class="card-header">
                        <h4>{{ $value['product']['name'] }}</h4>
                    </div>
                    <div class="card-body">
                        @if ($value["product"]["image"] == null)
                        <img class="img-fluid" src="{{ asset('user_assets/assets/img/blank-image.jpg') }}"  alt="..." />
                        @else
                        
                        <img class="img-fluid" src="{{ $value["product"]["image"] }}"  alt="..." />
                        @endif
                        <p>Description {!! $value["product"]["description"]  !!}</p>
                        <p>Score : <code>{{ $value["average"] }}</code> </p>
                    </div>
            </div>
            
            <br>
        </div>
        @endforeach
    </div>
    @endif
    </div>
</section>

@endsection