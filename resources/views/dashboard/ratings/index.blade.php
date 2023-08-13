@extends('dashboard.layouts.main')

@section('body')
@include('dashboard/ratings/modal/edit')
@include('dashboard/ratings/modal/create')

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
        <h1>Data Ratings</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
          <div class="breadcrumb-item">Ratings</div>
        </div>
      </div>

      <div class="section-body">
        <h2 class="section-title">Data Ratings</h2>
        <p class="section-lead">
          Change information about rating, like create, edit and delete
        </p>

        <div class="row">
          <div class="col-12">
           <button class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#createModal"><i class="far fa-user"></i>Add Rating</button>
            <div class="card mt-3">
              <div class="card-header">
                <h4>Table All Rating</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped" id="table-1">
                    <thead>                                 
                      <tr>
                        <th class="text-center">
                          No
                        </th>
                        <th>User</th>
                        <th>Product</th>
                        <th>Parameter</th>
                        <th>Rating</th>
                        {{-- <th>Created At</th>
                        <th>Updated At</th> --}}
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>                                 
                      @foreach ($ratings as $rating)
                      <tr>
                        <td>
                          {{ $loop->iteration }}
                        </td>
                        <td>{{ $rating->user->name }}</td>
                        <td>{{ $rating->product->name  }}</td>
                        <td>{{ $rating->parameter->name  }}</td>
                        <td>{{ $rating->nilai  }}</td>
                       
                        {{-- <td>{{ $rating->created_at }}</td>
                        <td>{{ $rating->updated_at }}</td> --}}
                        <td>
                            <button class="btn btn-icon editbtn icon-left btn-warning border-0"  data-toggle="modal" data-target="#editModal{{ $rating->id }}"><i class="fas fa-exclamation-triangle"></i>Edit</button>
                          <form action="/dashboard/ratings/{{$rating->id }} " method="POST" >
                            @method('delete')
                            @csrf
                            <button  class="btn btn-icon icon-left btn-danger show_confirm mt-1 " ><i class="fas fa-times"></i>Delete</button>
                          </form>
                          
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
  
 @endsection

 



