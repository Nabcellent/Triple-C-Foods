$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

$(() => {
    if($('.scroll-to-top').length) {
        window.addEventListener('scroll', function () {
            if(document.getElementsByTagName('html')[0].scrollTop > 1000) {
                document.querySelector('.scroll-to-top').style.display = 'flex';
            } else {
                document.querySelector('.scroll-to-top').style.display = 'none';
            }
        })
    }
});

const swiper = new Swiper('.swiper-container', {
    effect: 'coverflow',
    loop: true,
    grabCursor: true,
    centeredSlides: true,
    autoplay: {
        delay: 5000,
        disableOnInteraction: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    pagination: {
        el: '.swiper-pagination',
        dynamicBullets: true,
    },
    coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: true,
    },
    breakpoints: {
        576: {
            slidesPerView: 1,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 2,
            spaceBetween: 40,
        },
        1024: {
            slidesPerView: 2,
            spaceBetween: 50,
        },
    }
});
