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
        <br>
        <button class="btn btn-primary" type="submit">Search</button>     
    </form>


     </div>
  
 @endsection


