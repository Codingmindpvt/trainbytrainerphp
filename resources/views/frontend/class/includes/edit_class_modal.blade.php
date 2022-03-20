<!-- Modal -->
<style>
    div.pac-container {
        z-index: 99999999999 !important;
    }

</style>
<div class="modal fade bd-example-modal-lg edit-modal" id="editClassModal" tabindex="-1" role="dialog"
    aria-labelledby="editClassModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Edit Class</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('update.class') }}" method="post" id="updateClassForm"
                    enctype="multipart/form-data">
                    <style>
                        .hide {
                            display: none;
                        }

                    </style>
                    @csrf
                    <input type="hidden" value="" id="class_id" name="id">
                    <div class="view-box">
                        <p class="my-2 form-p">Class Image<span><i
                            class="fa fa-asterisk validate-mark" aria-hidden="true"></i></span></p>
                        <div class="upload-certificate-box-main">
                            <div class="upload-certificate-box">
                                <img src="public/images/default-image.png" class="imgPreview_edit" id="imgPreview"
                                    alt="upload">
                                <input id="imgUpload_edit" name="class_image" type="file"
                                    accept="image/jpeg, image/jpg, image/png" class="file imgUpload"
                                    data-show-upload="false" data-show-caption="true"
                                    data-msg-placeholder="Select {files} for upload...">
                            </div>
                        </div>
                    </div>
                    <div class="view-box">
                        <div class="form-row">
                            <aside class="col-md-3">
                                <p class="my-2 form-p">Class Categories<span><i
                                    class="fa fa-asterisk validate-mark" aria-hidden="true"></i></span></p>
                                <div class="form-select">
                                    <select class="form-input class_category edit_class_category " id="update_class_category"
                                        name="category_id">
                                        <option value="">Select</option>
                                        @isset($categories)
                                            @foreach ($categories as $key => $value)
                                                <option value="{{ $value->id }}">{{ $value->title }}</option>
                                            @endforeach
                                        @endisset
                                    </select>
                                    <span class="update_errors update_class_category_error hide">Please select a class category</span>
                                </div>
                            </aside>
                            <aside class="col-md-3">
                            <p class="my-2 form-p">Price Per Session({{DEFAULT_CURRENCY_SORT_NAME}})<i class="fa fa-info-circle"
                                        data-toggle="tooltip" title="Prices are currently listed in {{DEFAULT_CURRENCY_FULL_NAME.' '.DEFAULT_CURRENCY_FULL_NAME}}. Please also
                                    consider taxes and our standard commission (15%) when creating this price."><span><i
                                        class="fa fa-asterisk validate-mark" aria-hidden="true"></i></span></i>
                                </p>
                                <input class="form-input update_class_price  edit_class_price" type="text" name="price"
                                    id="update_prize">
                                <span class="update_errors update_class_price_error hide number_only "> Please add Price.</span>
                            </aside>
                            <aside class="col-md-3">
                                <p class="my-2 form-p">Attendees Limit<span><i
                                    class="fa fa-asterisk validate-mark" aria-hidden="true"></i></span></p>
                                <input class="form-input update_class_attendees_limit   edit_attendees_limit" type="text"
                                    name="attendees_limit" id="update_attendees_limit">
                                <span class="update_errors update_class_attendees_limit_error hide number_only">Please add attendees
                                    limit</span>
                            </aside>
                            <aside class="col-md-3">
                                <p class="my-2 form-p">Action<span><i
                                    class="fa fa-asterisk validate-mark" aria-hidden="true"></i></span></p>
                                <div class="form-select">
                                    <select class="form-input update_class_action edit_class_action" id="" name="status">
                                        <option class="" value="1">Enable</option>
                                        <option class="" value="0">Disable</option>
                                    </select>
                                    <span class="update_errors update_class_action_error1 hide"></span>

                                </div>
                            </aside>
                        </div>
                    </div>

                    <div class="view-box form-group mt-3">
                        <p>Class Name<span><i
                            class="fa fa-asterisk validate-mark" aria-hidden="true"></i></span></p>
                        <input class="form-input update_class_name  form-control edit_class_name" maxlength="25" type="text" name="name">
                        <span class="update_errors update_class_name_error hide">Please add class name.</span>

                    </div>
                    <div class="view-box ">
                        <p class="my-2 form-p">Class Description<span><i
                            class="fa fa-asterisk validate-mark" aria-hidden="true"></i></span></p>
                        <textarea class="form-input update_class_description  edit_class_des" maxlenght="300" name="description"></textarea>
                        <span class="update_errors update_class_description_error hide">Please add class description</span>

                    </div>




                    <div class="view-box">
                        <p>Location of the Class<span><i
                            class="fa fa-asterisk validate-mark" aria-hidden="true"></i></span></p>
                        <input type="hidden" id="edit_address_lat" name="latitude" class="edit_class_latitude">
                        <input type="hidden" id="edit_address_long" name="longitude" class="edit_class_longitude">

                        <input class="form-input on_change_address_edit edit_class_address " type="text" id="address_2"
                            name="address">
                        <span class="update_errors address_error hide" id="address_error">
                            This address is not valid address. Please enter valid address
                        </span>
                    </div>
                    {{-- <button type="submit" class="blue-btn oswald-font my-3 save_class">Save Class and Countinue</button> --}}

            </div>
            <div class="modal-footer">
                <button type="submit" class="blue-btn-sm oswald-font my-1 update_class">Update</button>
            </div>
        </div>
        </form>

    </div>
</div>
