@extends('frontend.layouts.master')
@section('content')
    <!-- Hero Content -->
    <div class="container text-center hero-content">
        <h1 class="hero-title">Payment Cancel</h1>
    </div>

    <!--==========================
                LISTING PAGE START
            ===========================-->
    <section id="wsus__package">
        <div class="wsus__package_overlay">
            <div class="container">
                <div class="text-center">
                    <i style="font-size: 100px; color:red" class="fas fa-times-circle"></i>
                    <h5>Payment Has been Canceled</h5>
                    @if ($error->has('error'))
                        <div class="alert alert-danger mt-3">{{ $errors->first('error') }}</div>
                    @endif
                    <a href="{{ url('/') }}" class="btn btn-warning mt-3">Go Home</a>
                </div>
            </div>
        </div>
    </section>

    <!--==========================
                LISTING PAGE START
            ===========================-->
@endsection
