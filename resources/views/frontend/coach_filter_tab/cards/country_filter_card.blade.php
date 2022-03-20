{{--  <div class="category-filter">
    <div class="cat-head">
        <h5>Country</h5>
        <input type="search" id="searchCountryName" class="form-control" placeholder="search" aria-label="Search" />
    </div>
    <hr>
    <div class="all-filter  country-filter">
        @foreach ($countryList as $country)
            <div class="custom-control custom-checkbox checkbox-area">
                <input type="checkbox" name="country" class="custom-control-input country country_filter_checkbox"
                    id="countryCheckBox{{ $country->id }}" value="{{ $country->id }}" @php

                        if (isset($country_ids) &&  in_array($country->id, $country_ids)) {
                            echo 'checked';
                        } else {
                            echo '';
                        }

                    @endphp>
                <label class="custom-control-label"
                    for="countryCheckBox{{ $country->id }}">{{ $country->name }}</label>
            </div>
        @endforeach
    </div>
</div>  --}}
