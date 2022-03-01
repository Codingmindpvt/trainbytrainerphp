<div class="category-filter mt-4">
    <div class="cat-head categories-heading">
        <h5>Gender</h5>
    </div>
    <hr>
    <div class="price-filter">
        <div class="custom-control custom-checkbox checkbox-area">
            <input type="checkbox" class="custom-control-input gender_filter_checkbox" id="gender1" value="M"
                @php

                    if (isset($gender_ids) && in_array('M', $gender_ids)) {
                        echo 'checked';
                    } else {
                        echo '';
                    }

                @endphp>
            <label class="custom-control-label" for="gender1">Male</label>
        </div>
        <div class="custom-control custom-checkbox checkbox-area">
            <input type="checkbox" class="custom-control-input gender_filter_checkbox" id="gender2" value="F"
                @php

                    if (isset($gender_ids) && in_array('F', $gender_ids)) {
                        echo 'checked';
                    } else {
                        echo '';
                    }

                @endphp>
            <label class="custom-control-label" for="gender2">Female</label>
        </div>
    </div>
</div>
