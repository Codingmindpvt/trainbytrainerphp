  <div class="category-filter">
      <div class="cat-head">
          <h5>City</h5>
          <input type="search" id="searchCityName" class="form-control" placeholder="search" aria-label="Search" />
      </div>
      <hr>
      <div class="all-filter city-filter">
          @foreach ($cityList as $city)
          <div class="custom-control custom-checkbox checkbox-area">
              <input type="checkbox" name="city" class="custom-control-input city" id="cityCheckBox{{ $city->id }}"
                  value="{{ $city->name }}">
              <label class="custom-control-label" for="cityCheckBox{{ $city->id }}">{{ $city->name }}</label>
          </div>
          @endforeach
      </div>
  </div>