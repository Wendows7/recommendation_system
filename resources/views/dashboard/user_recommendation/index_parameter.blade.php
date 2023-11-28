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
      @if ($productrecommend == [] || count($productrecommend) === 0)
      <form action="/dashboard/recommend_product/parameter" method="GET">
        <div class="form-group ">
            <h6>Parameter</h6>
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
        <button class="btn btn-primary" type="submit">Search</button>
    </form>
    <br>
      <center><h4>Sorry, you did not get product recommendations in this parameter</h4>
      </center>
      @else

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <form action="/dashboard/recommend_product/parameter" method="GET">
                <div class="form-group ">
                    <h6>Parameter</h6>
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
                <button class="btn btn-primary" type="submit">Search</button>
            </form>
              {{-- <h2 class="section-title">
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
            </div> --}}

            <h2 class="section-title">
              This is all recommendations product  for you</h2>
            <p class="section-lead">
              This product recommendations is taken from the results of calculating the value of the product that you have rated using the collaborative filtering method
              </p>
                      <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                          <thead>
                            <tr>
                              <th class="text-center">
                                No
                              </th>
                              <th>Product</th>
                              <th>Score</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($productrecommend as $product)
                            <tr>
                              <td>
                                {{ $loop->iteration }}
                              </td>
                              <td>{{ $product["name"] }}</td>
                              <td>{{ $product["nilai"] }}</td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>

                        <h2 class="section-title">
                            Item similarity</h2>
                          <p class="section-lead">
                            These are all the similarities between the products
                            </p>
                            @foreach ($similarity as $result =>$value)
                            <h3>{{ $result }}</h3>
                        <table class="table table-striped" id="table-1">
                            <thead>
                              <tr>
                                  <th>Product</th>
                                <th>Score</th>
                              </tr>

                            </thead>
                            <tbody>
                              @foreach ($value as $result1 =>$score)
                              <tr>
                                <td>{{ $result1 }}</td>
                                <td>{{ $score }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endforeach

                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif
</div>

 @endsection


