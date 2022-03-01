<p>Select a billing address from your address book or enter a new address. </p>
<div class="input-option">

    @isset($billing_addresses)
        @foreach ($billing_addresses as $key => $value)

            <p class="chk-bx">
                <input type="radio" class="form-check-input" name="optradio1">{{ $value->company_name }},{{ $value->address}},{{  $value->city }},{{  $value->country->name }}  <span class="chk-radio"></span>
            </p>
        @endforeach

    @endisset

    <p class="chk-bx">
        <input type="radio" class="form-check-input" id="show_billing_address" name="optradio1">Add New
        Address <span class="chk-radio"></span>
    </p>
</div>
