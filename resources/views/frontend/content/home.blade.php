@extends('frontend.layouts.master')
@section('content')
    @include('frontend.layouts.header-search')
    <x-frontend.banner />

    <!-- Start Content -->
    <section class="section-t-space-3">
        <div class="custom-container">
            <x-frontend.content-title />
            <x-frontend.product-tab />
        </div>
    </section>
    <!-- Start Content End -->
    @include('frontend.layouts.footer-nav')
@endsection
