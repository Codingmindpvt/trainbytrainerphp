<div class="category-filter mt-4">
    <div class="cat-head">
        <h5>Rating</h5>
    </div>
    <hr>
    <div class="rating-filter">
        <div class="custom-control custom-checkbox checkbox-area">
            <input type="checkbox" class="custom-control-input rating_filter_checkbox" id="rating5" value="5"
                @php

                    if (isset($rating_ids) && in_array('5', $rating_ids)) {
                        echo 'checked';
                    } else {
                        echo '';
                    }

                @endphp>
            <label class="custom-control-label" for="rating5">5 Stars</label>
        </div>
        <div class="custom-control custom-checkbox checkbox-area">
            <input type="checkbox" class="custom-control-input rating_filter_checkbox" id="rating1" value="4"
                @php

                    if (isset($rating_ids) && in_array('4', $rating_ids)) {
                        echo 'checked';
                    } else {
                        echo '';
                    }

                @endphp>
            <label class="custom-control-label" for="rating1">4 Stars</label>
        </div>



        <div class="custom-control custom-checkbox checkbox-area">
            <input type="checkbox" class="custom-control-input rating_filter_checkbox" id="rating2" value="3"
                @php

                    if (isset($rating_ids) && in_array('3', $rating_ids)) {
                        echo 'checked';
                    } else {
                        echo '';
                    }

                @endphp>
            <label class="custom-control-label" for="rating2">3 Stars</label>
        </div>
        <div class="custom-control custom-checkbox checkbox-area">
            <input type="checkbox" class="custom-control-input rating_filter_checkbox" id="rating3" value="2"
                @php

                    if (isset($rating_ids) && in_array('2', $rating_ids)) {
                        echo 'checked';
                    } else {
                        echo '';
                    }

                @endphp>
            <label class="custom-control-label" for="rating3">2 Stars</label>
        </div>


        <div class="custom-control custom-checkbox checkbox-area">
            <input type="checkbox" class="custom-control-input rating_filter_checkbox" id="rating4" value="1"
                @php

                    if (isset($rating_ids) &&  in_array('1', $rating_ids)) {
                        echo 'checked';
                    } else {
                        echo '';
                    }

                @endphp>
            <label class="custom-control-label" for="rating4">1 Star</label>
        </div>
    </div>
</div>
