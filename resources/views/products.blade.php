@extends('layouts.master')
@section('title', 'Home')
@section('content')

    <div id="products">
        <div class="container p-4">
            <div class="row chef mb-2">
                <div class="col">
                    <div class="card text-white">
                        <img src="{{ asset('images/chef/chefmovingturkey2_612.jpg') }}" class="card-img" alt="...">
                        <div class="card-img-overlay d-flex align-items-end">
                            <div class="shadow-lg p-3">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a wider card with supporting text below as a.</p>
                                <p class="card-text">Last updated 3 mins ago</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-white">
                        <img src="{{ asset('images/chef/dale-talde-fried-chicken.webp') }}" class="card-img" alt="...">
                        <div class="card-img-overlay">
                            <div class="shadow p-3">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <p class="card-text">Last updated 3 mins ago</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="px-5 mb-4 bg-light rounded-3">
                        <div class="container-fluid py-5">
                            <h1 class="display-5 fw-bold">Our menu for you😁</h1>
                            <p class="col-md-8">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad cumque ea enim exercitationem fugiat!</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-4 px-5 py-3 chicken">
                    <div class="card">
                        <img src="{{ asset('images/kuku/9cff11d6c12de722215055dde430ce02-700.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-outline-danger">Add to Order</a>
                        </div>
                    </div>
                </div>
                <div class="col-4 px-5 py-3 chicken">
                    <div class="card">
                        <img src="{{ asset('images/kuku/715490.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-outline-danger">Add to Order</a>
                        </div>
                    </div>
                </div>
                <div class="col-4 px-5 py-3 chicken">
                    <div class="card">
                        <img src="{{ asset('images/kuku/a1e56130c9ae44b6a0ba0536-1000x625.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-outline-danger">Add to Order</a>
                        </div>
                    </div>
                </div>
                <div class="col-4 px-5 py-3 chicken">
                    <div class="card">
                        <img src="{{ asset('images/kuku/chicken-food-lunch-meal.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-outline-danger">Add to Order</a>
                        </div>
                    </div>
                </div>
                <div class="col-4 px-5 py-3 chicken">
                    <div class="card">
                        <img src="{{ asset('images/kuku/Chicken-meat-food_1920x1440.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-outline-danger">Add to Order</a>
                        </div>
                    </div>
                </div>
                <div class="col-4 px-5 py-3 chicken">
                    <div class="card">
                        <img src="{{ asset('images/kuku/Chicken_food_meat_berries-1563105.jpg!d.jpeg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-outline-danger">Add to Order</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    <!-- End Navigation Sticky ID Section -->

@endsection
