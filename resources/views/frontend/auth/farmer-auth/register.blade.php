@extends('frontend.layouts.master')
@section('content')
    <main>

        <!--registration-->
        <div class="container-fluid py-4">
            <div class="container">
                <div class="registration">
                    <div class="form-img"> <img src="{{ asset('frontend/images/user-registraton-img.png') }}"
                            alt="User Registration"> </div>
                    <div class="form-area">
                        <form action="{{ route('farmer.register') }}" method="POST" class="w-100" style="max-width: 500px;"
                            id="userForm">
                            @csrf
                            <div id="formFields">
                                <div class="form-heading text-center mb-4">
                                    <div class="mb-2 text-success fs-2"><img
                                            src="{{ asset('frontend/images/icons/heading-icon.svg') }}" alt="heading-icon">
                                    </div>
                                    <h2 class="fw-bold">Farmer Registration</h2>
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="name" placeholder="Name">
                                </div>
                                <div class="mb-3">
                                    <input type="tel" class="form-control" name="phone" placeholder="Phone">
                                </div>
                                <div class="mb-3">
                                    <input type="email" class="form-control" name="email" placeholder="Email">
                                </div>
                                <div class="mb-3">
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                </div>
                                <div class="mb-3">
                                    <input type="password" class="form-control" name="password_confirmation"
                                        placeholder="Confirm Password">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="farm-size" placeholder="Farm Size">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="crop-type" placeholder="Crop Type">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="location" placeholder="Location">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="production" placeholder="Production">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="Capacity">
                                </div>
                            </div>
                            <div class="mb-3 d-grid">
                                <button type="submit" class="btn btn-success btn-submit" id="submitBtn">SUBMIT</button>
                            </div>
                            <div class="form-footer">
                                <span id="toggleText">Already have an account? </span>
                                <a href="{{ route('login') }}">Login</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="form-shadow"><img src="{{ asset('frontend/images/shadow-form.png') }}" alt="shadow"
                        class="w-100"> </div>
            </div>
        </div>



    </main>
@endsection
