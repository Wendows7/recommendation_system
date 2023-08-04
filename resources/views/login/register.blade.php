@extends('login.layouts.main_login')

@section('body')

<div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
                <img src="{{ asset('user_assets/assets/img/cat777.svg') }}" alt="logo" width="100" >
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Register</h4></div>

              <div class="card-body">
                <form method="POST" action="/register/create">
                    @csrf
                    <input type="hidden" name="level" value="user">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input id="name" type="text" class="form-control" name="name">
                    <div class="invalid-feedback">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                  <label for="age">Age</label>
                    <input id="age" type="number" class="form-control" name="age">
                    <div class="invalid-feedback">
                    </div>
                    </div>
                    <div class="form-group col-6">
                      <label>Gender</label>
                      <select class="form-control selectric" name="gender">
                        <option value="pria">Man</option>
                        <option value="wanita">Women</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email">
                    <div class="invalid-feedback">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control" name="password">
                    <div class="invalid-feedback">
                    </div>
                  </div>

                  

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>
                </form>
              </div>
            </div>
  
          <div class="simple-footer">
            Copyright &copy; Recommendation System {{ now()->format('Y') }}
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection


  