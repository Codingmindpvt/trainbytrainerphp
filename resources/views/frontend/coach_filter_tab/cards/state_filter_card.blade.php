<div class="category-filter">
    <div class="cat-head">
        <h5>State</h5>
        <input type="search" id="searchStateName" class="form-control" placeholder="search" aria-label="Search" />
    </div>
    <hr>
    <div class="all-filter  country-filter">
        @foreach ($stateList as $state)
        <div class="custom-control custom-checkbox checkbox-area">
            <input type="checkbox" name="state" class="custom-control-input state state_filter_checkbox"
                id="stateCheckBox{{ $state->id }}" value="{{ $state->id }}" @php if (isset($state_ids) &&
                in_array($state->id, $state_ids)) {
            echo 'checked';
            } else {
            echo '';
            }

            @endphp>
            <label class="custom-control-label" for="stateCheckBox{{ $state->id }}">{{ $state->name }}</label>
        </div>
        @endforeach
    </div>
</div>