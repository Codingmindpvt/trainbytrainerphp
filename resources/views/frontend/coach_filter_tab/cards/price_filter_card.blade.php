<div class="category-filter">
    <div class="cat-head categories-heading">
        <h5>Price</h5>
    </div>
    <hr>
    <div class="price-filter">
        <div class="custom-control custom-checkbox checkbox-area">
            <input type="checkbox" class="custom-control-input price_filter_checkbox" id="customCheckBox2" value="$$"
                <?php
                    if ( isset($price_ids) && in_array("$$", $price_ids)) {
                        echo 'checked';
                    } else {
                        echo '';
                    }

                ?>
                >
            <label class="custom-control-label" for="customCheckBox2">$$</label>
        </div>
        <div class="custom-control custom-checkbox checkbox-area">
            <input type="checkbox" class="custom-control-input price_filter_checkbox" id="customCheckBox3" value="$$$"
                @php

                    if (isset($price_ids) && in_array('$$$', $price_ids)) {
                        echo 'checked';
                    } else {
                        echo '';
                    }

                @endphp>
            <label class="custom-control-label" for="customCheckBox3">$$$</label>
        </div>
        <div class="custom-control custom-checkbox checkbox-area">
            <input type="checkbox" class="custom-control-input price_filter_checkbox" id="customCheckBox4" value="$$$$"
                @php

                    if ( isset($price_ids) && in_array('$$$$', $price_ids)) {
                        echo 'checked';
                    } else {
                        echo '';
                    }

                @endphp>
            <label class="custom-control-label" for="customCheckBox4">$$$$</label>
        </div>
    </div>
</div>
