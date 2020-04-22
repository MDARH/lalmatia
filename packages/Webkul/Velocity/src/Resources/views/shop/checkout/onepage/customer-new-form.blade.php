@php
    $isCustomer = auth()->guard('customer')->check();
@endphp

    @if (isset($shipping) && $shipping)
        <div :class="`col-12 form-field mb30 ${errors.has('address-form.shipping[full_name]') ? 'has-error' : ''}`">
            <label for="shipping[full_name]" class="mandatory" style="width: unset;">
                {{ __('shop::app.checkout.onepage.full-name') }}
            </label>

            <input
                type="text"
                class="control"
                v-validate="'required'"
                id="shipping[full_name]"
                name="shipping[full_name]"
                v-model="address.shipping.full_name"
                @change="validateForm('address-form')"
                data-vv-as="&quot;{{ __('shop::app.checkout.onepage.full-name') }}&quot;" />

            <span class="control-error" v-if="errors.has('address-form.shipping[full_name]')">
                @{{ errors.first('address-form.shipping[full_name]') }}
            </span>
        </div>


        <div :class="`col-12 form-field ${errors.has('address-form.shipping[mobile]') ? 'has-error' : ''}`">
            <label for="shipping[mobile]" class="mandatory">
                {{ __('shop::app.checkout.onepage.mobile') }}
            </label>

            <input
                type="text"
                class="control"
                id="shipping[mobile]"
                name="shipping[mobile]"
                v-validate="'required'"
                v-model="address.shipping.mobile"
                @change="validateForm('address-form')"
                data-vv-as="&quot;{{ __('shop::app.checkout.onepage.mobile') }}&quot;" />

            <span class="control-error" v-if="errors.has('address-form.shipping[mobile]')">
                @{{ errors.first('address-form.shipping[mobile]') }}
            </span>
        </div>

        <div :class="`col-12 form-field ${errors.has('address-form.shipping[email]') ? 'has-error' : ''}`">
            <label for="shipping[email]">
                {{ __('shop::app.checkout.onepage.email') }}
            </label>

            <input
                type="text"
                class="control"
                id="shipping[email]"
                name="shipping[email]"
                v-validate="'email'"
                v-model="address.shipping.email"
                @change="validateForm('address-form')"
                data-vv-as="&quot;{{ __('shop::app.checkout.onepage.email') }}&quot;" />

            <span class="control-error" v-if="errors.has('address-form.shipping[email]')">
                @{{ errors.first('address-form.shipping[email]') }}
            </span>
        </div>

        <div :class="`col-12 form-field ${errors.has('address-form.shipping[address1][]') ? 'has-error' : ''}`" style="margin-bottom: 0;">
            <label for="shipping_address_0" class="mandatory">
                {{ __('shop::app.checkout.onepage.address1') }}
            </label>

            <input
                type="text"
                class="control"
                v-validate="'required'"
                id="shipping_address_0"
                name="shipping[address1][]"
                v-model="address.shipping.address1[0]"
                @change="validateForm('address-form')"
                data-vv-as="&quot;{{ __('shop::app.checkout.onepage.address1') }}&quot;" />

            <span class="control-error" v-if="errors.has('address-form.shipping[address1][]')">
                @{{ errors.first('address-form.shipping[address1][]') }}
            </span>
        </div>

        @if (
            core()->getConfigData('customer.settings.address.street_lines')
            && core()->getConfigData('customer.settings.address.street_lines') > 1
        )
            @for ($i = 1; $i < core()->getConfigData('customer.settings.address.street_lines'); $i++)
                <div class="col-12 form-field" style="margin-top: 10px; margin-bottom: 0">
                    <input
                        type="text"
                        class="control"
                        id="shipping_address_{{ $i }}"
                        name="shipping[address][{{ $i }}]"
                        @change="validateForm('address-form')"
                        v-model="address.shipping.address[{{$i}}]" />
                </div>
            @endfor
        @endif

        <div :class="`col-12 form-field ${errors.has('address-form.shipping[city]') ? 'has-error' : ''}`" style="margin-top: 15px;">
            <label for="shipping[city]" class="mandatory">
                {{ __('shop::app.checkout.onepage.city') }}
            </label>

            <input
                type="text"
                class="control"
                id="shipping[city]"
                name="shipping[city]"
                v-validate="'required'"
                v-model="address.shipping.city"
                @change="validateForm('address-form')"
                data-vv-as="&quot;{{ __('shop::app.checkout.onepage.city') }}&quot;" />

            <span class="control-error" v-if="errors.has('address-form.shipping[city]')">
                @{{ errors.first('address-form.shipping[city]') }}
            </span>
        </div>

        @auth('customer')
            <div class="mb10">
                <span class="checkbox fs16 display-inbl no-margin">
                    <input
                        class="ml0"
                        type="checkbox"
                        id="shipping[save_as_address]"
                        name="shipping[save_as_address]"
                        @change="validateForm('address-form')"
                        v-model="address.shipping.save_as_address"/>

                    <span class="ml-5">
                        {{ __('shop::app.checkout.onepage.save_as_address') }}
                    </span>
                </span>
            </div>
        @endauth

    @elseif (isset($billing) && $billing)

        <div :class="`col-12 form-field ${errors.has('address-form.billing[full_name]') ? 'has-error' : ''}`">
            <label for="billing[full_name]" class="mandatory">
                {{ __('shop::app.checkout.onepage.full-name') }}
            </label>

            <input
                type="text"
                class="control"
                v-validate="'required'"
                id="billing[full_name]"
                name="billing[full_name]"
                v-model="address.billing.full_name"
                @change="validateForm('address-form')"
                data-vv-as="&quot;{{ __('shop::app.checkout.onepage.full-name') }}&quot;" />

            <span class="control-error" v-if="errors.has('address-form.billing[full_name]')">
                @{{ errors.first('address-form.billing[full_name]') }}
            </span>
        </div>

        <div :class="`col-12 form-field ${errors.has('address-form.billing[mobile]') ? 'has-error' : ''}`">
            <label for="billing[mobile]" class="mandatory">
                {{ __('shop::app.checkout.onepage.mobile') }}
            </label>

            <input
                type="text"
                class="control"
                id="billing[mobile]"
                name="billing[mobile]"
                v-validate="'required'"
                v-model="address.billing.mobile"
                @change="validateForm('address-form')"
                data-vv-as="&quot;{{ __('shop::app.checkout.onepage.mobile') }}&quot;" />

            <span class="control-error" v-if="errors.has('address-form.billing[mobile]')">
                @{{ errors.first('address-form.billing[mobile]') }}
            </span>
        </div>

        <div :class="`col-12 form-field ${errors.has('address-form.billing[email]') ? 'has-error' : ''}`">
            <label for="billing[email]">
                {{ __('shop::app.checkout.onepage.email') }}
            </label>

            <input
                type="text"
                class="control"
                id="billing[email]"
                name="billing[email]"
                @blur="isCustomerExist"
                v-validate="'email'"
                v-model="address.billing.email"
                @change="validateForm('address-form')"
                data-vv-as="&quot;{{ __('shop::app.checkout.onepage.email') }}&quot;" />

            <span class="control-error" v-if="errors.has('address-form.billing[email]')">
                @{{ errors.first('address-form.billing[email]') }}
            </span>
        </div>

        {{--  for customer login checkout   --}}
        @if (! $isCustomer)
            @include('shop::checkout.onepage.customer-checkout')
        @endif

        <div :class="`col-12 form-field ${errors.has('address-form.billing[address1][]') ? 'has-error' : ''}`" style="margin-bottom: 0;">
            <label for="billing_address_0" class="mandatory">
                {{ __('shop::app.checkout.onepage.address1') }}
            </label>

            <input
                type="text"
                class="control"
                v-validate="'required'"
                id="billing_address_0"
                name="billing[address1][]"
                v-model="address.billing.address1[0]"
                @change="validateForm('address-form')"
                data-vv-as="&quot;{{ __('shop::app.checkout.onepage.address1') }}&quot;" />

            <span class="control-error" v-if="errors.has('address-form.billing[address1][]')">
                @{{ errors.first('address-form.billing[address1][]') }}
            </span>
        </div>

        @if (
            core()->getConfigData('customer.settings.address.street_lines')
            && core()->getConfigData('customer.settings.address.street_lines') > 1
        )
            @for ($i = 1; $i < core()->getConfigData('customer.settings.address.street_lines'); $i++)
                <div class="col-12 form-field" style="margin-top: 10px; margin-bottom: 0">
                        <input
                            type="text"
                            class="control"
                            id="billing_address_{{ $i }}"
                            name="billing[address1][{{ $i }}]"
                            v-model="address.billing.address1[{{$i}}]" />
                </div>
            @endfor
        @endif

        @if ($cart->haveStockableItems())
            <div class="mb10">
                <span class="checkbox fs16 display-inbl no-margin">
                    <input
                        class="ml0"
                        type="checkbox"
                        id="billing[use_for_shipping]"
                        name="billing[use_for_shipping]"
                        v-model="address.billing.use_for_shipping"
                        @change="setTimeout(() => validateForm('address-form'), 0)" />

                    <span class="ml-5">
                        {{ __('shop::app.checkout.onepage.use_for_shipping') }}
                    </span>
                </span>
            </div>
        @endif

        @auth('customer')
            <div class="mb10">
                <span class="checkbox fs16 display-inbl no-margin">
                    <input
                        class="ml0"
                        type="checkbox"
                        id="billing[save_as_address]"
                        name="billing[save_as_address]"
                        @change="validateForm('address-form')"
                        v-model="address.billing.save_as_address"/>

                    <span class="ml-5">
                        {{ __('shop::app.checkout.onepage.save_as_address') }}
                    </span>
                </span>
            </div>
            @php
            @endphp
        @endauth
    @endif