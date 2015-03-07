@extends('layouts.app')

@section('content')
@include('partials.display-error')

<div>
  <h1  class="title center-align">Register Below!</h1>
</div>

					<div class="row">
                      <div class="container">
                        <form class="col s8 offset-s2" method="post">
                          <input type="hidden" name="_token" value="{{csrf_token()}}">
                          <div class="row">
                            <div class="input-field col s6">
                              <input id="first_name" type="text" name="first_name" class="validate" required>
                              <label for="first_name">First Name</label>
                            </div>
                            <div class="input-field col s6">
                              <input id="last_name" type="text" name="last_name" class="validate" required>
                              <label for="last_name">Last Name</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s12">
                              <input id="username" type="text" name="username" class="validate" required>
                              <label for="username">Username</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s12">
                              <input id="password" type="password" name="password" class="validate" required>
                              <label for="password">Password</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s12">
                              <input id="email" type="email" name="email" class="validate" required>
                              <label for="email">Email</label>
                            </div>
                          </div>

                          <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                              <i class="mdi-content-send right"></i>
                          </button>
                        </form>
                      </div>
                    </div>

@endsection
