@extends('layouts.master')
@section('title', 'Details - ' . $product->title)
@section('content')

    <div id="details">
        <div class="row p-4">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('cart.store', ['id' => $product->id]) }}" method="POST" class="row">
                            @csrf
                            <div class="col-lg-6">
                                <div class="product-detail">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                <a class="nav-link active" id="product-1-tab" data-bs-toggle="pill" href="#product-1" role="tab">
                                                    <img src="{{ asset('images/kuku/' . $product->image) }}" alt="" class="img-fluid mx-auto d-block tab-img rounded">
                                                </a>
                                                @foreach($product->productImages as $image)
                                                    <a class="nav-link" id="product-{{ $image->id }}-tab" data-bs-toggle="pill" href="#product-{{ $image->id }}" role="tab">
                                                        <img src="{{ asset('images/kuku/' . $image->image) }}" alt="" class="img-fluid mx-auto d-block tab-img rounded">
                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-9">
                                            <div class="tab-content position-relative" id="v-pills-tabContent">
                                                <div class="product-wishlist">
                                                    <a href="#"> <i class="fas fa-heart"></i> </a>
                                                </div>
                                                <div class="tab-pane fade show active" id="product-1" role="tabpanel">
                                                    <img src="{{ asset('images/kuku/' . $product->image) }}" alt="" class="img-fluid mx-auto d-block"
                                                         data-zoom="assets/images/product/img-1.png">
                                                </div>
                                                @foreach($product->productImages as $image)
                                                <div class="tab-pane fade" id="product-{{ $image->id }}" role="tabpanel">
                                                    <img src="{{ asset('images/kuku/' . $image->image) }}" alt="" class="img-fluid mx-auto d-block">
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row text-center mt-2">
                                        <div class="col-auto">
                                            <a href="{{ route('products.index') }}" class="btn btn-primary waves-effect waves-light me-1">
                                                <i class="fas fa-arrow-left"></i> Continue Shopping
                                            </a>
                                        </div>
                                        <div class="col">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                <i class="fas fa-cart-plus"></i> Add to cart
                                            </button>
                                        </div>
                                        <div class="col-auto">
                                            <button type="button" class="btn btn-light waves-effect waves-light">
                                                <i class="fas fa-shipping-fast"></i> Order now
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
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
                                            <div class="col mt-4">
                                                <h5 class="font-size-14 mb-3">Product description: </h5>
                                                <div class="product-desc">
                                                    <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                                                        <li class="nav-item small">
                                                            <a class="nav-link active" id="desc-tab" data-bs-toggle="tab" href="#desc" role="tab">Description</a>
                                                        </li>
                                                        <li class="nav-item small">
                                                            <a class="nav-link" id="specifi-tab" data-bs-toggle="tab" href="#specifi" role="tab">Specifications</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content px-2">
                                                        <div class="tab-pane fade show active" id="desc" role="tabpanel">
                                                            <div class="text-muted p-2">
                                                                <small>{{ $product->description }}</small>
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
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-5 col-sm-4">
                                                <div class="mt-3">
                                                    <small>Quantity</small>
                                                    <div style="max-width: 7rem;" class="product-cart-touchspin">
                                                        <input class="form-control" type="text" value="1" name="quantity" aria-label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- end row -->

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

    @push('scripts')
        <script src="{{ asset('vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
        <script>
            $("input[name='quantity']").TouchSpin({
                min: 0,
                max: 100,
                boostat: 5,
                maxboostedstep: 10,
            });
        </script>
    @endpush

@endsection
