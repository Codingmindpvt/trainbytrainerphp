<form action="{{ route('save.class') }}" method="post" id="saveClassForm" enctype="multipart/form-data">
    <style>
        .hide {
            display: none;
        }

    </style>
    @csrf
    <div class="view-box">

        <p class="my-2 form-p">Class Image<span> </span>
        </p>
        <div class="upload-certificate-box-main">
            <div class="upload-certificate-box">
                <img src="public/images/default-image.png" class="imgPreview" id="imgPreview" alt="upload">
                <input id="imgUpload" name="class_image" type="file" accept="image/jpeg, image/jpg, image/png"
                    class="file imgUpload" data-show-upload="false" data-show-caption="true"
                    data-msg-placeholder="Select {files} for upload...">
            </div>
        </div>
    </div>
    <div class="view-box">
        <div class="form-row">
            <aside class="col-md-3">
                <p class="my-2 form-p">Class Categories</p>
                <div class="form-select">
                    <select class="form-input class_category onchange" id="class_category" name="category_id">
                        <option value="">Select</option>
                        @isset($categories)
                            @foreach ($categories as $key => $value)
                                <option value="{{ $value->id }}">{{ $value->title }}</option>
                            @endforeach
                        @endisset
                    </select>
                    <span class="errors class_category_error hide">Please select a class category</span>
                </div>
            </aside>
            <aside class="col-md-3">
                <p class="my-2 form-p">Price Per Session<i class="fa fa-info-circle" data-toggle="tooltip" title="Prices are currently listed in {{'('.DEFAULT_CURRENCY.') '.DEFAULT_CURRENCY_FULL_NAME}}. Please also
                    consider taxes and our standard commission ({{isset($commission->commission_percent) ? $commission->commission_percent.'%' : ''}}) when creating this price."></i>
                </p>
                <input class="form-input class_price onchange " type="text" name="price" id="prize">
                <span class="errors class_price_error hide number_only"> Please add Price.</span>
            </aside>
            <aside class="col-md-3">
                <p class="my-2 form-p">Attendees Limit</p>
                <input class="form-input class_attendees_limit onchange " type="text" name="attendees_limit" id="attendees_limit">
                <span class="errors class_attendees_limit_error hide number_only">Please add attendees limit</span>
            </aside>
            <aside class="col-md-3">
                <p class="my-2 form-p">Action</p>
                <div class="form-select">
                    <select class="form-input class_action" id="" name="status">
                        <option class="" value="1">Enable</option>
                        <option class="" value="0">Disable</option>
                    </select>
                    <span class="errors class_action_error1 hide"></span>

                </div>
            </aside>
        </div>
    </div>
    <div class="view-box">
        <p class="my-2 form-p">Class Name</p>
        <input class="form-input class_name onchange" type="text" name="name">
        <span class="errors class_name_error hide">Please add class name.</span>

    </div>
    <div class="view-box">
        <p class="my-2 form-p">Class Description</p>
        <textarea class="form-input class_description onchange" name="description"></textarea>
        <span class="errors class_description_error hide">Please add class description</span>

    </div>
    <div class="view-box">
        <p class="my-2 form-p">Location of the Class</p>
        <input type="hidden" id="address_lat" name="latitude">
        <input type="hidden" id="address_long" name="longitude">

        <input class="form-input on_change_addess map_address" type="text" id="address_1" name="address">
        <span class="errors address_error hide" id="address_error">
            This address is not valid address. Please enter valid address
        </span>
    </div>
    <button type="submit" class="blue-btn oswald-font my-3 save_class">Save Class and Countinue</button>
</form>
