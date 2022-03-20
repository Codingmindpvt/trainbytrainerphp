<script>
//$('#address_error').html('') 

$('.on_change_addess').on('keyup', function() {
    var address_1 = document.getElementById('address_1');
    document.getElementById('address_lat').value = '';
    document.getElementById('address_long').value = '';


    $('#address_error').html('This address is not valid address. Please enter valid address');
    var autocomplete_address_1 = new google.maps.places.Autocomplete(address_1);
    console.log(autocomplete_address_1);
    google.maps.event.addListener(autocomplete_address_1, 'place_changed', function() {
        var address_1 = autocomplete_address_1.getPlace();
        console.log(address_1.geometry.location.lat());
        document.getElementById('address_lat').value = address_1.geometry.location.lat();
        document.getElementById('address_long').value = address_1.geometry.location.lng();
        var address_components = address_1.address_components;
        console.log(address_components);
        $('#address_error').html('');
    });
})


$('body').on('keyup', '.on_change_address_edit', function() {


    var address_2 = document.getElementById('address_2');
    document.getElementById('edit_address_lat').value = '';
    document.getElementById('edit_address_long').value = '';

    var autocomplete_address_2 = new google.maps.places.Autocomplete(address_2);
    console.log(autocomplete_address_2);
    google.maps.event.addListener(autocomplete_address_2, 'place_changed', function() {
        var address_2 = autocomplete_address_2.getPlace();
        document.getElementById('edit_address_lat').value = address_2.geometry.location.lat();
        document.getElementById('edit_address_long').value = address_2.geometry.location.lng();
        var address_components = address_2.address_components;
        // console.log(address_components);
    });

})

$('.add_class_btn').on('click', function() {
    $('.add_class_div').slideToggle(1000);

})


$("#imgUpload_edit").on('change', function() {
    var file = this.files[0];
    if (file) {
        let reader = new FileReader();
        reader.onload = function(event) {
            console.log(event.target.result);
            $('.imgPreview_edit').attr('src', event.target.result);
        }
        reader.readAsDataURL(file);
    }
});
$("#prize").blur(function() {
    if (this.checkValidity()) {
        localStorage.setItem("errorPrize", false);
    } else {
        localStorage.setItem("errorPrize", true);
        $('.class_price_error').html('Please add a valid Price').css('color', 'red').show()
    }
});

$("#prize").blur(function() {
    if (this.checkValidity()) {
        localStorage.setItem("errorPrize", false);
    } else {
        localStorage.setItem("errorPrize", true);
        $('.class_price_error').html('Please add a valid Price').css('color', 'red').show()
    }
});

$("#attendees_limit").blur(function() {
    var z = $(this).val();
    if (!/^[1-9]+$/.test(z)) {
        localStorage.setItem("errorAttendee", true);
        $('.class_attendees_limit_error').html('Please add a valid Number').css('color', 'red').show()
    } else {
        localStorage.setItem("errorAttendee", false);
        $('.class_attendees_limit_error').html('Please add a valid Number').css('color', 'red').hide()
    }
});



localStorage.setItem("isImage", false);

$("#imgUpload_add").on('change', function() {
    var file = this.files[0];
    if (file) {
        let reader = new FileReader();
        reader.onload = function(event) {
            console.log(event.target.result);
            localStorage.setItem("isImage", true);
            $('.class_image_error').html('')
            $('.imgPreview_add').attr('src', event.target.result);
        }
        reader.readAsDataURL(file);
    }
});

function validateClassForm() {


    var errors = [];
    $('.errors').addClass('hide');
    if ($.trim($('#address_lat').val()) === '' && $.trim($('#address_lat').val()) === '') {
        errors.push('address_error')
    }
    if ($('#class_category').val() === '') {
        errors.push('class_category_error')
    }


    if ($.trim($('.class_price').val()) === '' || localStorage.getItem("errorPrize") == 'true') {
        errors.push('class_price_error')
    }
    if ($.trim($('.class_attendees_limit').val()) === '' || localStorage.getItem("errorAttendee") == 'true') {
        errors.push('class_attendees_limit_error')
    }
    if ($.trim($('.class_action').val()) === '') {
        errors.push('class_action_error')
    }
    if ($.trim($('.class_name').val()) === '') {
        errors.push('class_name_error')
    }
    if ($.trim($('.class_description').val()) === '') {
        errors.push('class_description_error')
    }
    if (localStorage.getItem("isImage") == 'false') {
        errors.push('class_image_error')
    }


    if (errors.length > 0) {

        for (i = 0; i <= errors.length; i++) {
            if (errors[i] != 'undefined') {
                $('.' + errors[i]).css('color', 'red').removeClass('hide');
            }
        }
    }
    return errors;
}

function validateUpdateClassForm() {
    var errors = [];
    $('.update_errors').addClass('hide');
    if ($('#edit_address_lat').val() === '' && $('#edit_address_long').val() === '') {
        errors.push('address_error')
    }
    if ($('#update_class_category').val() === '') {
        errors.push('update_class_category_error')
    }
    if ($('.update_class_price').val() === '') {
        errors.push('update_class_price_error')
    }
    if ($('.update_class_attendees_limit').val() === '') {
        errors.push('update_class_attendees_limit_error')
    }
    if ($('.update_class_action').val() === '') {
        errors.push('update_class_action_error')
    }
    if ($('.update_class_name').val() === '') {
        errors.push('update_class_name_error')
    }
    if ($('.update_class_description').val() === '') {
        errors.push('update_class_description_error')
    }

    if (errors.length > 0) {
        for (i = 0; i <= errors.length; i++) {
            if (errors[i] != 'undefined') {
                $('.' + errors[i]).css('color', 'red').removeClass('hide');
            }
        }
    }
    return errors;
}
$('.save_class').on('click', function(e) {
    e.preventDefault();
    var errors = validateClassForm();
    if (errors.length === 0) {
        var price = $('#prize').val();
        var validatePrice = function(price) {
            return /^(?:\d+|\d{1,3}(?:,\d{3})+)(?:\.\d+)?$/.test(price);
        }
        if (!validatePrice(price)) {
            $('.class_price_error').removeClass('hide').css('color', 'red').html('Please add valid Input!');
            return false;
        }
        var attendees_limit = $('#attendees_limit').val();
        var validateAttendees_limit = function(attendees_limit) {
            return /^(?:\d+|\d{1,3}(?:,\d{3})+)(?:\.\d+)?$/.test(attendees_limit);
        }
        if (!validateAttendees_limit(attendees_limit)) {
            $('.class_attendees_limit_error').removeClass('hide').css('color', 'red').html(
                'Please add valid Input!');
            return false;
        }
        $('#saveClassForm').submit();
    }
})
$('.update_class').on('click', function(e) {
    e.preventDefault();

    var errors = validateUpdateClassForm();
    if (errors.length === 0) {
        var price = $('#update_prize').val();
        var validatePrice = function(price) {
            return /^(?:\d+|\d{1,3}(?:,\d{3})+)(?:\.\d+)?$/.test(price);
        }
        if (!validatePrice(price)) {
            $('.update_class_price_error').removeClass('hide').css('color', 'red').html(
                'Please add valid Input!');
            return false;
        }
        var attendees_limit = $('#update_attendees_limit').val();
        var validateAttendees_limit = function(attendees_limit) {
            return /^(?:\d+|\d{1,3}(?:,\d{3})+)(?:\.\d+)?$/.test(attendees_limit);
        }
        if (!validateAttendees_limit(attendees_limit)) {
            $('.update_class_attendees_limit_error').removeClass('hide').css('color', 'red').html(
                'Please add valid Input!');
            return false;
        }
        $('#updateClassForm').submit();
    }
})

$('.onchange').on('keyup', function() {
    var errors = validateClassForm();
    console.log(errors)
})
//Edit Class
$('.edit_class').on('click', function() {
    var url = "{{ URL('/') }}";
    $('#editClassModal').modal('show');
    var class_detail = $(this).data('class');
    $('.imgPreview_edit').attr('src', url + '/public/class/' + class_detail.image)
    $('.edit_class_category').val(class_detail.category_id);
    $('#class_id').val(class_detail.id);
    $('.edit_class_price').val(class_detail.price);
    $('.edit_attendees_limit').val(class_detail.attendees_limit);
    $('.edit_class_action').val(class_detail.status);
    $('.edit_class_name').val(class_detail.name);
    $('.edit_class_name').val(class_detail.name);
    $('.edit_class_des').val(class_detail.description);
    $('.edit_class_latitude').val(class_detail.latitude);
    $('.edit_class_longitude').val(class_detail.longitude);
    $('.edit_class_address').val(class_detail.address);

});


$('body').on('click', '.edit', function() {
    $(this).parent().find('.update').toggle();
    $(this).parent().parent().addClass('showBorderParent')
    $(this).parent().parent().find('.from_time').addClass('showBorder');
    $(this).parent().parent().find('.to_time').addClass('showBorder');
    $(this).parent().parent().find('.class_id').addClass('showBorder');
    $(this).hide();
});
$('body').on('click', '.update', function() {
    $(this).hide();
    $(this).parent().find('.edit').show();
    $(this).parent().parent().removeClass('showBorderParent')
    $(this).parent().parent().find('.from_time').removeClass('showBorder');
    $(this).parent().parent().find('.to_time').removeClass('showBorder');
    $(this).parent().parent().find('.class_id').removeClass('showBorder');

    var from_time = $(this).parent().parent().find('.from_time').val();
    var to_time = $(this).parent().parent().find('.to_time').val();
    var class_id = $(this).parent().parent().find('.class_id').val();
    var status = $(this).parent().parent().find('.status').is(':checked');
    if (status) {
        status = 1;
    } else {
        status = 0;
    }
    var sch_id = $(this).data('sch_id');
    var data = {
        "from_time": from_time,
        "to_time": to_time,
        "class_id": class_id,
        "sch_id": sch_id,
        "status": status
    }
    var save_schedule_url = "{{ route('update.class.schedule') }}";
    var _token = "{{ csrf_token() }}"

    $.ajax({
        url: save_schedule_url,
        type: 'POST',
        data: {
            _token: _token,
            data: data
        },
        dataType: 'json',
        success: function(data) {
            if (data.status) {
                $('.schedule-success').show().html(data.message);
                $this.parent().parent().remove();

            } else {
                $('.schedule-success').show().html(data.message);

                setTimeout(function() {
                    $('.schedule-success').hide().html(data.message);
                }, 1000);
            }
        },
        error: function(request, error) {

        }
    });

});

$('body').on('click', '.remove', function() {
    var $this = $(this);

    var id = $this.data('id');
    var save_schedule_url = "{{ route('delete.class.schedule') }}";
    var _token = "{{ csrf_token() }}"

    $.ajax({
        url: save_schedule_url,
        type: 'POST',
        data: {
            _token: _token,
            id: id
        },
        dataType: 'json',
        success: function(data) {
            if (data.status) {
                $('.schedule-success').show().html(data.message);
                $this.parent().parent().remove();

            } else {
                $('.schedule-success').show().html(data.message);

                setTimeout(function() {
                    $('.schedule-success').hide().html(data.message);
                }, 1000);
            }
        },
        error: function(request, error) {

        }
    });

})



var all_errors = [];
//Schedule javascript

$('.add_more_button').on('click', function(e) {
    e.preventDefault();
    var type = $(this).data('type');
    //check value is present in div
    var errors = validateInput(type);


    if (errors.length === 0) {

        cloneTab(type);
    } else {
        return false;
    }



})

function cloneTab(type) {

    var clone_div = $('.clone_' + type + '_div:first').clone();
    clone_div.find('.to_time').val('');
    clone_div.find('.from_time').val('');
    clone_div.find('.remove').show();

    $('.append_' + type + '_div').append(clone_div);
    $(".timepicker").datetimepicker({
        format: 'H:mm',
        icons: {
            up: "fa fa-chevron-up",
            down: "fa fa-chevron-down"
        }
    }).on('dp.change', function(e, v) {
        var $this = $(this);
        var type = $this.data('type');
        var time = this.value;
        sheduleClassTime(time, $this, type);
    });
}

$(document).ready(function() {
    $(".timepicker").datetimepicker({
        format: 'H:mm',
        icons: {
            up: "fa fa-chevron-up",
            down: "fa fa-chevron-down"
        }
    }).on('dp.change', function(e, v) {
        console.log('time', e);
        var $this = $(this);
        var type = $this.data('type');
        var time = this.value;
        sheduleClassTime(time, $this, type);
    });

});


//validate inputs
function validateInput(type) {
    var errors = [];
    $('.' + type + '_errors').html('');
    var lastEl = $(".clone_" + type + "_div").length;
    var eq = $(".clone_" + type + "_div").eq(lastEl - 1);
    var from_time = eq.find('.from_time').val();
    var to_time = eq.find('.to_time').val();

    if (to_time === '') {
        eq.find('.' + type + '_to_time_error').css('color', 'red').html('Please Fill to time Field.');
        errors.push('.' + type + '_to_time_error');
    }
    if (from_time === '') {
        eq.find('.' + type + '_from_time_error').css('color', 'red').html('Please Fill from time Field.');
        errors.push('.' + type + '_from_time_error');
    }
    console.log(errors);
    return errors;
}


function calculateTime(from_time, to_time) {

    var minDiff = (parseInt(from_time.split(':')[1], 10) - parseInt(to_time.split(':')[1], 10));
    var hourDiff = (parseInt(from_time.split(':')[0], 10) - parseInt(to_time.split(':')[0], 10));

    return {
        minDiff: minDiff,
        hourDiff: hourDiff
    };


}


function sheduleClassTime(time, $this, type) {


    if ($this.hasClass('to_time')) {
        $('.' + type + '_errors').html('');
        var form_time = $this.parent().prev('.clock-box').find('.from_time').val();

        if (form_time === '') {
            $this.parent().prev('.clock-box').find('.' + type + '_from_time_error').html(
                'Please fill from time first').css('color', 'red');
            $('.' + type + '_add_more_button').addClass("btn-disabled");
            $('.create_schedule').addClass("btn-disabled");

            return false;
        }


        var hourDiff = (parseInt(time.split(':')[0], 10) - parseInt(form_time.split(':')[0], 10));
        var minDiff = (parseInt(time.split(':')[1], 10) - parseInt(form_time.split(':')[1], 10));



        console.log(hourDiff + '' + minDiff);



        if (minDiff <= 0 && hourDiff == 0) {
            console.log("minDiff", minDiff);
            console.log("hourDiff", hourDiff);
            $this.parent().find('.' + type + '_to_time_error').html('Date must be greater then from time').css(
                'color', 'red');
            $('.' + type + '_add_more_button').addClass("btn-disabled");
            $('.create_schedule').addClass("btn-disabled");

            return false;
        }

        if (hourDiff < 0) {
            console.log("hourDiff be ----", hourDiff);
            $this.parent().find('.' + type + '_to_time_error').html('Date must be greater then from time').css(
                'color', 'red');
            $('.' + type + '_add_more_button').addClass("btn-disabled");
            $('.create_schedule').addClass("btn-disabled");

            return false;
        }
        if (hourDiff === 0 && minDiff < 15) {
            $this.parent().find('.' + type + '_to_time_error').html('Differnce between time atleast 15 min.').css(
                'color', 'red');
            $('.' + type + '_add_more_button').addClass("btn-disabled");
            $('.create_schedule').addClass("btn-disabled");

            return false;
        }


        $this.parent().find('.' + type + '_to_time_error').html('');
        $('.add_more_button').removeClass("btn-disabled");

        $('.create_schedule').removeClass("btn-disabled");

    }
    if ($this.hasClass('from_time')) {
        $('.' + type + '_errors').html('');
        var from_time = $this.parent().next('.clock-box').find('.to_time').val();
        var hourDiff1 = (parseInt(from_time.split(':')[0], 10) - parseInt(time.split(':')[0], 10));
        var minDiff1 = (parseInt(from_time.split(':')[1], 10) - parseInt(time.split(':')[1], 10));

        var hourDiff = (parseInt(time.split(':')[0], 10) - parseInt(from_time.split(':')[0], 10));
        var minDiff = (parseInt(time.split(':')[1], 10) - parseInt(from_time.split(':')[1], 10));



        if (hourDiff > 0) {
            $this.parent().find('.' + type + '_from_time_error').html('Date must be lesser then to time').css(
                'color', 'red');
            $('.' + type + '_add_more_button').addClass("btn-disabled");
            return false;
        }
        if (minDiff > 0) {
            $this.parent().find('.' + type + '_from_time_error').html('Date must be lesser then to time').css(
                'color', 'red');
            $('.' + type + '_add_more_button').addClass("btn-disabled");
            return false;
        }

        if (hourDiff1 === 0 && minDiff1 < 15) {
            $this.parent().find('.' + type + '_from_time_error').html('Differnce between time atleast 15 min.').css(
                'color', 'red');
            $('.' + type + '_add_more_button').addClass("btn-disabled");
            $('.create_schedule').addClass("btn-disabled");

            return false;
        }

        $this.parent().find('.' + type + '_from_time_error').html('');
        $('.add_more_button').removeClass("btn-disabled");
        $('.create_schedule').removeClass("btn-disabled");


    }

    if ($(".clone_" + type + "_div").length > 1 && $this.hasClass('from_time_class')) {
        var indexVal = [];
        $('.' + type + '_errors').html('');
        $(".clone_" + type + "_div").each(function(index) {
            indexVal.push(index);
        });
        var div_length = indexVal.length - 1;

        var from_time = $(".clone_" + type + "_div").eq(div_length - 1).find('.from_time').val();
        var to_time = $(".clone_" + type + "_div").eq(div_length - 1).find('.to_time').val();

        var diff = calculateTime(time, to_time);
        console.log('diff', diff);

        if (diff.hourDiff > 0 || diff.minDiff > 30) {
            $(".clone_" + type + "_div").eq(div_length).find('.from_time').css('border', '')
            $(".clone_" + type + "_div").eq(div_length).find('.' + type + '_from_time_error').css('color', 'red')
                .html(
                    '');
            $('.' + type + '_add_more_button').removeClass("btn-disabled");
        } else if (diff.hourDiff < 0) {
            $(".clone_" + type + "_div").eq(div_length).find('.from_time').css('border', '1px solid red')
            $(".clone_" + type + "_div").eq(div_length).find('.' + type + '_from_time_error').css('color', 'red')
                .html(
                    'Your time is 30 min greater then from first schedule to time.');
            $('.' + type + '_add_more_button').addClass("btn-disabled");
        } else {

            $(".clone_" + type + "_div").eq(div_length).find('.from_time').css('border', '1px solid red')
            $(".clone_" + type + "_div").eq(div_length).find('.' + type + '_from_time_error').css('color', 'red')
                .html(
                    'Your time is 30 min greater then from first schedule to time.');
            $('.' + type + '_add_more_button').addClass("btn-disabled");
        }
    }

}



let finalArray = {};

$('.create_schedule').on('click', function(e) {
    e.preventDefault();
    $(".loop_for_data").each(function(index) {
        var div = $(".loop_for_data").eq(index);
        var type = div.attr('id');
        var div_type = div.data('type');

        let innerTabArry = [];
        $(".clone_" + div_type + "_div").each(function(index) {
            var inner_div = $(".clone_" + div_type + "_div").eq(index);
            var form_time = inner_div.find('.from_time').val();
            var class_id = inner_div.find('.class_id').val();
            var to_time = inner_div.find('.to_time').val();
            var status = inner_div.find('.status').is(':checked');
            if (status) {
                status = 1;
            } else {
                status = 0;
            }
            if (form_time != '' && to_time != '' && to_time != 'undefined' && form_time !=
                'undefined') {
                var multiRecords = {
                    'class_id': class_id,
                    'form_time': form_time,
                    'to_time': to_time,
                    'status': status,
                }
                innerTabArry.push(multiRecords);
            }
        });

        finalArray[type] = innerTabArry;
    });
    var save_schedule_url = "{{ route('create.class.schedule') }}";
    var _token = "{{ csrf_token() }}"

    console.log(finalArray)
    $.ajax({
        url: save_schedule_url,
        type: 'POST',
        data: {
            _token: _token,
            detail: finalArray
        },
        dataType: 'json',
        success: function(data) {
            if (data.status) {
                $('.schedule-success').show().html(data.message);
                setTimeout(function() {
                    location.reload();
                }, 1000);

            } else {
                $('.schedule-success').show().html(data.message);
                setTimeout(function() {
                    $('.schedule-success').hide().html(data.message);
                }, 1000);
            }
        },
        error: function(request, error) {

        }
    });
})
</script>