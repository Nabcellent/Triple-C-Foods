@extends('layouts.master')
@section('title', 'Checkout')
@section('content')

    <div id="cart" class="container p-10" style="min-height: 75vh">
        <section>
            <form class="row" action="{{ route('order.store') }}" method="POST">
                <div class="col-xl-7">
                    @csrf
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item mb-2">
                            <div class="accordion-header" id="flush-headingOne">
                                <div class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-billing"
                                     aria-expanded="false" aria-controls="flush-collapseOne">
                                    <h5 class="font-size-16 mb-1">Billing Info</h5>
                                </div>
                            </div>
                            <div id="flush-billing" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne"
                                 data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body font-size-13">
                                    <div class="row">
                                        <div class="col p-2">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="card border rounded active shipping-address">
                                                        <div class="card-body">
                                                            <a href="#" class="float-end ms-1" data-bs-toggle="tooltip" data-placement="top" title="Edit">
                                                                <i class="uil uil-pen font-size-16"></i> </a>
                                                            <h5 class="font-size-14 mb-4">Address 1</h5>
                                                            <h5 class="font-size-14">James Morgan</h5>
                                                            <p class="mb-1">1557 Sundown Lane Smithville, TX 78957</p>
                                                            <p class="mb-0">Phone. 012-345-6789</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="card border rounded shipping-address">
                                                        <div class="card-body">
                                                            <a href="#" class="float-end ms-1" data-bs-toggle="tooltip" data-placement="top" title="Edit">
                                                                <i class="uil uil-pen font-size-16"></i> </a>
                                                            <h5 class="font-size-14 mb-4">Address 2</h5>
                                                            <h5 class="font-size-14">James Morgan</h5>
                                                            <p class="mb-1">1557 Sundown Lane Smithville, TX 78957</p>
                                                            <p class="mb-0">Phone. 012-345-6789</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col p-3">
                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <div class="mb-3">
                                                        <label for="billing-name">Name</label>
                                                        <input type="text" class="form-control" name="name" id="billing-name" value="{{ old('name') }}" placeholder="Enter name">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="mb-3">
                                                        <label for="billing-phone">Phone *</label>
                                                        <input type="tel" class="form-control" name="phone" id="billing-phone" value="{{ old('phone') }}" placeholder="Enter Phone no." required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="mb-4">
                                                        <label for="billing-address">Address</label>
                                                        <textarea class="form-control" id="billing-address" rows="2" name="address"
                                                                  placeholder="Enter full address...">{{ old('address') }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <div class="accordion-header" id="flush-headingTwo">
                                <div class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
                                     aria-expanded="false" aria-controls="flush-collapseTwo">
                                    <h5 class="font-size-16 mb-1">Payment Info</h5>
                                </div>
                            </div>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                                 data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <div class="p-3">
                                        <h5 class="font-size-14 mb-3">Payment method :</h5>
                                        <div class="row">
                                            <div class="col">
                                                <label class="card-radio-label">
                                                    <input type="radio" name="pay_method" value="mpesa" class="card-radio-input" checked>
                                                    <span class="card-radio text-center text-truncate">
                                                            <i class="fab fa-monero d-block h2 text-warning mb-3"></i>M-Pesa
                                                        </span>
                                                </label>
                                            </div>
                                            <div class="col">
                                                <label class="card-radio-label">
                                                    <input type="radio" name="pay_method" value="paypal" class="card-radio-input">
                                                    <span class="card-radio text-center text-truncate">
                                                            <i class="fab fa-paypal d-block text-primary h2 mb-3"></i>Paypal
                                                        </span>
                                                </label>
                                            </div>
                                            <div class="col">
                                                <label class="card-radio-label">
                                                    <input type="radio" name="pay_method" value="cod" class="card-radio-input">
                                                    <span class="card-radio text-center text-truncate">
                                                            <i class="fas fa-money-bill d-block text-success h2 mb-3"></i><span>Cash on Delivery</span>
                                                        </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col">
                            <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left"></i> Continue Shopping
                            </a>
                        </div>
                        <div class="col">
                            <div class="text-end mt-2 mt-sm-0">
                                <button type="submit" class="btn btn-success"> <i class="fas fa-shopping-cart"></i> Place Order </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5">
                    <div class="card checkout-order-summary">
                        <div class="card-body">
                            <div class="p-3 bg-light mb-4">
                                <h5 class="font-size-16 mb-0">Order Summary <span class="float-end ms-2">#NFC0124</span></h5></div>
                            <div class="table-responsive">
                                <table class="table table-sm table-centered mb-0 table-nowrap">
                                    <thead>
                                    <tr>
                                        <th scope="col">Product</th>
                                        <th scope="col">Product Desc</th>
                                        <th scope="col">Price(KSH)</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @php $total = $discount = 0 @endphp
                                    @foreach(session('cart') as $id => $cart)
                                        <?php
                                            $price = discountedPrice($cart['price'], $cart['discount']);
                                            $total += $price * $cart['quantity'];
                                            $discount += $cart['price'] - $price;
                                        ?>
                                        <tr>
                                            <th scope="row">
                                                <a href="{{ route('products.show', ['id' => $id]) }}" class="link-dark d-flex font-size-12">
                                                    <img src="{{ asset('images/kuku/' . $cart['image']) }}" alt="product-img" title="product-img"
                                                         class="avatar-md rounded-circle me-1">
                                                    {{ $cart['title'] }}
                                                </a>
                                            </th>
                                            <td>
                                                <h5 class="font-size-14 text-truncate">
                                                    {{ 'details' }}
                                                </h5>
                                                <small class="text-muted mb-0">KSH {{ $price . ' x ' . $cart['quantity'] }}</small>
                                            </td>
                                            <td>{{ $price * $cart['quantity'] }}</td>
                                        </tr>
                                    @endforeach

                                    <tr>
                                        <td colspan="2"><h5 class="font-size-14 m-0">Sub Total :</h5></td>
                                        <td>780</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><h5 class="font-size-14 m-0">Discount :</h5></td>
                                        <td> - {{ $discount }}</td>
                                    </tr>
                                    <tr class="bg-light">
                                        <td colspan="2"><h5 class="font-size-14 m-0">Total:</h5></td>
                                        <td> KSH {{ $total }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <input type="hidden" name="discount" value="{{ $discount }}">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
    </div>

@endsection
