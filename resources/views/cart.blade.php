@extends('layouts.master')
@section('title', 'Cart')
@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}">
@endsection
@section('content')

    <div id="cart" class="container p-10" style="min-height: 75vh">
        <!--Section: Block Content-->
        <section>
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col-lg-8">
                    <div class="card wish-list mb-3">
                        <div class="card-body">
                            <h5 class="mb-4">Cart (<span>{{ count((array) session('cart')) }}</span> items)</h5>
                            @php $total = 0 @endphp
                            @if(session('cart'))
                                @foreach(session('cart') as $id => $details)
                                    @php $total += $details['price'] * $details['quantity'] @endphp
                                    <div class="row mb-4 align-items-center" data-id="{{ $id }}">
                                        <div class="col-md-5 col-lg-3 col-xl-3">
                                            <div class="bg-secondary shadow rounded py-3 mb-3 mb-md-0">
                                                <img class="img-fluid w-100" src="{{ asset('images/kuku/' . $details['image']) }}" alt="Sample">
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-lg-9 col-xl-9">
                                            <div class="">
                                                <h6 class="mb-3">{{ $details['title'] }}</h6>
                                                <div class="d-flex justify-content-between">
                                                    <p class="text-muted mb-2 small">Quantity</p>
                                                    <div style="max-width: 7rem;" class="product-cart-touchspin">
                                                        <input class="form-control quantity update-cart" type="text"
                                                               value="{{ $details['quantity'] }}" name="quantity" aria-label>
                                                    </div>
                                                    <div class="font-size-12">
                                                        <a href="javascript:void(0)" class="remove-from-cart"><i class="fa fa-trash"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="font-size-12">
                                                    <strong>Unit Price:</strong> KSH {{ $details['price'] }}/=
                                                </span>
                                                <p class="mb-0">
                                                    <strong>Subtotal:</strong>
                                                    <small>KSH {{ $details['price'] * $details['quantity'] }}/=</small>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mb-4">
                                @endforeach
                            @endif
                            <p class="text-primary small mb-0">
                                <i class="fas fa-info-circle mr-1"></i>
                                Do not delay the purchase, adding items to your cart does not mean booking them.
                            </p>
                        </div>
                    </div>
                    <!-- Card -->

                </div>

                <div class="col-lg-4">

                    <div class="card mb-3">
                        <div class="card-body">

                            <h5 class="mb-3">The total amount to pay</h5>

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                    Total amount<span>KSH 17.99/=</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                    Tax<span>KSH 10/=</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                    <div>
                                        <strong>Total(including VAT)</strong>
                                    </div>
                                    <span><strong>KSH {{ $total }}/=</strong></span>
                                </li>
                            </ul>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('products.index') }}" class="btn btn-sm btn-outline-primary"><i class="fas fa-arrow-left"></i> Continue Shopping</a>
                                <button type="button" class="btn btn-sm btn-primary btn-block">Checkout</button>
                            </div>
                        </div>
                    </div>

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

    @push('scripts')
        <script src="{{ asset('vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
        <script>
            $("input[name='quantity']").TouchSpin({
                min: 0,
                max: 100,
                boostat: 5,
                maxboostedstep: 10,
            });

            $(".update-cart").change(function (e) {
                e.preventDefault();

                let elem = $(this);

                $.ajax({
                    url: '{{ route('cart.update') }}',
                    method: 'PATCH',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: elem.parents(".row").attr("data-id"),
                        quantity: elem.val()
                    },
                    success: () => window.location.reload()
                });
            });

            $(".remove-from-cart").click(function (e) {
                e.preventDefault();

                let elem = $(this);

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route('cart.destroy') }}',
                            method: "DELETE",
                            data: {
                                _token: '{{ csrf_token() }}',
                                id: elem.parents(".row").attr("data-id"),
                            },
                            success: () => window.location.reload()
                        });
                    }
                })
            });
        </script>
    @endpush

@endsection
