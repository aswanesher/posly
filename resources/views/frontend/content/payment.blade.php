@extends('frontend.layouts.master')
@section('content')
    <section>
        <div class="custom-container">
            <div class="accordion accordion-style" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="card1">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#card">Select Card</button>
                    </h2>
                    <div id="card" class="accordion-collapse collapse show">
                        <div class="accordion-body p-0">
                            <ul class="payment-list">
                                <li>
                                    <input value="1" type="radio" name="1" class="form-check-input" id="01">
                                    <label class="minha-table" for="01">
                                        <img src="{{ asset('assets/asset_frontend/images/pay/m-card.png') }}" alt="">
                                        <span>9800 XXXX XXXX 0545</span>
                                    </label>
                                </li>

                                <li>
                                    <input value="1" type="radio" name="1" class="form-check-input" id="02">
                                    <label class="minha-table" for="02">
                                        <img src="{{ asset('assets/asset_frontend/images/pay/visa.png') }}" alt="">
                                        <span>6580 XXXX XXXX 2562</span>
                                    </label>
                                </li>

                                <li>
                                    <input value="3" type="radio" name="1" class="form-check-input" id="03" checked="">
                                    <label class="minha-table" for="03">
                                        <img src="{{ asset('assets/asset_frontend/images/pay/discover.png') }}" alt="">
                                        <span>5125 XXXX XXXX 6262</span>
                                    </label>
                                </li>

                                <li>
                                    <a href="#!" class="minha-table title-color d-block text-center">+ Add New Card</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="banking1">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#banking">Net Banking</button>
                    </h2>
                    <div id="banking" class="accordion-collapse collapse">
                        <div class="accordion-body p-0">
                            <ul class="payment-list">
                                <li>
                                    <input type="radio" id="5" name="1" class="form-check-input">
                                    <label class="minha-table" for="5">
                                        <img src="{{ asset('assets/asset_frontend/images/bank/axis.png') }}" alt="">
                                        <span>Axis Bank</span>
                                    </label>
                                </li>

                                <li>
                                    <input type="radio" id="6" name="1" class="form-check-input">
                                    <label class="minha-table" for="6">
                                        <img src="{{ asset('assets/asset_frontend/images/bank/hdfc.png') }}" alt="">
                                        <span>HDFC Bank</span>
                                    </label>
                                </li>

                                <li>
                                    <input type="radio" id="7" name="1" class="form-check-input">
                                    <label class="minha-table" for="7">
                                        <img src="{{ asset('assets/asset_frontend/images/bank/icici.png') }}" alt="">
                                        <span>ICICI Bank</span>
                                    </label>
                                </li>

                                <li>
                                    <input type="radio" id="8" name="1" class="form-check-input">
                                    <label class="minha-table" for="8">
                                        <img src="{{ asset('assets/asset_frontend/images/bank/union.png') }}" alt="">
                                        <span>Union Bank</span>
                                    </label>
                                </li>

                                <li>
                                    <select name="bankname" class="form-control" required="">
                                        <option value="" selected="selected" disabled="">-- Select --</option>
                                        <option value="1">ALLAHABAD BANK </option>
                                        <option value="2">ANDHRA BANK</option>
                                        <option value="3">AXIS BANK</option>
                                        <option value="29">STATE BANK OF INDIA</option>
                                        <option value="4">BANK OF BARODA</option>
                                        <option value="29">UCO BANK</option>
                                        <option value="29">UNION BANK OF INDIA</option>
                                        <option value="5">BANK OF INDIA</option>
                                        <option value="20">BANDHAN BANK LIMITED</option>
                                        <option value="7">CANARA BANK</option>
                                        <option value="32">GRAMIN VIKASH BANK</option>
                                        <option value="8">CORPORATION BANK</option>
                                        <option value="9">INDIAN BANK</option>
                                        <option value="10">INDIAN OVERSEAS BANK</option>
                                        <option value="11">ORIENTAL BANK OF COMMERCE</option>
                                        <option value="12">PUNJAB AND SIND BANK</option>
                                        <option value="13">PUNJAB NATIONAL BANK</option>
                                        <option value="14">RESERVE BANK OF INDIA</option>
                                        <option value="15">SOUTH INDIAN BANK</option>
                                        <option value="16">UNITED BANK OF INDIA</option>
                                        <option value="17">CENTRAL BANK OF INDIA</option>
                                        <option value="18">VIJAYA BANK</option>
                                        <option value="19">DENA BANK</option>
                                        <option value="21">BHARATIYA MAHILA BANK LIMITED</option>
                                        <option value="22">FEDERAL BANK LTD </option>
                                        <option value="23">HDFC BANK LTD</option>
                                        <option value="24">ICICI BANK LTD</option>
                                        <option value="25">IDBI BANK LTD</option>
                                        <option value="66">PAYTM BANK</option>
                                        <option value="29">FINO PAYMENT BANK</option>
                                        <option value="26">INDUSIND BANK LTD</option>
                                        <option value="27">KARNATAKA BANK LTD</option>
                                        <option value="28">KOTAK MAHINDRA BANK</option>
                                        <option value="30">YES BANK LTD</option>
                                        <option value="31">SYNDICATE BANK</option>
                                        <option value="5">BANK OF INDIA</option>
                                        <option value="6">BANK OF MAHARASHTRA</option>
                                    </select>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="credit1">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#credit">Credit/Debit Card</button>
                    </h2>
                    <div id="credit" class="accordion-collapse collapse">
                        <div class="accordion-body p-0">
                            <form class="form-style-6">
                                <div class="row gx-3">
                                    <div class="col-12">
                                        <div class="search-box">
                                            <input type="text" class="form-control" placeholder="Card Number">
                                            <i class="ri-bank-card-line"></i>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="search-box">
                                            <input type="number" class="form-control form-control-2" placeholder="Month">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="search-box">
                                            <input type="number" class="form-control form-control-2" placeholder="Year">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="search-box">
                                            <input type="number" class="form-control form-control-2" placeholder="CVV">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="search-box">
                                            <input type="text" class="form-control" placeholder="Name on Card">
                                            <i class="ri-user-3-line"></i>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="cash1">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cash">Cash on Delivery</button>
                    </h2>
                    <div id="cash" class="accordion-collapse collapse">
                        <div class="accordion-body p-0">
                            <ul class="payment-list">
                                <li>
                                    <label class="minha-table">
                                        <span>Prepaid payments are advised to guarantee contactless deliveries.</span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-t-space-3">
        <div class="custom-container">
            <div class="order-detail-box order-detail-box-2">
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
    @include('frontend.layouts.footer-payment-nav')
@endsection
