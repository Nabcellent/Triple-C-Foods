@extends('layouts.master')
@section('title', 'Home')
@section('content')

    <div class="carousel slide" id="carousel" data-bs-ride="carousel">

        <!-- Carousel Content -->

        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="5000">
                <img class="d-block w-100" src="{{ asset('images/carousel/1.jpg') }}" alt="">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-end">
                            <div class="d-none d-md-block col-md-11 col-lg-9 col-xl-8 bg-dark text-right">
                                <h2 class="pb-3"><b>GOOD FOOD === GOOD MOOD</b></h2>
                                <div class="border-top border-white mb-3 w-75 ml-auto"></div>
                                <blockquote>
                                    <p class="lead">We bring professional chefs to your home to prepare delicious, customized meals at a fraction of
                                        the cost.</p>
                                    <footer>~ Lil Nabz</footer>
                                </blockquote>
                                <a href="#social-media-sticky" class="btn btn-primary btn-md">View menu...</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="1000"><img class="d-block w-100" src="{{ asset('images/carousel/2.jpg') }}" alt=""></div>
            <div class="carousel-item" data-bs-interval="5000">
                <img class="d-block w-100" src="{{ asset('images/carousel/3.jpg') }}" alt="">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row">
                            <div class="d-none d-md-block col-md-9 col-lg-7 bg-white text-left text-dark">
                                <h3>Discover a unique <br> experience.</h3>
                                <div class="border-top border-dark my-1 w-75"></div>
                                <blockquote>
                                    <p class="lead">You don't need a silver fork to eat good food.</p>
                                    <footer><i>~ Lil Nabz</i></footer>
                                </blockquote>
                                <a href="#" class="btn btn-light btn-md">Learn More...</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Carousel Content -->

        <!-- Carousel Indicators -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <!-- End Carousel Indicators -->

    </div>
    <!-- End Image Carousel -->

    </div>
    <!-- End Navigation Sticky ID Section -->

    <div id="social-media-sticky">

        <!-- Start Social Jumbotron -->

        <div class="jumbotron sticky-top">
            <div class="container h-100">
                <div class="row justify-content-center text-center h-100 align-items-center">
                    <div class="d-none d-xl-block col-xl-6 pt-1">
                        <h3 class="text-white">Connect with us on social media!</h3>
                    </div>
                    <div class="col-sm-10 col-md-8 col-lg-7 col-xl-6 pt-1">
                        <ul class="social">
                            <li>
                                <a href="https://twitter.com/Pillarsofhope4?s=09" target="_blank" title="Twitter">
                                    <i class="fab fa-twitter" style="color: #00aced"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.facebook.com/Pillars-Childrens-home-Daystar-Athi-River-1855146178052221/" target="_blank"
                                   title="Facebook">
                                    <i class="fab fa-facebook" style="color: #3b5998"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://instagram.com/pillarsofhopeschildrenhome?igshid=zrm41xd9sj0a" target="_blank" title="Instagram">
                                    <i class="fab fa-instagram" style="color: #3f729b"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://youtube.com/channel/UCzImEvkZIRuKmoDUXfSvogg" target="_blank" title="Youtube">
                                    <i class="fab fa-youtube" style="color: #c4302b"></i>
                                </a>
                            </li>
                            <li>
                                <a href="mailto:pillarsofhopeathiriver2017@gmail.com" target="_blank" title="Gmail">
                                    <i class="fas fa-envelope" style="color: #0e76a8"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Social Jumbotron -->


        <!-- Main Page Heading -->

        <div class="col-12 mt-5 m-auto main_page_content">
            <h1 class="display-4 text-center text-dark pt-4">LET'S GET YOU SERVED!!! 😍</h1>
            <div class="border-top border-dark w-75 mx-auto my-5 my-sm-3"></div>
            <div class="row justify-content-center mb-4 menu">
                <div class="col-12 text-center">
                    <h3>RAW CHICKEN</h3>
                    <div class="border-top border-light w-100 mx-auto my-3"></div>
                </div>
                <div class="col-md-3 align-self-center">
                    <ol>
                        <li>Drumsticks</li>
                        <li>Winglets</li>
                        <li>Chicken liver</li>
                        <li>Raw Keema</li>
                        <li>Boneless Breast</li>
                        <li>Whole chicken</li>
                    </ol>
                </div>
                <div class="col-md-9 align-self-center swiper">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide"
                                 style="background-image:url({{ asset('images/kuku/9cff11d6c12de722215055dde430ce02-700.jpg') }})"></div>
                            <div class="swiper-slide" style="background-image:url({{ asset('images/kuku/715490.jpg') }})"></div>
                            <div class="swiper-slide" style="background-image:url({{ asset('images/kuku/Chicken-meat-food_1920x1440.jpg') }})"></div>
                        </div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center mb-4 menu">
                <div class="col-12 text-center">
                    <h3>EASY COOK</h3>
                    <div class="border-top border-light w-100 mx-auto my-3"></div>
                </div>
                <div class="col-md-9 align-self-center swiper">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide" style="background-image:url({{ asset('images/kuku/Chicken-meat-food_1920x1440.jpg') }})"></div>
                            <div class="swiper-slide" style="background-image:url({{ asset('images/kuku/DSC_6705111.jpg') }})"></div>
                            <div class="swiper-slide" style="background-image:url({{ asset('images/4757510.jpg') }})"></div>
                            <div class="swiper-slide"
                                 style="background-image:url({{ asset('images/kuku/Chicken_food_meat_berries-1563105.jpg!d.jpeg') }})"></div>
                            <div class="swiper-slide" style="background-image:url({{ asset('images/kuku/715490.jpg') }})"></div>
                        </div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <div class="col-md-3 align-self-center">
                    <ol>
                        <li>Nuggets</li>
                        <li>Pop Corn Bites</li>
                        <li>Chicken Burger Patty</li>
                        <li>Chicken Lollypop</li>
                        <li>Murgh Tikka</li>
                        <li>Punjabi stick</li>
                        <li>Oriental Stick</li>
                        <li>Churtney Murgh Tikka</li>
                    </ol>
                </div>
            </div>
        </div>

        <!-- Three Column Section -->

        <div class="container">
            <div class="row justify-content-center mt-5 text-center">
                <div class="col-md-6 col-lg-4 py-3">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-square fa-stack-2x"></i>
                        <i class="fas fa-home fa-stack-1x fa-inverse" style="color: #026db6;"></i>
                    </span>
                </div>
                <div class="col-md-6 col-lg-4 py-3">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-square fa-stack-2x"></i>
                        <i class="fas fa-hand-holding-heart fa-stack-1x fa-inverse" style="color: red;"></i>
                    </span>
                </div>
                <div class="col-md-6 col-lg-4 py-3">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-square fa-stack-2x"></i>
                        <i class="fas fa-utensils fa-stack-1x fa-inverse"></i>
                    </span>
                    <p class="lead"></p>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col text-center">
                    <p class="lead">From the comfort of your humble abode... Experience Love at first bite...!</p>
                </div>
            </div>
        </div>
        <!-- End Three Column Section -->

        <!-- border -->
        <div class="border-top border-dark w-100 mx-auto my-3"></div>

        <!-- Start Two Column Section -->

        <div class="container chef-wording mt-5">
            <div class="row py-4">
                <div class="col-lg-5 mb-4 px-5 my-lg-auto">
                    <h2 class="font-weight-bold mb-3" style="color:var(--food-red)">Sound familiar? If so, this experience is for you.</h2>
                    <p class="mb-4">
                        - You’re too busy to prepare meals <br>
                        - You’d rather spend time with your family or doing something you love <br>
                        - You want healthy, home-cooked meals <br>
                        - Meal delivery services are too expensive <br>
                        - You want to experience something different <br>
                    </p>
                    <a href="#" class="btn btn-outline-dark btn-lg" data-toggle="collapse" data-target=".the_place">This is the place!</a>
                    <div class="card collapse the_place" style="width: 20rem;">
                        <div class="card-body bg-light">
                            <h4 class="card-title">Support us through Account Name: <b>Pillars of Hope Children's Home</b></h4>
                            <h5 class="card-subtitle mb-2">M-pesa</h5>
                            <ul>
                                <li>Pay bill number - <em>874580</em></li>
                                <li>Account Number - <em>Your Name</em></li>
                            </ul>
                            <h5 class="card-subtitle mb-2">Co-op Bank</h5>
                            <ul>
                                <li>Account Number - <em>011285664984200</em></li>
                            </ul>
                            <h5 class="card-subtitle mb-2">NCBA Bank</h5>
                            <ul>
                                <li>Branch - <em>Kitengela</em></li>
                                <li>Account Number - <em>1004101002</em></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 align-self-center">
                    <img src="{{ asset('images/illustrations/undraw_cooking_lyxy.svg') }}" alt="Food image" width="100%">
                </div>
            </div>
        </div>
        <!-- End Two Column Section -->

    </div>
    <!-- End Social Media Sticky -->


    <!-- Start Fixed Background IMG -->

    <div class="fixed-background">
        <div class="fixed-wrap">
            <div class="fixed position-fixed" style="background-image: url({{ asset('images/index.jpg') }})">
            </div>
        </div>
    </div>
    <!-- End Fixed Background IMG -->

    <div id="text-button-sticky">

        <!-- Three Column Section -->

        <div class="col-12 text-center mt-5">
            <h2 class="display-4">When you love your perfect plate 😋</h2>
            <div class="border-top border-dark w-50 mx-auto my-3"></div>
        </div>

        <div class="container-fluid testimonials">
            <div class="row justify-content-evenly my-5">
                <div class="col-md-3 mb-3 text-center">
                    <div class="card shadow border-0" style="width: 18rem;">
                        <div class="card-body py-5 px-lg-4">
                            <div class="card-title mb-3">
                                <img src="{{ asset('images/faces/1.jpg') }}" class="mx-auto" alt="">
                            </div>
                            <figure>
                                <q>Just fell in love with the jogoo! Can’t wait to try more Awesome Foods!! Thank you!!!</q>
                                <figcaption class="small text-muted mt-3"><i>~ Heather Darcy</i></figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mt-5 text-center">
                    <div class="card shadow border-0 mt-5" style="width: 18rem;">
                        <div class="card-body py-5 px-lg-4">
                            <div class="card-title mb-3">
                                <img src="{{ asset('images/faces/2.jpg') }}" class="mx-auto" alt="">
                            </div>
                            <figure>
                                <q>I am so happy I discovered you guys! Loved the chicken, just bought tempura wings and onion rings. Mmm, and those
                                    wings are hot!!</q>
                                <figcaption class="small text-muted mt-3"><i>~ Kuku-licious 🤤</i></figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3 text-center">
                    <div class="card shadow border-0" style="width: 18rem;">
                        <div class="card-body py-5 px-lg-4">
                            <div class="card-title mb-3">
                                <img src="{{ asset('images/faces/3.jpg') }}" class="mx-auto" alt="">
                            </div>
                            <figure>
                                <q>Mambo ya kuku achia waluhya waongee... Wewe enda huko juu upige order!</q>
                                <figcaption class="small text-muted mt-3"><i>~ Ntakufinyaa</i></figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Three Column Section -->

        <!-- border -->

    </div>
    <!-- End Text Button Sticky -->

    <section id="three" class="bg-light rounded shadow">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <img src="{{ asset('images/kuku/DSC_6705111.jpg') }}" alt="">
                </div>
                <div class="col subscribe">
                    <h2>Subscribe</h2>
                    <hr>
                    <h4 class="my-3">Don't miss out on our newest recepies🤤😋</h4>
                    <form action="#">
                        <div class="form-group">
                            <input type="email" aria-label="" class="form-control" placeholder="Enter your email address here...">
                        </div>
                        <p class="mb-2">Sign up with your email address to receive news and updates.</p>
                        <div class="form-group text-end">
                            <button type="submit" class="btn btn-secondary">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
