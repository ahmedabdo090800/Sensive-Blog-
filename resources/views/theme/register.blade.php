@extends('theme.master')
@section('title','Register')

@section('content')
@include('theme.partials.hero',['title'=>'Register'])
  <!-- ================ contact section start ================= -->
  <section class="section-margin--small section-margin">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <form class="form-contact contact_form" action="{{ route('register.store') }}" method="POST" id="contactForm" novalidate="novalidate">
            @csrf

            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <input class="form-control border" name="name" id="name" type="text" placeholder="Enter your name" :value="old('name')" required autofocus autocomplete="name">
                  <x-input-error :messages="$errors->get('name')" class="mt-2" />

                </div>
                <div class="form-group">
                  <input class="form-control border" name="email" id="email" type="email" placeholder="Enter email address" :value="old('email')" required autocomplete="username">
                  <x-input-error :messages="$errors->get('email')" class="mt-2" />

                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <input class="form-control border" name="password" id="name" type="password" placeholder="Enter your password">
                  <x-input-error :messages="$errors->get('password')" class="mt-2" />

                </div>
                <div class="form-group">
                  <input class="form-control border" name="password_confirmation" type="password" placeholder="Enter your password confirmation">
                  <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                </div>
              </div>
            </div>
            <div class="form-group text-center text-md-right mt-3">
              <a href="{{route('login')}}" class="mx-3">Already Have an account?</a>
              <button type="submit" class="button button--active button-contactForm">Register</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
	<!-- ================ contact section end ================= -->



    
@endsection