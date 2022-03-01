<div class="col-lg-3 col-md-6">
    <div class="category-filter">
        <div class="cat-head">
            <h5>Personality</h5>
            <input type="search" id="trainingStyleSearch" class="form-control" placeholder="search"
                aria-label="Search" />
        </div>
        <hr>
        <div class="all-filter all-filter-height-box">
            @foreach ($trainingStyleList as $trainingStyle)
                <div class="custom-control custom-checkbox checkbox-area" id="trainingStyleItem">
                    <input type="checkbox" name="training_style" value="{{ $trainingStyle['id'] }}"
                        class="custom-control-input training_style per_filter_checkbox"
                        id="{{ 'training_style_' . $trainingStyle['id'] }}" @php

                            if (isset($personality_ids) &&   in_array($trainingStyle['id'], $personality_ids)) {
                                echo 'checked';
                            } else {
                                echo '';
                            }

                        @endphp>
                    <label class="custom-control-label"
                        for="{{ 'training_style_' . $trainingStyle['id'] }}">{{ $trainingStyle['title'] }}</label>
                </div>
            @endforeach
        </div>
    </div>
</div>
