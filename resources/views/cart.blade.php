@extends('layouts.master')
@section('title', 'Cart')
@section('content')

    <div id="cart" class="container p-10">
        <!--Section: Block Content-->
        <section>
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col-lg-8">
                    <div class="card wish-list mb-3">
                        <div class="card-body">
                            <h5 class="mb-4">Cart (<span>2</span> items)</h5>
                            <div class="row mb-4">
                                <div class="col-md-5 col-lg-3 col-xl-3">
                                    <div class="bg-secondary shadow rounded py-3 mb-3 mb-md-0">
                                        <img class="img-fluid w-100" src="{{ asset('images/carousel/1.jpg') }}" alt="Sample">
                                    </div>
                                </div>
                                <div class="col-md-7 col-lg-9 col-xl-9">
                                    <div>
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h5 class="mb-3">Amritsari Chicken Masala</h5>
                                                <p class="mb-3 text-muted text-uppercase small">PIECES - 6</p>
                                                <p class="mb-3 text-muted text-uppercase small">Size: M</p>
                                            </div>
                                            <div>
                                                <div class="def-number-input number-input safari_only mb-0 w-100">
                                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                                                            class="minus"></button>
                                                    <input class="quantity" min="0" name="quantity" value="1" type="number" aria-label="">
                                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                                            class="plus"></button>
                                                </div>
                                                <small id="passwordHelpBlock" class="form-text text-muted text-center">(Note, 1 piece)</small>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <a href="#!" type="button" class="card-link-secondary small text-uppercase mr-3"><i
                                                        class="fas fa-trash-alt mr-1"></i> Remove item </a>
                                                <a href="#!" type="button" class="card-link-secondary small text-uppercase"><i
                                                        class="fas fa-heart mr-1"></i> Move to wish list </a>
                                            </div>
                                            <p class="mb-0"><span><strong>KSH 17.99/=</strong></span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-4">
                            <div class="row mb-4">
                                <div class="col-md-5 col-lg-3 col-xl-3">
                                    <div class="bg-secondary shadow rounded py-3 mb-3 mb-md-0">
                                        <img class="img-fluid w-100" src="{{ asset('images/kuku/9cff11d6c12de722215055dde430ce02-700.jpg') }}" alt="Sample">
                                    </div>
                                </div>
                                <div class="col-md-7 col-lg-9 col-xl-9">
                                    <div>
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h5 class="mb-3">Kerala Chicken Roast</h5>
                                                <p class="mb-3 text-muted text-uppercase small">PIECES - 3</p>
                                                <p class="mb-3 text-muted text-uppercase small">Size: M</p>
                                            </div>
                                            <div>
                                                <div class="def-number-input number-input safari_only mb-0 w-100">
                                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                                                            class="minus"></button>
                                                    <input class="quantity" min="0" name="quantity" value="1" type="number">
                                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                                            class="plus"></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <a href="#!" type="button" class="card-link-secondary small text-uppercase mr-3"><i
                                                        class="fas fa-trash-alt mr-1"></i> Remove item </a>
                                                <a href="#!" type="button" class="card-link-secondary small text-uppercase"><i
                                                        class="fas fa-heart mr-1"></i> Move to wish list </a>
                                            </div>
                                            <p class="mb-0"><span><strong>KSH 35.99/=</strong></span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-4">
                            <div class="row mb-4">
                                <div class="col-md-5 col-lg-3 col-xl-3">
                                    <div class="bg-secondary shadow rounded py-3 mb-3 mb-md-0">
                                        <img class="img-fluid w-100" src="{{ asset('images/kuku/a1e56130c9ae44b6a0ba0536-1000x625.jpg') }}" alt="Sample">
                                    </div>
                                </div>
                                <div class="col-md-7 col-lg-9 col-xl-9">
                                    <div>
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h5 class="mb-3">Chicken Chettinad</h5>
                                                <p class="mb-3 text-muted text-uppercase small">PIECES - 7</p>
                                                <p class="mb-3 text-muted text-uppercase small">Size: M</p>
                                            </div>
                                            <div>
                                                <div class="def-number-input number-input safari_only mb-0 w-100">
                                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                                                            class="minus"></button>
                                                    <input class="quantity" min="0" name="quantity" value="1" type="number">
                                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                                            class="plus"></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <a href="#!" type="button" class="card-link-secondary small text-uppercase mr-3"><i
                                                        class="fas fa-trash-alt mr-1"></i> Remove item </a>
                                                <a href="#!" type="button" class="card-link-secondary small text-uppercase"><i
                                                        class="fas fa-heart mr-1"></i> Move to wish list </a>
                                            </div>
                                            <p class="mb-0"><span><strong>KSH 35.99/=</strong></span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-primary mb-0">
                                <i class="fas fa-info-circle mr-1"></i> Do not delay the purchase, adding
                                items to your cart does not mean booking them.
                            </p>
                        </div>
                    </div>
                    <!-- Card -->

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4">

                    <!-- Card -->
                    <div class="card mb-3">
                        <div class="card-body">

                            <h5 class="mb-3">The total amount of</h5>

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                    Temporary amount<span>KSH 17.99/=</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    Shipping<span>Gratis</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                    <div>
                                        <strong>The total amount of</strong>
                                        <strong><p class="mb-0">(including VAT)</p></strong>
                                    </div>
                                    <span><strong>KSH 35.99/=</strong></span>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-primary btn-block waves-effect waves-light">Checkout</button>
                        </div>
                    </div>
                    <!-- Card -->

                    <!-- Card -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <a class="dark-grey-text d-flex justify-content-between" data-bs-toggle="collapse" href="#discount"
                               aria-expanded="false" aria-controls="discount">
                                Add a discount code (optional)
                                <span><i class="fas fa-chevron-down pt-1"></i></span>
                            </a>
                            <div class="collapse" id="discount">
                                <div class="mt-3">
                                    <div class="md-form md-outline mb-0">
                                        <input type="text" id="discount-code1" class="form-control font-weight-light"
                                               placeholder="Enter discount code" aria-label="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Grid column-->
            </div>
            <!--Grid row-->
        </section>
        <!--Section: Block Content-->
    </div>
    </div>

@endsection
