@extends('layouts.master')
@section('title', 'Kitchen')
@section('content')

    <div id="products">
        <div class="container p-4">
            <div class="row chef mb-2">
                <div class="col">
                    <div class="card text-white">
                        <img src="{{ asset('images/chef/chefmovingturkey2_612.jpg') }}" class="card-img" alt="...">
                        <div class="card-img-overlay d-flex align-items-end">
                            <div class="shadow-lg p-3">
                                <h5 class="card-title">Sweet everything</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut, consectetur culpa dolore ea
                                    eligendi.</p>
                                <p class="card-text text-secondary">Last updated 3 days ago</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-white">
                        <img src="{{ asset('images/chef/dale-talde-fried-chicken.webp') }}" class="card-img" alt="...">
                        <div class="card-img-overlay">
                            <div class="shadow p-3">
                                <h5 class="card-title">Sweet everything</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, nihil, repellendus?</p>
                                <p class="card-text text-secondary">Last updated 1 hour ago</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if(count($products))
                <div class="row">
                    <div class="col">
                        <div class="px-5 mb-4 bg-light rounded-3">
                            <div class="container-fluid py-3">
                                <h1 class="fw-bold text-center">Explore our various dishes😁</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    @foreach($products as $product)
                        <div class="col-3 pb-3 chicken">
                            <div class="card product-box">
                                <div class="product-img">
                                    <div class="product-ribbon badge bg-warning"> Trending</div>
                                    <div class="product-wishlist"><a href="javascript:void(0)"> <i class="fas fa-heart"></i> </a></div>
                                    <img src="{{ asset('images/kuku/' . $product->image) }}" class="card-img-top" alt="...">
                                </div>
                                <div class="card-body text-center product-content py-5">
                                    <h6 class="mb-1"><a href="#" class="text-dark">{{ $product->title }}</a></h6>
                                    <p class="text-muted font-size-13">-------</p>
                                    <h6 class="mt-2 mb-0">
                                        @if($product->discount)
                                            <span class="text-danger small"><del>KES {{ $product->price }}</del> | </span>
                                            KES {{ calcDiscountPrice($product) }}
                                        @else KSH {{ $product->price }} @endif
                                    </h6>
                                    <div class="product-color">
                                        <a href="{{ route('products.show', ['id' => $product->id]) }}" class="btn btn-sm btn-outline-danger">View
                                            Food</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="row justify-content-center py-5 my-5">
                    <div class="col-auto card p-5">
                        <h4>Nothing in the kitchen yet☹</h4>
                        <h6>But worry not... We will give you a heads up as soon as foodcellent is ready!🤩</h6>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="pagination">{{ $products->links() }}</div>
            </div>
        </div>
    </div>

    </div>
    <!-- End Navigation Sticky ID Section -->

@endsection
