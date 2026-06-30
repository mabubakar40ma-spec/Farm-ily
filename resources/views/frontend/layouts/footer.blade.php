<footer class="footer-section">
    <div class="top-footer-border">
        <img src="{{ asset('frontend/images/footer-top-border.webp') }}" alt="footer-border" class="img-fluid">
    </div>
    <div class="container py-5">
        <div class="row">
            <!-- Logo and Description -->
            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                <div class="footer-logo">
                    <div class="fooer-logo-sec"><img src="{{ asset('frontend/images/fram-logo.svg') }}" alt="logo">
                    </div>
                    <p class="footer-desc">
                        We carry out our mission based on the values of impeccable business reputation,
                        social responsibility, respect for human dignity, and synergistic, result-oriented
                        partnerships.
                    </p>
                    <div class="social-icons mt-3">
                        <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/"><i class="fab fa-linkedin-in"></i></a>
                        <a href="https://in.linkedin.com/"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>

            <!-- Useful Links -->
            <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
                <h5 class="footer-heading">Useful Links</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('about') }}">About Us</a></li>
                    <li><a href="#">Why Choose Us</a></li>
                    <li><a href="#">Meet Our Team</a></li>
                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                    <li><a href="#">FAQs</a></li>
                </ul>
            </div>

            <!-- Explore Links -->
            <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
                <h5 class="footer-heading">Explore</h5>
                <ul class="list-unstyled">
                    <li><a href="#">What We Offer</a></li>
                    <li><a href="#">Latest News</a></li>
                    <li><a href="#">Project</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>

            <!-- Contact Information -->
            <div class="col-lg-4 col-md-6">
                <h5 class="footer-heading">Connect with us</h5>
                <p class="support-row"> <strong><i class="fas fa-paper-plane me-2"></i> General
                        enquiries:</strong> {{ config('settings.site_email') }}</p>
                <p class="support-row support-call"><strong><i class="fas fa-headset me-2"></i> Give us a
                        call:</strong> <span class="text-white">{{ config('settings.site_phone') }}</span></p>
            </div>
        </div>

        <!-- Copyright Text -->
        <hr class="footer-divider">
        <div class="text-center text-white pt-3 footer-bottom">
            &copy; Copyright 2025. All Rights Reserved.
        </div>
    </div>
</footer>
