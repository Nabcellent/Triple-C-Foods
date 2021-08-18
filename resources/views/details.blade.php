@extends('layouts.master')
@section('title', 'Details - ' . $product->title)
@section('content')

    <div id="details">
        <div class="row pt-4">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-5">
                                <div class="product-detail">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                <a class="nav-link active" id="product-1-tab" data-bs-toggle="pill" href="#product-1" role="tab">
                                                    <img src="{{ asset('images/kuku/' . $product->image) }}" alt="" class="img-fluid mx-auto d-block tab-img rounded">
                                                </a>
                                                <a class="nav-link" id="product-2-tab" data-bs-toggle="pill" href="#product-2" role="tab">
                                                    <img src="{{ asset('images/kuku/chicken-food-lunch-meal.jpg') }}" alt="" class="img-fluid mx-auto d-block tab-img rounded">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-9">
                                            <div class="tab-content position-relative" id="v-pills-tabContent">
                                                <div class="product-wishlist">
                                                    <a href="#"> <i class="fas fa-heart"></i> </a>
                                                </div>
                                                <div class="tab-pane fade show active" id="product-1" role="tabpanel">
                                                    <div class="product-img">
                                                        <img src="{{ asset('images/kuku/' . $product->image) }}" alt="" class="img-fluid mx-auto d-block"
                                                             data-zoom="assets/images/product/img-1.png">
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="product-2" role="tabpanel">
                                                    <div class="product-img">
                                                        <img src="{{ asset('images/kuku/chicken-food-lunch-meal.jpg') }}" alt="" class="img-fluid mx-auto d-block">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row text-center mt-2">
                                                <div class="col-sm-6">
                                                    <div class="d-grid">
                                                        <a href="{{ route('cart.store', ['id' => $product->id]) }}" class="btn btn-primary waves-effect waves-light mt-2 me-1">
                                                            <i class="uil uil-shopping-cart-alt me-2"></i> Add to cart
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="d-grid">
                                                        <button type="button" class="btn btn-light waves-effect  mt-2 waves-light">
                                                            <i class="uil uil-shopping-basket me-2"></i>Order now
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-7">
                                <div class="mt-4 mt-xl-3 ps-xl-4">
                                    <h4 class="font-size-20 mb-3">{{ $product->title }}</h4>
                                    <div class="text-muted"><span class="badge bg-success font-size-14 me-1"><i class="mdi mdi-star"></i> 4.2</span>
                                        234 Reviews
                                    </div>
                                    <h6 class="mt-4 pt-2">
                                        <del class="text-muted me-2">$280</del>
	                                    KSH {{ $product->price }} <span class="text-danger font-size-14 ms-2">- 20 % Off</span></h6>
                                    <div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mt-3">
                                                    <h5 class="font-size-14">Specification :</h5>
                                                    <ul class="list-unstyled product-desc-list text-muted">
                                                        <li><i class="mdi mdi-circle-medium me-1 align-middle"></i> High Quality</li>
                                                        <li><i class="mdi mdi-circle-medium me-1 align-middle"></i> Leather</li>
                                                        <li><i class="mdi mdi-circle-medium me-1 align-middle"></i> All Sizes available</li>
                                                        <li><i class="mdi mdi-circle-medium me-1 align-middle"></i> 4 Different Color</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mt-3">
                                                    <h5 class="font-size-14">Services :</h5>
                                                    <ul class="list-unstyled product-desc-list text-muted">
                                                        <li><i class="uil uil-exchange text-primary me-1 font-size-16"></i> 10 Days Replacement</li>
                                                        <li><i class="uil uil-bill text-primary me-1 font-size-16"></i> Cash on Delivery available
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-5 col-sm-4">
                                                <div class="mt-3">
                                                    <h5 class="font-size-14 mb-3">Select Quantity :</h5>
                                                    <select class="form-select w-sm">
                                                        <option value="1">3</option>
                                                        <option value="2">4</option>
                                                        <option value="3">5</option>
                                                        <option value="4">6</option>
                                                        <option value="5" selected>7</option>
                                                        <option value="6">8</option>
                                                        <option value="7">9</option>
                                                        <option value="8">10</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="mt-4">
                            <h5 class="font-size-14 mb-3">Product description: </h5>
                            <div class="product-desc">
                                <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="desc-tab" data-bs-toggle="tab" href="#desc" role="tab">Description</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="specifi-tab" data-bs-toggle="tab" href="#specifi" role="tab">Specifications</a>
                                    </li>
                                </ul>
                                <div class="tab-content border border-top-0 p-4">
                                    <div class="tab-pane fade show active" id="desc" role="tabpanel">
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2">
                                                <div><img src="{{ asset('images/kuku/' . $product->image) }}" alt="" class="img-fluid mx-auto d-block"></div>
                                            </div>
                                            <div class="col-sm-9 col-md-10">
                                                <div class="text-muted p-2">
                                                    <p>{{ $product->description }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="specifi" role="tabpanel">
                                        <div class="table-responsive">
                                            <table class="table table-nowrap mb-0">
                                                <tbody>
                                                <tr>
                                                    <th scope="row" style="width: 20%;">Category</th>
                                                    <td>Shoes</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Brand</th>
                                                    <td>Nike</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Color</th>
                                                    <td>Gray</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Quality</th>
                                                    <td>High</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Material</th>
                                                    <td>Leather</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <h5 class="font-size-14 mb-3">Reviews : </h5>
                            <div class="text-muted mb-3"><span class="badge bg-success font-size-14 me-1"><i class="mdi mdi-star"></i> 4.2</span> 234
                                Reviews
                            </div>
                            <div class="border p-4 rounded">
                                <div class="border-bottom pb-3">
                                    <p class="float-sm-end text-muted font-size-13">12 July, 2020</p>
                                    <div class="badge bg-success mb-2"><i class="mdi mdi-star"></i> 4.1</div>
                                    <p class="text-muted mb-4">It will be as simple as in fact, it will be Occidental. It will seem like
                                        simplified</p>
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <h5 class="font-size-15 mb-0">Samuel</h5></div>
                                        <div class="flex-shrink-0">
                                            <ul class="list-inline product-review-link mb-0">
                                                <li class="list-inline-item"><a href="#"><i class="uil uil-thumbs-up"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="uil uil-comment-alt-message"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-bottom py-3">
                                    <p class="float-sm-end text-muted font-size-13">06 July, 2020</p>
                                    <div class="badge bg-success mb-2"><i class="mdi mdi-star"></i> 4.0</div>
                                    <p class="text-muted mb-4">Sed ut perspiciatis unde omnis iste natus error sit</p>
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <h5 class="font-size-15 mb-0">Joseph</h5></div>
                                        <div class="flex-shrink-0">
                                            <ul class="list-inline product-review-link mb-0">
                                                <li class="list-inline-item"><a href="#"><i class="uil uil-thumbs-up"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="uil uil-comment-alt-message"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>

@endsection