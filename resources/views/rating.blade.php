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
                <h4>Parameter</h4>
                <select class="form-control selectric" name="id" >
                    @foreach ($parameters as $parameter)
                    <option value="{{ $parameter->id }}">{{ $parameter->name }}</option>
                    @endforeach
                </select>
            <br>
            <button class="btn btn-primary" type="submit">Search</button>     
        </form>
           </div>
</section>

@endsection