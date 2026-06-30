@extends('frontend.layouts.master')
@section('content')
    <!-- Hero Content -->
    <div class="container text-center hero-content">
        <h1 class="hero-title">Blog</h1>
    </div>

    <main>

        <!--Contact Us-->
        <div class="container py-4 contact-mid-sec">
            <section id="contact-us" class="py-5">
                <div class="container">
                    <div class="row g-5">

                        <!-- Contact Info -->
                        <div class="col-lg-6  col-md-12 contact-info">
                            <div class="mb-4 d-flex align-items-center">
                                <div class="icon-circle me-3">
                                    <img src="{{ asset('frontend/images/icons/green-phone-icon.svg') }}" alt="call">
                                </div>
                                <span class="fs-5">+ 859-608-3869</span>
                            </div>

                            <div class="mb-4 d-flex align-items-center">
                                <div class="icon-circle me-3">
                                    <img src="{{ asset('frontend/images/icons/green-mail-icon.svg') }}" alt="mail-icon">
                                </div>
                                <span class="fs-5">farmily410.ma@gmail.com</span>
                            </div>

                            <div class="mb-4 d-flex align-items-center">
                                <div class="icon-circle me-3">
                                    <img src="{{ asset('frontend/images/icons/green-location-icon.svg') }}" alt="location">
                                </div>
                                <span class="fs-5">lexington, ky 40502 us</span>
                            </div>

                            <!-- Business Hours -->
                            <div class="bg-white shadow-sm business-hours-sec">
                                <h5 class="fw-bold mb-3">Hours</h5>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <p class="mb-1">Monday - Friday</p>
                                        <p class="text-muted">9:00am – 10:00pm</p>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <p class="mb-1">Saturday</p>
                                        <p class="text-muted">9:00am – 06:00pm</p>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <p class="mb-1">Sunday</p>
                                        <p class="text-muted">9:00am – 12:00pm</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Contact Form -->
                        <div class="col-lg-6  col-md-12 contact-form-section">
                            <div class="text-center mb-4">
                                <div class="mb-2 text-success fs-2"><img
                                        src="{{ asset('frontend/images/icons/heading-icon.svg') }}" alt="heading-icon">
                                </div>
                                <h2 class="fw-bold">Get In Touch</h2>
                            </div>

                            <form action="{{ route('contact.message') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="name" placeholder="Name" required>
                                </div>
                                <div class="mb-3">
                                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="phone" placeholder="Phone" required>
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="subject" placeholder="Subject">
                                </div>
                                <div class="mb-3">
                                    <textarea class="form-control" rows="4" name="message" placeholder="Message"></textarea>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" required>
                                    <label class="form-check-label">
                                        I Allow This Website To Store My Submission So They Can Respond To My Inquiry.
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-success w-100 py-2">
                                    SUBMIT <img src="{{ asset('frontend/images/icons/white-aerow.svg') }}" alt="aerow">
                                </button>
                            </form>
                        </div>

                    </div>


                </div>
            </section>



        </div>


        <div class="map-area">
            <div class="floating-img">
                <img src="{{ asset('frontend/images/side-contact-img.png') }}" alt="side-contact-img" class="w-100">
            </div>

            <div class="container-fluid px-0">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d50293.37687893768!2d-84.52572756346082!3d38.01594436266276!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88425b2a2680587d%3A0x11b778862151111d!2sLexington%2C%20KY%2040502%2C%20USA!5e0!3m2!1sen!2sin!4v1747047363963!5m2!1sen!2sin"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

    </main>
@endsection
