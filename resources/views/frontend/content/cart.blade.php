@extends('frontend.layouts.master')
@section('content')
    <section>
        <div class="custom-container">
            <ul class="cart-list">
                @for($i = 1; $i <= 3;$i++)
                <li>
                    <div class="cart-box">
                        <a href="{{ url('/product') }}" class="product-image shadow-sm border">
                            <img src="{{ asset('assets/asset_frontend/images/ecommerce/product/6.jpg') }}" class="img-fluid" alt="">
                        </a>
                        <div class="product-content">
                            <div>
                                <a href="{{ url('/product') }}">
                                    <h5 class="name">Pink Hoodie t-shirt full</h5>
                                </a>
                                <h5 class="size">Size: S</h5>
                                <h5 class="qty">Quantity: 1</h5>
                            </div>
                            <div>
                                <ul class="option">
                                    <li>
                                        <a href="#!">
                                            <i class="ri-pencil-line"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#!">
                                            <i class="ri-delete-bin-line"></i>
                                        </a>
                                    </li>
                                </ul>
                                <h4>$25.00</h4>
                            </div>
                        </div>
                    </div>
                </li>
                @endfor
            </ul>
        </div>
    </section>
    <section class="section-t-space-3 pb-3">
        <div class="custom-container">
            <a href="{{ url('/grid') }}" class="product-banner d-block">
                <img src="{{ asset('assets/asset_frontend/images/ecommerce/banner/1.jpg') }}" class="img-fluid rounded-3" alt="">
            </a>

            <div class="order-detail-box">
                <div class="product-title">
                    <h4>Order Details:</h4>
                </div>
                <ul class="order-price-list">
                    <li>
                        <div class="order-price-box">
                            <h4 class="name">Base Price</h4>
                            <h4 class="price">$25.00</h4>
                        </div>
                    </li>

                    <li>
                        <div class="order-price-box">
                            <h4 class="name">Total Discount</h4>
                            <h4 class="price success">-$5.00</h4>
                        </div>
                    </li>

                    <li>
                        <div class="order-price-box">
                            <h4 class="name">Taxes &amp; Service Fees</h4>
                            <h4 class="price">$3.00</h4>
                        </div>
                    </li>

                    <li class="total-price">
                        <div class="order-price-box">
                            <h4 class="name">Total Amount to be paid</h4>
                            <h4 class="price">$23.00</h4>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    @include('frontend.layouts.footer-checkout-nav')
@endsection
