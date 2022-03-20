<style>
.add-filter .view-profile-bt {
    float: right;
    line-height: 10px;
    margin-left: 12px;
}

.add-filter {
    display: flex;
    justify-content: flex-end;
    align-items: center;
}

.country-filter {
    height: 405px;
    overflow: auto;
}
</style>
<div class="add-filter">

    <form method="get" action="{{ route('coaches') }}">
        <input type="hidden" name="filter_category" id="filter_category" value="@php
                    if (isset($category_ids)) {
                        $value = implode(',', $category_ids);
                        echo str_replace(' ', '', $value);
                    } else {
                        echo '';
                    }
                @endphp">
        <input type="hidden" name="filter_price" id="filter_price" value="@php
                    if (isset($price_ids)) {
                        echo implode(',', $price_ids);
                    } else {
                        echo '';
                    }
                @endphp">
        <input type="hidden" name="filter_gender" id="filter_gender" value="@php
                    if (isset($gender_ids)) {
                        echo implode(',', $gender_ids);
                    } else {
                        echo '';
                    }
                @endphp">
        <input type="hidden" name="filter_rating" id="filter_rating" value="@php
                    if (isset($rating_ids)) {
                        echo implode(',', $rating_ids);
                    } else {
                        echo '';
                    }
                @endphp">
        <input type="hidden" name="filter_personality" id="filter_personality" value="@php
                    if (isset($personality_ids)) {
                        echo implode(',', $personality_ids);
                    } else {
                        echo '';
                    }
                @endphp">
        <input type="hidden" name="filter_country" id="filter_country" value="@php
                    if (isset($country_ids)) {
                        echo implode(',', $country_ids);
                    } else {
                        echo '';
                    }
                @endphp">
        <input type="hidden" name="filter_state" id="filter_state" value="@php
                    if (isset($state_ids)) {
                        echo implode(',', $state_ids);
                    } else {
                        echo '';
                    }
                @endphp">
        <input type="hidden" name="filter_city" id="filter_city" value="@php
                    if (isset($city_ids)) {
                        echo implode(',', $city_ids);
                    } else {
                        echo '';
                    }
                @endphp">
        <input type="hidden" name="sort_by" id="filter_sort_by" value="@php
                                        if (isset($filter_sort_by)) {
                                            echo $filter_sort_by;
                                        } else {
                                            echo '';
                                        }
                                    @endphp">

        <input type="hidden" name="filter_training_style" id="filter_training_style">
        &nbsp; &nbsp;&nbsp;&nbsp;<input type="submit" class="view-profile view-profile-bt" name="submit"
            style="cursor: pointer" value="Filter">
        <button class="Clear-Filter"><a href="{{ route('coaches') }}">Clear Filter</a></button>

    </form>


</div>