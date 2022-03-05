 /********************************/

    /* No Space Validation */

 /********************************/
  jQuery.validator.addMethod("noSpace", function(value, element) {
    return value == '' || value.trim().length != 0;
  }, "No space please and don't leave it empty");


/********************************/

    /* Regular Expression Validation */

 /********************************/
  $.validator.addMethod(
  "regex",
  function(value, element, regexp) {
    var re = new RegExp(regexp);
    return this.optional(element) || re.test(value);
  },
  "Please check your input."
);




 /********************************/

    /* LOGIN: Form Validation */

 /********************************/
$("#loginForm").validate({
  rules: {
    email: {
      required: true,
      email: true,
      noSpace: true
    },
    password : {
      required: true,
        // minlength : 8,
        noSpace: true
    }
  }
});




 /********************************/

    /* SIGNUP: Form Validation */

 /********************************/
$("#signupForm").validate({
  rules: {
    user_type: {
      required: true
    },
    email: {
      required: true,
      email: true,
      //noSpace: true,
      regex: /^\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
    },
    password : {
    	required: true,
        minlength : 3,
        noSpace: true
    },
     confirm_password : {
     	  required: true,
         //minlength : 8,
         noSpace: true,
         equalTo : "#password"
     },
    agree_terms :{
    	required: true,
    }

  },
  messages: {
        email: {
            regex: "Please enter your email TLD(top-level domains) like .com, .in and .net etc.",
          }
      }
});




/********************************/

    /* SIGNUP: Role Type & User Type Validation */

 /********************************/

 $(".role_type").change(function(){
 	var role_type = $(".role_type").val();

 	if(role_type=='U'){
	 	$("#user_type").rules('add', {
	   		 required: true,
	 	});
	}else{
		$("#user_type").rules('remove');
	}
 });





/****************************************************/

    /* CREATE PROFILE: preview image before upload */

/***************************************************/
$("#image-holder").click(function(){
  $("#fileUpload").trigger('click');
});
	$("#fileUpload").on('change', function () {

        if (typeof (FileReader) != "undefined") {

            var image_holder = $("#image-holder");
            image_holder.empty();

            var reader = new FileReader();
            reader.onload = function (e) {
                $("<img />", {
                    "src": e.target.result,
                    "class": "thumb-image",
                    "name": "profile_image"
                }).appendTo(image_holder);

            }
            image_holder.show();
            reader.readAsDataURL($(this)[0].files[0]);
        } else {
            alert("This browser does not support FileReader.");
        }
    });

    // image_upload

    $(document).on('change', '.image_upload', function() {
        //alert("image_upload");
       var id =  $(this).data("id");
       console.log("id",id);
        var file = this.files[0];
        console.log(file);
        if (file){
          let reader = new FileReader();
          reader.onload = function(event){
            console.log(event.target.result);

            $('#imgPreview_'+id).attr('src', event.target.result);
          }
          reader.readAsDataURL(file);
        }
      });


  $("#imgUpload").on('change', function () {
        var file = this.files[0];
        console.log(file);
        if (file){
          let reader = new FileReader();
          reader.onload = function(event){
            console.log(event.target.result);
            $('.imgPreview').attr('src', event.target.result);
          }
          reader.readAsDataURL(file);
        }
      });
      $('body').on('change', '.imgUpload1', function () {

       // alert('sdfghs');
    //   $(".imgUpload1").on('change', function () {
        var file = this.files[0];
        $this = $(this);
        console.log(file.type);
        if(file.type === 'application/pdf'){
            $this.parent().find('.imgPreview1').attr('src', app_url+'/public/images/pdf.jpg');
            return false;
        }
        if (file){
          let reader = new FileReader();
          reader.onload = function(event){
            console.log(event.target.result);
            $this.parent().css('border','2px solid')
            $this.parent().find('.imgPreview1').attr('src', event.target.result);

          }
          reader.readAsDataURL(file);
        }
      });





	/****************************************************/

    /* CREATE PROFILE: Form Validation */

/***************************************************/
$("#createProfileForm").validate({
  rules: {
    first_name: {
      required: true,
      noSpace: true,
      minlength:3,
      maxlength:15,
    },
    profile_image:{
        required: true,
    },
    last_name: {
      required: true,
      noSpace: true,
      minlength:3,
      maxlength:15,
    },
    address: {
      required: true,
      noSpace: true,
    },
    contact_no : {
      required: true,
      minlength : 7,
      maxlength : 14,
      noSpace: true,
      number: true

    },
    postal_code : {
    	required: true,
      maxlength : 8,
      noSpace: true
    },
    city : {
    	required: true,
        noSpace: true,
    },
    country : {
      required: true,
      noSpace: true,
    },
    state : {
      required: true,
      noSpace: true,
    }

  }
});


	/****************************************************/

    /* PROGRAMDETAIL REVIW AND RATING: Form Validation */

/***************************************************/
$("#frm").validate({
    rules: {
      title: {
        required: true,
        noSpace: true,
        maxlength:50,
      },
      description : {
        required: true,
        noSpace: true,
        maxlength:500,
      }

    }
  });




/****************************************************/

    /*  UPDATE PROFILE: Preview Image  */

/***************************************************/
function profileurl(input) {
  var filePath = input.value;
  var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;

  if (!allowedExtensions.exec(filePath)) {

    $('.select_profile_errors').text('Only JPEG and PNG format images are acceptable.');
    input.value = '';
    return false;
  } else {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('.profile_picture').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
      $('.select_profile_errors').text('');
    }
  }
}



/****************************************************/

    /* UPDATE PROFILE: Form Validation */

/***************************************************/
$("#updateAccountForm").validate({
  rules: {
    first_name: {
      required: true,
      noSpace: true,
      maxlength:15,
    },
    last_name: {
      required: true,
      noSpace: true,
      maxlength:15,
    },
    email: {
      required: true,
      email: true,
      noSpace: true,

    },
    address: {
      required: true,
      noSpace: true,
      maxlength:100,
    },
    contact_no : {
      required: true,
      minlength:7,
      maxlength:14,
      noSpace: true,
      number: true
    },
    postal_code : {
      required: true,
      maxlength :8,
      noSpace: true,
    },
    country : {
      required: true,
      noSpace: true,
    },
    state_id : {
      required: true,
      noSpace: true,
    },
    city :{
        required: true,
        noSpace: true,
        maxlength:50,
    }
  }
});




/****************************************************/

    /*  Change Password */

/***************************************************/
$("#changePasswordForm").validate({
 rules : {
      old_password : {
        required : true,
        noSpace: true,
        minlength : 3,
        maxlength : 15,

      },
      new_password : {
        required : true,
        minlength : 3,
        maxlength : 15,
        noSpace: true,
      },
      confirm_password : {
        required : true,
        minlength : 3,
        maxlength : 15,
        noSpace: true,
        equalTo : '#new_password'
      }
    },
    messages : {
      old_password: "Enter your Current Password.",
      new_password: "Enter your New Password.",
      confirm_password: {
        required: "Enter your Confirm Password.",
        equalTo: "Confirm Password does not match with New Password."
      }
    }
});


/****************************************************/

    /*  autocomplete lat long  */

/***************************************************/
var address_1 = document.getElementById('address');

        var autocomplete_address_1 = new google.maps.places.Autocomplete(address_1);
        // alert(autocomplete_address_1);
        autocomplete_address_1.setComponentRestrictions({'country': ['nl']});
        google.maps.event.addListener(autocomplete_address_1, 'place_changed', function () {

            var address_1 = autocomplete_address_1.getPlace();

            document.getElementById('address_lat').value  = address_1.geometry.location.lat();
            document.getElementById('address_long').value = address_1.geometry.location.lng();

            var address_components = address_1.address_components;

            // console.log(address_components);

            $('#place_id').val(address_1.place_id);

            $.each(address_components, function(index, component){
              var types = component.types;
              $.each(types, function(index, type){
                if(type == 'locality') {
                  city = component.long_name;
                  $('#get-city').val(city);
                }

                if(type == 'postal_code'){
                  $('#postal_code').val(component.short_name);
                }
              });
            });
        })

/****************************************************/

    /* CoachDeatilForm: Form Validation */

/***************************************************/

$.validator.addMethod("needsSelection", function (value, element) {
    //console.log("okkk");
    var count = $(element).find('option:selected').length;
    return count > 0;
    // return $(element).multiselect("getChecked").length > 0;
});


$.validator.messages.needsSelection = 'This field is required';

$("#coachDetailForm").validate({
    ignore: ':hidden:not("#categories"):not("#personality_and_training"):not("#languages")',
  rules: {
    image_file: {
      required: true,
    },
    city: {
      required: true,
      noSpace: true,
      maxlength:100,
    },
    price_range: {
      required: true,
     //digitsnumber: true,
    },
    gender: {
      required: true,
    },
    title: {
      required: true,
      noSpace: true,
      maxlength:125,
    },
    bio: {
      required: true,
      noSpace: true,
      maxlength:300,
    },
    'categories[]': {
        needsSelection:true
    },
    'personality_and_training[]': {
        needsSelection: true,
    },
   'languages[]': {
    needsSelection: true,
          },
    education_title_1: {
        required: true,
        noSpace: true,
        maxlength:50,
      },
      completion_year_1: {
        required: true,
        noSpace: true,
      },
      institute_1: {
        required: true,
        noSpace: true,
        maxlength:300,
      },
      star_1:{
        required: true,
      },
      result_title_1: {
        required: true,
        noSpace: true,
        maxlength:50,
      },
      result_description_1: {
        required: true,
        noSpace: true,
        maxlength:500,
      },
      result_image_file_1:{
        required: true,
      },
      completion_year: {
        required: true,
        noSpace: true,
      },
      twitter_url:{
        noSpace: true,
        url: true,
        maxlength:60,
      },
      facebook_url:{
        noSpace: true,
        url: true,
        maxlength:60,
      },
      instagram_url:{
        noSpace: true,
        url: true,
        maxlength:60,
      },
      youtube_url:{
        noSpace: true,
        url: true,
        maxlength:60,
      },
      pinterest_url:{
        noSpace: true,
        url: true,
        maxlength:60,
      }
  },
  errorPlacement: function(error, element) {
    if (element.parent('.form-select').length) {
      error.insertAfter(element.parent());
    } else {
      error.insertAfter(element); // ng-multiple-bs-select
    }
  },
  messages: {
    image_file: {
      accept: "Please select a valid image file",
    },
    result_image_file_1:{
        accept: "Please select a valid image file",
    },
    }
});


  $('#editCoachDetailForm').validate({
      rules:{
          image: {
              //required: true,
              extension: "jpg|jpeg|png|ico|bmp"
          },
          city: {
              required: true,
              noSpace: true,
          },
          timezone: {
              required: true
          },
          price_range: {
              required: true
          },
          gender: {
              required: true
          },
          title: {
            required: true,
            noSpace: true,
            maxlength:125,
          },
          bio: {
            required: true,
            noSpace: true,
            maxlength:300,
          },
          categories: {
              required: true
          },
          personality_and_training: {
              required: true
          },
          languages: {
              required: true
          },
          edu_title: {
              required: true,
              noSpace: true,
          },
          completion_year: {
              required: true
          },
          education_institute: {
              required: true,
              noSpace: true,
          },
          result_title: {
              required: true,
              noSpace: true,
          },
          result_star: {
              required: true,
            noSpace: true,
          },
          result_description: {
              required: true,
              noSpace: true,
          },
          twitter_url:{
            noSpace: true,
            url: true,
          },
          facebook_url:{
            noSpace: true,
            url: true,
          },
          instagram_url:{
            noSpace: true,
            url: true,
          },
          youtube_url:{
            noSpace: true,
            url: true
          },
          pinterest_url:{
            noSpace: true,
            url: true,
          },
      },
  });

  /****************************************************/

    /* add-coach-education */

/***************************************************/
$(".add-coach-education").validate({
    rules: {
        title: {
            required: true,
            noSpace: true,
            maxlength:50,
      },
      completion_year:{
        required: true,
        noSpace: true,
      },
      institute:{
        required: true,
        noSpace: true,
        maxlength:125,
      }

    }

  });

   /****************************************************/

    /* add- coach-result */
/***************************************************/
$(".add-coach-result").validate({
    rules: {
        image_file: {
            required: true,
      },
      title:{
        required: true,
        noSpace: true,
        maxlength:50,
      },
      star:{
        required: true,
      },
      description:{
        required: true,
        noSpace: true,
        maxlength:125,
      },
      messages: {
        image_file: {
          accept: "Please select a valid image file",
        },
    }

    }
  });


/****************************************************/

    /* Multi select Dropdown */

/***************************************************/

  $('.multiSelectDropDown').multiselect({
    nonSelectedText: '--Select--',
    numberDisplayed: 5,
    includeSelectAllOption: false,
    dropRight: true,
    //enableFiltering: true //for search input
  });

// $.validator.addMethod('filesize', function(value, element, param) {
//     return this.optional(element) || (element.files[0].size <= param)
//   }, 'File size must be less than {0} bytes');

$('#categories').change(function(){
    $(this).valid();
})
$('#personality_and_training').change(function(){
    $(this).valid();
})
$('#languages').change(function(){
    $(this).valid();
})

$("#coachProgramForm").validate({
    ignore: ':hidden:not("#categories")',
    rules: {
    image_file: {
    required: true,
    // accept: "jpg|jpeg|png|ico|bmp",
    // extension: "jpg,jpeg,png",
    //     filesize: 1048576 // <- 5 MB
        },
        'categories[]': {
            needsSelection:true
        },
      program_name: {
        required: true,
        maxlength:50,
        noSpace: true,
      },

      description: {
        required: true,
        noSpace: true,
        maxlength:500,

      },
      short_description: {
        required: true,
        noSpace: true,
        maxlength:500,
      },
      price: {
        required: true,
        noSpace: true,
        minlength:1,
        maxlength:7,
        number:true,
      },
      stock : {
        required: true,
        noSpace: true,
      },
      tax_class: {
        required: true,
      },
      result_title_1: {
        required: true,
        noSpace: true,
        maxlength:50,
      },
      star_1:{
        required: true,
      },
      result_description_1: {
        required: true,
        noSpace: true,
        maxlength:500,
      },
      result_image_file_1:{
        required: true,
      },
      education_title_1:{
        noSpace: true,
        maxlength:50,
        required: true,
      },
      education_image_file_1:{
        required: true,
      },

      inside_title_1:{
        noSpace: true,
        maxlength:50,
        required: true,
      },
      inside_description_1:{
        noSpace: true,
        required: true,
        maxlength:300,
      }
    },
      messages: {
        image_file: {
          accept: "Please select a valid image file",
        },
        education_image_file_1:{
            accept: "Please select a valid Pdf",
        },
        result_image_file_1:{
            accept: "Please select a valid image file",
        },


    }
  });



  $("#coachProgramFormEdit").validate({

    rules: {

      program_name: {
        required: true,
        maxlength:50,
        noSpace: true,
      },

      description: {
        required: true,
        noSpace: true,

      },
      short_description: {
        required: true,
        noSpace: true,
        maxlength:500,
      },
      price: {
        required: true,
        noSpace: true,
        minlength:1,
        maxlength:7,
        number:true,
      },
      stock : {
        required: true,
        noSpace: true,
      },
      tax_class: {
        required: true,
      },
      result_title_1: {
        required: true,
        noSpace: true,
        maxlength:25,
      },
      result_description_1: {
        required: true,
        noSpace: true,
        maxlength:300,
      },
      education_title_1:{
        noSpace: true,
        required: true,
        maxlength:50,
      },
      inside_title_1:{
        noSpace: true,
        maxlength:50,
      },
      inside_description_1:{
        noSpace: true,
        maxlength:300,
      }
    },

  });

  $(".add-program-result").validate({
    rules: {

         image_file : {
        required: true,
       },
       title: {
        required: true,
        maxlength:50,
        noSpace: true,
      },

      star: {
        required: true,
      },
      description: {
        required: true,
        noSpace: true,
        maxlength:500,
      }
    },
    messages: {
        image_file: {
          accept: "Please select a valid image file",
        },
    }
  });

  $(".add-program-inside").validate({
    rules: {
       title: {
        required: true,
        maxlength:50,
        noSpace: true,
      },
      description: {
        required: true,
        noSpace: true,
        maxlength:500,
      }
    },
  });
  $(".add-program-file").validate({
    rules: {
        image_file: {
        required: true,
      },
      title: {
        required: true,
        noSpace: true,
        maxlength:50,
      }
    },
    messages: {
        image_file:{
            accept: "Please select a valid Pdf",
        },
    }
  });


/****************************************************/

    /* coach Verification Form */

/***************************************************/
$("#coachVerificationForm").validate({
    rules: {
    qualified_fitness_coach: {
        required: true,
        noSpace: true,
      },
      qualifications: {
        required: true,
        noSpace: true,
      },
      country: {
        required: true,
        noSpace: true,
      },
      currently_insured: {
        required: true,
        noSpace: true,
      },
      insured_with: {
        required: true,
        noSpace: true,
      },
      insurance_type: {
        required: true,
        noSpace: true,
      },
      insurance_expire_date: {
        required: true,
        noSpace: true,
      },
      agree_as_a_coach: {
        required: true,
        noSpace: true,
      }
     }
  });
  /****************************************************/

    /* Billing Address Form */

/***************************************************/
$("#billing").validate({
    rules: {
        company_name: {
        required: true,
        noSpace: true,
      },
      address: {
        required: true,
        noSpace: true,
      },
      country: {
        required: true,
        noSpace: true,
      },
      state: {
        required: true,
        noSpace: true,
      },
      city: {
        required: true,
        noSpace: true,
      },
      postal_code: {
        required: true,
        noSpace: true,
      }
     }
  });
    /****************************************************/

    /* Billing Address Form */

/***************************************************/
$("#billing").validate({
    rules: {
        company_name: {
        required: true,
        noSpace: true,
      },
      address: {
        required: true,
        noSpace: true,
      },
      country: {
        required: true,
        noSpace: true,
      },
      state: {
        required: true,
        noSpace: true,
      },
      city: {
        required: true,
        noSpace: true,
      },
      postal_code: {
        required: true,
        noSpace: true,
      }
     }
  });


  /****************************************************/

    /* Billing Address Form */

/***************************************************/
$("#billing").validate({
    rules: {
        company_name: {
        required: true,
        noSpace: true,
      },
      address: {
        required: true,
        noSpace: true,
      },
      country: {
        required: true,
        noSpace: true,
      },
      state: {
        required: true,
        noSpace: true,
      },
      city: {
        required: true,
        noSpace: true,
      },
      postal_code: {
        required: true,
        noSpace: true,
      }
     }
  });

 /****************************************************/

    /* Edit Billing Address Form */

/***************************************************/
$("#updatebilling").validate({
    rules: {
        company_name: {
        required: true,
        noSpace: true,
      },
      address: {
        required: true,
        noSpace: true,
      },
      country: {
        required: true,
        noSpace: true,
      },
      state: {
        required: true,
        noSpace: true,
      },
      city: {
        required: true,
        noSpace: true,
      },
      postal_code: {
        required: true,
        noSpace: true,
      }
     }
  });



$("#updatebilling").validate({
    rules: {
        company_name: {
        required: true,
        noSpace: true,
      },
      address: {
        required: true,
        noSpace: true,
      },
      country: {
        required: true,
        noSpace: true,
      },
      state: {
        required: true,
        noSpace: true,
      },
      city: {
        required: true,
        noSpace: true,
      },
      postal_code: {
        required: true,
        noSpace: true,
      }
     }
  });















