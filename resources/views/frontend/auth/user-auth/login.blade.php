@extends('frontend.layouts.master')

@section('content')
    <!-- Hero Content -->

    <main>

        <!--registration-->
        <div class="container-fluid py-4">
            <div class="container">
                <div class="registration">
                    <div class="form-img"> <img src="{{ asset('frontend/images/registraton-img.png') }}" alt="registration">
                    </div>
                    <div class="form-area">
                        <form action="{{ route('login') }}" method="POST" class="w-100" style="max-width: 500px;"
                            id="userForm">
                            @csrf
                            <div id="formFields">
                                <div class="form-heading text-center mb-4">
                                    <div class="mb-2 text-success fs-2"><img
                                            src="{{ asset('frontend/images/icons/heading-icon.svg') }}" alt="heading-icon">
                                    </div>
                                    <h2 class="fw-bold text-capitalize">user login</h2>
                                </div>

                                <div class="mb-3">
                                    <input type="email" class="form-control" name="email" placeholder="Email">
                                </div>
                                <div class="mb-3">
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="mb-3 d-grid">
                                <button type="submit" class="btn btn-success btn-submit" id="submitBtn">SUBMIT</button>
                            </div>
                            <div class="form-footer">
                                <span id="toggleText">Don't have an account? </span>
                                <a href="{{ route('register') }}">Register</a>
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
