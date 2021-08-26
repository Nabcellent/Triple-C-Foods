@extends('layouts.master')
@section('title', 'Profile')
@section('content')

    <div id="profile" class="container p-10">
        <section class="row align-items-center" style="min-height: 75vh">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-center">
                            <img src="{{ asset('images/faces/3.jpg') }}" alt="" class="avatar-lg rounded-circle img-thumbnail">
                        </div>
                        <hr class="my-4">
                        <h5 class="mt-3 text-center">Marcus</h5>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="card mb-0">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#about" role="tab">
                                <i class="fas fa-user-circle font-size-20"></i> <span class="d-none d-sm-block">Profile</span> </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#tasks" role="tab">
                                <i class="fas fa-clipboard-check font-size-20"></i>
                                <span class="d-none d-sm-block">Order History</span>
                            </a>
                        </li>
                    </ul>
                    <!-- Tab content -->
                    <div class="tab-content p-4">
                        <div class="tab-pane active" id="about" role="tabpanel">
                            <div class="row justify-content-center mt-3">
                                <div class="col">
                                    <div class="row mb-4">
                                        <div class="col-2"><i class="fas fa-phone"></i></div>
                                        <div class="col">
                                            <p class="mb-1">Mobile :</p>
                                            <h5 class="font-size-16">+254-{{ $user->phone }}</h5>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-2"><i class="fas fa-envelope"></i></div>
                                        <div class="col">
                                            <p class="mb-1">E-mail :</p>
                                            <h5 class="font-size-16">{{ $user->email }}</h5>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-2"><i class="fas fa-map"></i></div>
                                        <div class="col">
                                            <p class="mb-1">Location :</p>
                                            <h5 class="font-size-16">California, United States</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <ul class="list-group-flush">
                                        <li class="list-group-item">Total Orders Made - {{ $orderCount }}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row py-1">
                                <div class="col-12">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <div contenteditable class="board">
                                                <p>Hello there... have fun with text on this board...</p>
                                                <p>Click to edit me ⇦</p><br>
                                                <div class="d-flex justify-content-between">
                                                    <u>Today is ⛅</u>
                                                    <u id="show_time" onload="showTime()"></u>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tasks" role="tabpanel">
                            <div class="row">
                                <div class="col">
                                    <div class="my-3">
                                        <h5 class="text-center">Your Order History</h5>
                                        <hr class="mb-0">
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-nowrap table-hover mb-0">
                                            <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Order No</th>
                                                <th scope="col">Total</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                            </thead>
                                            <tbody id="accordion">

                                            <?php $i = $orders->firstItem(); ?>
                                            @forelse($orders as $order)
                                                <?php
                                                $status = $order->status;
                                                $color = match (true) {
                                                    $status === 'pending' => 'warning',
                                                    $status === 'completed', $status === 'delivered' => 'success',
                                                    $status === 'cancelled' => 'danger',
                                                    $status === 'in process' => 'primary',
                                                    default => 'secondary'
                                                }
                                                ?>
                                                <tr data-bs-toggle="collapse" data-bs-target="#products{{ $order->id }}" style="cursor: pointer">
                                                    <th scope="row">{{ $i }}</th>
                                                    <td><a href="#" class="text-dark">#{{ $order->order_no }}</a></td>
                                                    <td>{{ $order->total }}/=</td>
                                                    <td>{{ \Carbon\Carbon::createFromTimestamp(strtotime($order->created_at))->diffForHumans() }}</td>
                                                    <td><span class="badge rounded-pill bg-{{$color}} font-size-12">{{ $order->status }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="6" class="p-0">
                                                        <div class="ml-3 collapse" data-bs-parent="#accordion" id="products{{ $order->id }}">
                                                            <table class="table table-sm table-bordered font-size-13">
                                                                <thead>
                                                                <tr>
                                                                    <th>product(s)</th>
                                                                    <th>Quantity</th>
                                                                    <th>Unit Price</th>
                                                                    <th>Sub-Total</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                <?php $total = $discount = 0; ?>
                                                                @foreach($order->orderProducts as $item)
                                                                    <?php
                                                                        $price = discountedPrice($item->price, json_decode($item->details)->discount);
                                                                        $subTotal = $price * $item->quantity;
                                                                        $discount += $item->price - $price;
                                                                    ?>
                                                                    <tr>
                                                                        <td>{{ $item->product->title }}</td>
                                                                        <td>{{ $item->quantity }}</td>
                                                                        <td>{{ $price }}/-</td>
                                                                        <td>{{ $subTotal }}/=</td>
                                                                    </tr>
                                                                    <?php $total += $subTotal ?>
                                                                @endforeach

                                                                @if($discount)
                                                                    <tr>
                                                                        <th colspan="3" class="text-right">Discount:</th>
                                                                        <td colspan="3" class="fw-bold">{{ $discount }}/=</td>
                                                                    </tr>
                                                                @endif
                                                                <tr>
                                                                    <th colspan="3" class="text-right">GRAND TOTAL:</th>
                                                                    <td colspan="3" class="fw-bold">{{ $total }}/=</td>
                                                                </tr>
                                                                <tr>
                                                                    <th colspan="3" class="text-right">Payment Method:</th>
                                                                    <td colspan="3">{{ ucfirst($order->pay_method) }}</td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php $i++; ?>
                                            @empty
                                                <tr>
                                                    <td colspan="5">
                                                        <div class="text-center my-2">
                                                            <p>YOU HAVENT MADE YOUR FIRST ORDER YET</p>
                                                            <a href="{{ route('products.index') }}" class="btn btn-danger"><i
                                                                    class="fas fa-running">GO SHOPPING</i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforelse

                                            </tbody>
                                        </table>
                                        <div class="paginator">
                                            {{ $orders->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    </div>

    <script>
        function showTime() {
            let date = new Date();
            let h = date.getHours(); // 0 - 23
            let m = date.getMinutes(); // 0 - 59
            let s = date.getSeconds(); // 0 - 59
            let session = "AM";

            if (h === 0) {
                h = 12;
            }

            if (h > 12) {
                h = h - 12;
                session = "PM";
            }

            h = (h < 10) ? "0" + h : h;
            m = (m < 10) ? "0" + m : m;
            s = (s < 10) ? "0" + s : s;

            const d = new Date();
            const days = ["Sun", "Mon", "Tue", "Wed", "Thur", "Fri", "Sat"];

            let time = days[d.getDay()] + " - " + h + ":" + m + ":" + s + " " + session;
            document.getElementById("show_time").innerText = time;
            document.getElementById("show_time").textContent = time;

            setTimeout(showTime, 1000);

        }

        showTime()
    </script>

@endsection
