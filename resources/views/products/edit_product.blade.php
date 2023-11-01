@extends('layouts.master')
@section('main-content')
@section('page-css')
    <link rel="stylesheet" href="{{ asset('assets/styles/vendor/nprogress.css') }}">
@endsection

<div class="breadcrumb">
    <h1>{{ __('translate.Edit_Product') }}</h1>
</div>

<div class="separator-breadcrumb border-top"></div>

<div class="row" id="section_edit_product">
    <div class="col-lg-12 mb-3">
        <!--begin::form-->
        <form @submit.prevent="Update_Product()">
            <div class="card">
                <div class="card-body">
                    <div class="row">

                        <div class="form-group col-md-4">
                            <label for="name">{{ __('translate.Product_Name') }} <span
                                    class="field_required">*</span></label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="{{ __('translate.Enter_Name_Product') }}" value="{{ $product['name'] }}">
                            <span class="name-error-notif text-danger" id="name-error"></span>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="code">{{ __('translate.Product_Code') }} <span
                                    class="field_required">*</span></label>

                            <div class="input-group">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="generate the barcode"
                                        id="barcode" aria-label="generate the barcode" aria-describedby="basic-addon2"
                                        value="{{ $product['code'] }}">
                                    <span class="input-group-text cursor-pointer" id="basic-addon2"
                                        @click="generateNumber()"><i class="i-Bar-Code"></i></span>
                                </div>
                            </div>
                            <span class="barcode-error-notif text-danger" id="barcode-error"></span>
                        </div>

                        <div class="form-group col-md-4">
                            <label>{{ __('translate.Category') }} <span class="field_required">*</span></label>
                            <select class="form-control @error('category') is-invalid @enderror" name="category"
                                required autocomplete="category" id="category">
                                @foreach ($categories as $catData)
                                    <option value="{{ $catData->id }}"
                                        {{ $catData->id === $product['category_id'] ? 'selected' : '' }}>
                                        {{ $catData->name }}</option>
                                @endforeach
                            </select>
                            <span class="category-error-notif text-danger" id="category-error"></span>
                        </div>

                        <div class="form-group col-md-4">
                            <label>{{ __('translate.Brand') }} </label>
                            <select class="form-control @error('brand') is-invalid @enderror" name="brand" required
                                autocomplete="brand" id="brand">
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}"
                                        {{ $brand->id === $product['brand_id'] ? 'selected' : '' }}>
                                        {{ $brand->name }}</option>
                                @endforeach
                            </select>
                            <span class="brand-error-notif text-danger" id="brand-error"></span>
                        </div>



                        <div class="form-group col-md-4">
                            <label for="stock_alert">{{ __('translate.Order_Tax') }} </label>

                            <div class="input-group mb-3">
                                <input name="tax_order" type="text" class="form-control"
                                    aria-describedby="basic-addon3" id="tax_order" value="{{ $product['TaxNet'] }}">
                                <span class="input-group-text cursor-pointer" id="basic-addon3">%</span>
                                <span class="tax_order-error-notif text-danger" id="tax_order-error"></span>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label>{{ __('translate.Tax_Method') }} <span class="field_required">*</span></label>
                            <select class="form-control @error('category') is-invalid @enderror" name="tax_method"
                                required autocomplete="tax_method" id="tax_method">
                                <option value="{{ $product['tax_method'] }}"
                                    {{ $product['tax_method'] === 1 ? 'selected' : '' }}>
                                    Exclusive</option>
                                <option value="{{ $product['tax_method'] }}"
                                    {{ $product['tax_method'] === 2 ? 'selected' : '' }}>
                                    Inclusive</option>
                            </select>
                            <span class="tax_method-error-notif text-danger" id="tax_method-error"></span>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="image">{{ __('translate.Image') }} </label>
                            <input name="image" type="file" class="form-control" id="image">
                            <span class="image-error-notif text-danger" id="image-error"></span>
                        </div>

                        <div class="form-group col-md-12 mb-4">
                            <label for="note">{{ __('translate.Please_provide_any_details') }} </label>
                            <textarea type="text" class="form-control" name="note" id="note"
                                placeholder="{{ __('translate.Please_provide_any_details') }}">
                            {!! trim($product['note']) !!}</textarea>
                            <span class="note-error-notif text-danger" id="note-error"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-5">
                <div class="card-body">
                    <div class="row">

                        <div class="form-group col-md-4 mb-3" v-if="product.type == 'is_single'">
                            <label for="type">{{ __('translate.Product_Type') }} <span
                                    class="field_required">*</span></label>
                            <input type="text" class="form-control" id="type" placeholder="Standard Product"
                                value="Standard Product" disabled>
                            <span class="note-error-notif text-danger" id="note-error"></span>
                        </div>

                        @if ($product['type'] == 'is_variant')
                            <div class="form-group col-md-4 mb-3">
                                <label for="type">{{ __('translate.Product_Type') }} <span
                                        class="field_required">*</span></label>
                                <input type="text" class="form-control" id="type"
                                    placeholder="Variable Product" value="Variable Product" disabled>
                                <span class="note-error-notif text-danger" id="note-error"></span>
                            </div>
                        @else
                            <div class="form-group col-md-4 mb-3">
                                <label for="type">{{ __('translate.Product_Type') }} <span
                                        class="field_required">*</span></label>
                                <input type="text" class="form-control" id="type"
                                    placeholder="Service Product" value="Service Product" disabled>
                            </div>
                        @endif

                        @if ($product['type'] == 'is_single' || $product['type'] == 'is_variant')
                            <div class="form-group col-md-4">
                                <label for="cost">{{ __('translate.Product_Cost') }} <span
                                        class="field_required">*</span></label>
                                <input type="text" class="form-control" id="cost" name="cost"
                                    placeholder="{{ __('translate.Enter_Product_Cost') }}"
                                    value="{{ $product['cost'] }}">
                                <span class="cost-error-notif text-danger" id="cost-error"></span>
                            </div>
                        @endif

                        @if ($product['type'] == 'is_service' || $product['type'] == 'is_variant' || $product['type'] == 'is_single')
                            <div class="form-group col-md-4">
                                <label for="price">{{ __('translate.Product_Price') }} <span
                                        class="field_required">*</span></label>
                                <input type="text" class="form-control" id="price" name="price"
                                    placeholder="{{ __('translate.Enter_Product_Price') }}"
                                    value="{{ $product['price'] }}">
                                <span class="price-error-notif text-danger" id="price-error"></span>
                            </div>
                        @endif

                        @if ($product['type'] != 'is_service')
                            <div class="form-group col-md-4">
                                <label>{{ __('translate.Unit_Product') }} <span
                                        class="field_required">*</span></label>
                                <select class="form-control @error('category') is-invalid @enderror" name="unit_id"
                                    required autocomplete="unit_id" id="unit_id">
                                    @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}"
                                            {{ $unit->id === $product['unit_id'] ? 'selected' : '' }}>
                                            {{ $unit->name }}</option>
                                    @endforeach
                                </select>
                                <span class="unit_id-error-notif text-danger" id="unit_id-error"></span>
                            </div>


                            <div class="form-group col-md-4">
                                <label>{{ __('translate.Unit_Sale') }} <span class="field_required">*</span></label>
                                <select class="form-control @error('unit_sale_id') is-invalid @enderror"
                                    name="unit_sale_id" required autocomplete="unit_sale_id" id="unit_sale_id">
                                    @foreach ($units_sub as $unit_sub)
                                        <option value="{{ $unit_sub->id }}"
                                            {{ $unit_sub->id === $product['unit_sale_id'] ? 'selected' : '' }}>
                                            {{ $unit_sub->name }}</option>
                                    @endforeach
                                </select>
                                <span class="unit_sale_id-error-notif text-danger" id="unit_sale_id-error"></span>
                            </div>

                            <div class="form-group col-md-4">
                                <label>{{ __('translate.Unit_Purchase') }} <span
                                        class="field_required">*</span></label>
                                <select class="form-control @error('unit_purchase_id') is-invalid @enderror"
                                    name="unit_purchase_id" required autocomplete="unit_purchase_id"
                                    id="unit_purchase_id">
                                    @foreach ($units_sub as $unit_sub)
                                        <option value="{{ $unit_sub->id }}"
                                            {{ $unit_sub->id === $product['unit_purchase_id'] ? 'selected' : '' }}>
                                            {{ $unit_sub->name }}</option>
                                    @endforeach
                                </select>
                                <span class="unit_sale_id-error-notif text-danger" id="unit_sale_id-error"></span>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="qty_min">{{ __('translate.Minimum_sale_quantity') }} </label>
                                <input type="text" class="form-control" id="qty_min" name="qty_min"
                                    placeholder="{{ __('translate.Enter_Minimum_sale_quantity') }}"
                                    value="{{ $product['qty_min'] }}">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="stock_alert">{{ __('translate.Stock_Alert') }} </label>
                                <input type="text" class="form-control" id="stock_alert" name="stock_alert"
                                    placeholder="{{ __('translate.Enter_Stock_alert') }}"
                                    value="{{ $product['stock_alert'] }}">
                            </div>
                        @endif

                        <div class="col-md-12 mb-3 mt-3" v-if="product.type == 'is_variant'">
                            <div class="d-flex float-end">
                                <a id="add_new_variant" class=" ms-3 btn btn-md btn-primary float-end">
                                    {{ __('translate.Add') }} variant
                                </a>
                            </div>
                        </div>

                        <div class="col-md-12 mb-2 " v-if="product.type == 'is_variant'">
                            <table class="table table-hover table-sm" id="variantTable">
                                <thead class="bg-gray-300">
                                    <tr>
                                        <th scope="col">{{ __('translate.Variant_attributes') }}</th>
                                        <th scope="col">{{ __('translate.Variant_values') }}</th>
                                        <th scope="col">{{ __('translate.Product_Cost') }}</th>
                                        <th scope="col">{{ __('translate.Product_Price') }}</th>
                                        <th scope="col">{{ __('translate.Action') }}</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($product['ProductVariant'] == null)
                                        <tr v-if="variants.length <=0">
                                            <td colspan="3">{{ __('translate.No_data_Available') }}</td>
                                        </tr>
                                    @else
                                        @php
                                            $i = 0;
                                        @endphp
                                        @foreach ($product['ProductVariant'] as $variant)
                                            <tr>
                                                <td>
                                                    <select class="form-select" name="variants" required
                                                        id="attributes_{{ $i + 1 }}">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            <option value="{{ $attribute->id }}"
                                                                {{ $attribute->id === $variant['variantId'] ? 'selected' : '' }}>
                                                                {{ $attribute->variant_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-select" name="variant_values" required
                                                        id="attribute_value_{{ $i + 1 }}">
                                                        <option></option>
                                                        @foreach ($attributeValues as $attributeValue)
                                                            <option value="{{ $attributeValue->id }}"
                                                                {{ $attributeValue->id === $variant['variantAttributeId'] ? 'selected' : '' }}>
                                                                {{ $attributeValue->variant_attribute_value_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <input required class="form-control"
                                                        value="{{ $variant['cost'] }}" name="variant_cost">
                                                </td>
                                                <td>
                                                    <input required class="form-control" name="variant_price"
                                                        value="{{ $variant['price'] }}">
                                                </td>
                                                <td>
                                                    <a @click="delete_variant(variant.var_id)" class="btn btn-danger"
                                                        title="Delete">
                                                        <i class="i-Close-Window"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @php
                                                $i++;
                                            @endphp
                                        @endforeach
                                        <tr>
                                            <td>
                                                <select class="form-select" name="variants" required id="attributes">
                                                    <option></option>
                                                    @foreach ($attributes as $attribute)
                                                        <option value="{{ $attribute->id }}">
                                                            {{ $attribute->variant_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-select" name="variant_values" required
                                                    id="attribute_value">
                                                    <option></option>
                                                    @foreach ($attributeValues as $attributeValue)
                                                        <option value="{{ $attributeValue->id }}">
                                                            {{ $attributeValue->variant_attribute_value_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input required class="form-control" name="variant_cost">
                                            </td>
                                            <td>
                                                <input required class="form-control" name="variant_price">
                                            </td>
                                            <td>
                                                <a @click="delete_variant(variant.var_id)" class="btn btn-danger"
                                                    title="Delete">
                                                    <i class="i-Close-Window"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card
                                                    mt-5">
                <div class="card-body">

                    <!-- Product_Has_Imei_Serial_number -->
                    <div class="col-md-12 mb-2">
                        <div class="form-check form-check-inline">
                            <label class="checkbox checkbox-primary" for="is_imei">
                                <input type="checkbox" id="is_imei" v-model="product.is_imei">
                                <span>{{ __('translate.Product_Has_Imei/Serial_number') }}</span><span
                                    class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-6">
                    <button type="submit" class="btn btn-primary" :disabled="SubmitProcessing">
                        <span v-if="SubmitProcessing" class="spinner-border spinner-border-sm" role="status"
                            aria-hidden="true"></span> <i class="i-Yes me-2 font-weight-bold"></i>
                        {{ __('translate.Submit') }}
                    </button>

                </div>
            </div>
        </form>

        <!-- end::form -->
    </div>

</div>
@endsection

@section('page-js')
<script src="{{ asset('assets/js/nprogress.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-tagsinput.js') }}"></script>
<script src="{{ asset('assets/js/vendor/vuejs-datepicker/vuejs-datepicker.min.js') }}"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
<link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.1.1/dist/select2-bootstrap-5-theme.min.css" />
<script>
    $("select").select2({
        theme: "classic",
        width: 'resolve',
        allowClear: false,
    });

    let attributes = @json($product['ProductVariant']);
    attributes.forEach((index, data) => {
        // console.log('attributes_' + index.id);
        $("#attributes_" + index.id).select2({
            theme: "classic",
            width: '100%',
            placeholder: "Select a variant",
        });

        $("#attribute_value_" + index.id).select2({
            theme: "classic",
            width: '100%',
            placeholder: "Select a variant value",
        });
    });

    // add new row
    $("#add_new_variant").on('click', function() {
        var table = $('#variantTable'),
            lastRow = table.find('tbody tr:last'),
            rowClone = lastRow.clone();

        table.find('tbody').append(rowClone);
    });
</script>
{{-- <script type="text/javascript">
    $(function() {
        "use strict";

        $(document).on('keyup keypress', 'form input[type="text"]', function(e) {
            if (e.keyCode == 13) {
                e.preventDefault();
                return false;
            }
        });

    });
</script>

<script>
    Vue.component('v-select', VueSelect.VueSelect)
    Vue.config.devtools = true;
    var app = new Vue({
        el: '#section_edit_product',
        components: {
            vuejsDatepicker,
        },
        data: {
            len: 8,
            tag: "",
            SubmitProcessing: false,
            data: new FormData(),
            errors: [],
            categories: @json($categories),
            units: @json($units),
            units_sub: @json($units_sub),
            attributes_sub: [],
            brands: @json($brands),
            attributes: @json($attributes),
            attributeValues: @json($attributeValues),
            product: @json($product),
            variants: @json($product['ProductVariant']),
            variant: {
                variantId: "",
                variantAttributeId: "",
                variantCost: "",
                variantPrice: "",
            },
        },

        // beforeMount() {
        //     var variants = this.variants;
        //     variants.forEach(item => {
        //         console.log(item.variantId);
        //         // this.Selected_Sub_Variant(item.variantId);
        //     });
        // },

        methods: {
            hello_world() {
                console.log("Hello world again!");
            },

            checkDisabled(variantId) {
                if (variantId === null || variantId === '' || variantId === 'undefined') {
                    return status = false;
                } else {
                    return status = true;
                }
            },

            //------ Generate code
            generateNumber() {
                this.code_exist = "";
                this.product.code = Math.floor(
                    Math.pow(10, this.len - 1) +
                    Math.random() *
                    (Math.pow(10, this.len) - Math.pow(10, this.len - 1) - 1)
                );
            },


            Selected_Brand(value) {
                if (value === null) {
                    this.product.brand_id = "";
                }
            },


            formatDate(d) {
                var m1 = d.getMonth() + 1;
                var m2 = m1 < 10 ? '0' + m1 : m1;
                var d1 = d.getDate();
                var d2 = d1 < 10 ? '0' + d1 : d1;
                return [d.getFullYear(), m2, d2].join('-');
            },


            add_variant(tag) {
                if (
                    this.variants.length > 0 &&
                    this.variants.some(variant => variant.text === tag)
                ) {

                    toastr.error('Variant Duplicate');

                } else {
                    if (this.tag != '') {
                        var variant_tag = {
                            var_id: this.variants.length + 1, // generate unique ID
                            text: tag
                        };
                        this.variants.push(variant_tag);
                        this.tag = "";
                    } else {

                        toastr.error('Please Enter the Variant');

                    }
                }

            },

            add_new_variant() {
                var var_id = this.variants.length;
                var new_row = this.variants.length + 1;
                new_row.disabled = false;
                this.variants.splice(var_id + 1, 0, new_row);
                this.tag = "";
            },

            //-----------------------------------Delete variant------------------------------\\
            delete_variant(var_id) {
                for (var i = 0; i < this.variants.length; i++) {
                    if (var_id === this.variants[i].var_id) {
                        this.variants.splice(i, 1);
                    }
                }
            },



            onFileSelected(e) {
                let file = e.target.files[0];
                this.product.image = file;
            },

            //---------------------- Get Sub Units with Unit id ------------------------------\\
            Get_Units_SubBase(value) {
                axios
                    .get("/products/Get_Units_SubBase?id=" + value)
                    .then(({
                        data
                    }) => (this.units_sub = data));
            },


            //---------------------- Event Select Unit Product ------------------------------\\
            Selected_Unit(value) {
                this.units_sub = [];
                this.product.unit_sale_id = "";
                this.product.unit_purchase_id = "";
                this.Get_Units_SubBase(value);
            },

            // Event Select Variant
            Selected_Variant(value) {
                console.log(value);
                // this.variant_value = [];
                // this.attributes_sub = [];
                // this.variant.variantAttributeId = "";
                this.Get_Variant_Value(value);
            },

            // Get variant value
            Get_Variant_Value(value) {
                axios.get("/products/variant/values/" + value + "/show")
                    .then(
                        ({
                            data
                        }) => (this.attributes_sub = data)
                    );
            },


            //------------------------------ Update_Product ------------------------------\\
            Update_Product() {

                if (this.product.type == 'is_variant' && this.variants.length <= 0) {
                    toastr.error('The variants array is required.');
                } else {

                    // Start the progress bar.
                    NProgress.start();
                    NProgress.set(0.1);
                    var self = this;
                    self.SubmitProcessing = true;


                    if (self.product.type == 'is_variant' && self.variants.length > 0) {
                        self.product.is_variant = true;
                    } else {
                        self.product.is_variant = false;
                    }

                    // append objet product
                    Object.entries(self.product).forEach(([key, value]) => {
                        self.data.append(key, value);
                    });

                    //append array variants
                    if (self.variants.length) {
                        for (var i = 0; i < self.variants.length; i++) {
                            Object.entries(self.variants[i]).forEach(([key, value]) => {
                                self.data.append("variants[" + i + "][" + key + "]", value);
                            });
                        }
                    }

                    self.data.append("_method", "put");

                    // Send Data with axios
                    axios
                        .post("/products/products/" + self.product.id, self.data)
                        .then(response => {
                            // Complete the animation of theprogress bar.
                            NProgress.done();
                            self.SubmitProcessing = false;
                            window.location.href = '/products/products';
                            toastr.success('{{ __('translate.Updated_in_successfully') }}');
                            self.errors = {};
                        })
                        .catch(error => {
                            NProgress.done();
                            self.SubmitProcessing = false;


                            if (error.response.status == 422) {
                                self.errors = error.response.data.errors;
                                toastr.error('{{ __('translate.There_was_something_wronge') }}');
                            }

                            if (self.errors.variants && self.errors.variants.length > 0) {
                                toastr.error(self.errors.variants[0]);
                            }

                        });
                }
            }


        },

        //-----------------------------Autoload function-------------------
        created() {}

    })
</script> --}}
@endsection
