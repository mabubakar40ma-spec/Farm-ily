// JavaScript to toggle search box
document.addEventListener('DOMContentLoaded', function () {
    const searchBtn = document.getElementById('searchBtn');
    const searchBox = document.getElementById('searchBox');

    if (searchBtn && searchBox) {
        searchBtn.addEventListener('click', function () {
            if (searchBox.style.display === 'none' || searchBox.style.display === '') {
                searchBox.classList.add('search-input-visible');
                searchBox.style.display = 'block';
                searchBox.focus(); // Focus after showing
            } else {
                searchBox.classList.remove('search-input-visible');
                searchBox.style.display = 'none';
            }
        });
    }
});


// farming listig script
$(document).ready(function () {
    $('.farmer-carousel').owlCarousel({
        loop: true,
        margin: 20,
        nav: false,
        dots: true,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        stagePadding: 50, // This will create space on left and right
        responsive: {
            0: {
                items: 1,
                stagePadding: 20 // Adjust for smaller screens
            },
            600: {
                items: 2,
                stagePadding: 30
            },
            1000: {
                items: 3,
                stagePadding: 50
            },
            1200: {
                items: 3,
                stagePadding: 80 // Wider padding for larger screens
            },
            1440: {
                items: 4,
                stagePadding: 80 // Wider padding for larger screens
            }
        }
    });
});

// testimonial script
$(document).ready(function () {
    $('.testimonial-carousel').owlCarousel({
        loop: true,
        margin: 20,
        nav: false,
        dots: true,
        autoplay: true,
        autoplayTimeout: 5000,
        items: 1
    });

    // Custom Navigation
    $('.prev-btn').click(function () {
        $('.testimonial-carousel').trigger('prev.owl.carousel');
    });

    $('.next-btn').click(function () {
        $('.testimonial-carousel').trigger('next.owl.carousel');
    });
});



