@extends('dashboard.layouts.main')

<style>:root {
	--enlarge: scale(1.25);
	--page-color: steelblue;
	--star-primary-color: gold;
	--star-secondary-color: darkgoldenrod;
}

body {
	background: var(--page-color);
	margin: 0;
	font-family: system-ui;
}

.container {
	display: grid;
	min-height: 100vh;
	place-content: center;
}

.star-group {
	display: grid;
	/* font-size: clamp(1.5em, 10vw, 8em); */
	grid-auto-flow: column;
}

/* reset native input styles */
.star {
	-webkit-appearance: none;
	align-items: center;
	appearance: none;
	cursor: pointer;
	display: grid;
	font: inherit;
	height: 1.15em;
	justify-items: center;
	margin: 0;
	place-content: center;
	position: relative;
	width: 1.15em;
}

@media (prefers-reduced-motion: no-preference) {
	.star {
		transition: all 0.25s;
	}
	
	.star:before,
	.star:after {
		transition: all 0.25s;
	}
}

.star:before,
.star:after {
	color: var(--star-primary-color);
	position: absolute;
}

.star:before {
	content: "☆";
}

.star:after {
	content: "✦";
	font-size: 25%;
	opacity: 0;
	right: 20%;
	top: 20%;
}

/* The checked radio button and each radio button preceding */
.star:checked:before,
.star:has(~ .star:checked):before {
	content: "★";
}

#two:checked:after,
.star:has(~ #two:checked):after {
	opacity: 1;
	right: 14%;
	top: 10%;
}

#three:checked:before,
.star:has(~ #three:checked):before {
	transform: var(--enlarge);
}

#three:checked:after,
.star:has(~ #three:checked):after {
	opacity: 1;
	right: 8%;
	top: 2%;
	transform: var(--enlarge);
}

#four:checked:before,
.star:has(~ #four:checked):before {
	text-shadow: 0.05em 0.033em 0px var(--star-secondary-color);
	transform: var(--enlarge);
}

#four:checked:after,
.star:has(~ #four:checked):after {
	opacity: 1;
	right: 8%;
	top: 2%;
	transform: var(--enlarge);
}

#five:checked:before,
.star:has(~ #five:checked):before {
	text-shadow: 0.05em 0.033em 0px var(--star-secondary-color);
	transform: var(--enlarge);
}

#five:checked:after,
.star:has(~ #five:checked):after {
	opacity: 1;
	right: 8%;
	text-shadow: 0.14em 0.075em 0px var(--star-secondary-color);
	top: 2%;
	transform: var(--enlarge);
}

.star-group:has(> #five:checked) {
	#one {
		transform: rotate(-15deg);
	}
	
	#two {
		transform: translateY(-20%) rotate(-7.5deg);
	}
	
	#three {
		transform: translateY(-30%);
	}
	
	#four {
		transform: translateY(-20%) rotate(7.5deg);
	}
	
	#five {
		transform: rotate(15deg);
	}
}

.star:focus {
	outline: none;
}

.star:focus-visible {
	border-radius: 8px;
	outline: 2px dashed var(--star-primary-color);
	outline-offset: 8px;
	transition: all 0s;
}
</style>
@section('body')
@include('dashboard/user_product/modal/create')

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

