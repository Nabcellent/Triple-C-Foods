@extends('layouts.master')
@section('title', 'Thanks')
@section('content')

    <div id="cart" class="container p-10">
        <section class="row align-items-center" style="min-height: 75vh">
            <div class="col-12">
                <div class="card checkout-order-summary">
                    <div class="card-body">
                        <div class="p-3 bg-light mb-4">
                            <h5 class="font-size-16 mb-0">Thank you <span class="float-end ms-2">Order No. #NFC0124</span></h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row justify-content-center my-4">
                    <div class="col-auto">
                        <a href="{{ route('products.index') }}" class="btn btn-success">
                            <i class="fas fa-arrow-left"></i> Shop some more.
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
    </div>

@endsection
