<div class="col-lg-3 col-md-6">
    <div class="category-filter">
        <div class="cat-head">
            <h5>Category</h5>
            <input type="search" id="categorySearch" class="form-control" placeholder="search" aria-label="Search" />
        </div>
        <hr>
        <div class="all-filter all-filter-height-box">
            @foreach (@$categoryList as $category)
                <div class="custom-control custom-checkbox checkbox-area" id="categoryItem">
                    <input type="checkbox" name="category" value="{{ $category['id'] }}"
                        class="custom-control-input category" id="{{ 'category_' . $category['id'] }}"
                        @php
                            if (isset($category_ids) && in_array($category['id'], $category_ids)) {
                                echo 'checked';
                            } else {
                                echo '';
                            }
                        @endphp>
                    <label class="custom-control-label"
                        for="{{ 'category_' . $category['id'] }}">{{ $category['title'] }}</label>
                </div>
            @endforeach
        </div>
    </div>
</div>
