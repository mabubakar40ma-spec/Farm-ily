@extends('frontend.layouts.master')
@section('content')
    <!-- Hero Content -->
    <div class="container text-center hero-content">
        <h1 class="hero-title">Payment Success</h1>
    </div>




    <!--==========================
                LISTING PAGE START
            ===========================-->
    <section id="wsus__package">
        <div class="wsus__package_overlay">
            <div class="container">
                <div class="text-center">
                    <i style="font-size: 100px; color:green" class="fas fa-check-circle"></i>
                    <h5>Payment Has been Completed</h5>
                    <a href="{{ route('user.dashboard') }}" class="btn btn-warning mt-3">Dahsboard</a>
                </div>
            </div>
        </div>
    </section>

    <!--==========================
                LISTING PAGE START
            ===========================-->
@endsection
