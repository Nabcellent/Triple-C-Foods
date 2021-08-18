{{--    PARTICLES    --}}
<script src="{{ asset('js/particles/particles.js') }}"></script>

{{--    BOOTSTRAP    --}}
<script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>

{{--    SWIPER    --}}
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

{{--    SWEETALERT 2    --}}
<script src="{{ asset('vendor/sweetalert2/sweetalert2@11.0.19.js') }}"></script>

{{--    TOASTIFY    --}}
<script src="{{ asset('vendor/toastify/toastify.js') }}"></script>

@yield('scripts')

<script src="{{ asset('js/app.js') }}" defer></script>

{{--    CUSTOM    --}}
<script src="{{ asset('js/index.js') }}"></script>

@include('partials.javascript')
