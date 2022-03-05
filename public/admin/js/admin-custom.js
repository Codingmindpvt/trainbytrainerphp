 /********************************/

    /* No Space Validation */

 /********************************/
  jQuery.validator.addMethod("noSpace", function(value, element) {
    return value == '' || value.trim().length != 0;
  }, "No space please and don't leave it empty");


 /********************************/

    /* only Number Or Decimal both Validation */

 /********************************/

jQuery.validator.addMethod("onlyNumberOrDecimal", function(value, element) {
    return this.optional(element) || /^(?:\d+|\d{1,3}(?:,\d{3})+)(?:\.\d+)?$/.test(value);
}, "Enter numeric or decimal value only!");





/****************************************************/

    /* CREATE PROFILE: Form Validation */

/***************************************************/

$("#editProfileForm").validate({
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
      email:{
        required: true,
        noSpace: true,
        email: true
      },
      address: {
        required: true,
        noSpace: true,
      },
      contact_no : {
        required: true,
        minlength : 8,
        noSpace: true,

      },
      postal_code : {
        required: true,
        minlength : 3,
        maxlength : 6,
        noSpace: true
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

      //   $(".imgUpload1").on('change', function () {
          var file = this.files[0];
          $this = $(this);
          console.log(file);
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

    /*  Change Password */

/***************************************************/
$("#changePasswordForm").validate({
 rules : {
      old_password : {
        required : true,
        minlength : 8,
        noSpace: true,
      },
      new_password : {
        required : true,
        minlength : 8,
        noSpace: true,
      },
      confirm_password : {
        required : true,
        minlength : 8,
        noSpace: true,
        equalTo : '#new_password'
      }
    },
    messages : {
      old_password: "Enter your Old Password.",
      new_password: "Enter your New Password.",
      confirm_password: {
        required: "Enter your Confirm Password.",
        equalTo: "Confirm Password does not match with New Password."
      }
    }
});

$("#reseremailPasswordForm").validate({
  rules : {
         password : {
         required : true,
         minlength : 8,
         noSpace: true,
       },
       password_confirm : {
         required : true,
         minlength : 8,
         noSpace: true,
         equalTo : '#new_password'
       }
     },
     messages : {
      password: "Enter your Password.",
     
      password_confirm: {
         required: "Enter your Confirm Password.",
         equalTo: "Confirm Password does not match with New Password."
       }
     }
 });



/****************************************************/

    /* EDIT USER: Form Validation */

/***************************************************/

$("#editUserForm").validate({
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
      address: {
        required: true,
        noSpace: true,
      },
      postal_code : {
        required: true,
        minlength : 3,
        maxlength : 6,
        noSpace: true,
      },
      city_id : {
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

    /* PAGE FORM: Form Validation */

/***************************************************/

$("#pageForm").validate({
    rules: {
      title: {
        required: true,
        noSpace: true,
        maxlength:50,
      },
      description: {
        required: true,
        noSpace: true
      },
      type:{
        required: true,
        noSpace: true,
      },
      status: {
        required: true,
        noSpace: true,
      }

    }
  });




/****************************************************/

    /* CATEGORY FORM: Form Validation */

/***************************************************/

$("#categoryForm").validate({
    rules: {
      title: {
        required: true,
        noSpace: true,
        maxlength:20,
      },
      description: {
        required: true,
        noSpace: true
      },
      status: {
        required: true,
        noSpace: true,
      }

    }
  });


/****************************************************/

    /* BLOG FORM: Form Validation */

/***************************************************/

$("#blogForm").validate({
    rules: {
      title: {
        required: true,
        noSpace: true,
        maxlength:20,
      },
      description: {
        required: true,
        noSpace: true
      },
      status: {
        required: true,
        noSpace: true,
      },
      category: {
        required: true,
      }

    }
  });



/****************************************************/

    /* ADMIN COMMISSION FORM: Form Validation */

/***************************************************/

$("#commissionForm").validate({
    rules: {
      commission_percent: {
        required: true,
        noSpace: true,
        min: 1,
        onlyNumberOrDecimal:true,
      }
    }
  });




/****************************************************/

    /* TEXT EDITOR: ON DESCRIPTION */

/***************************************************/
  tinymce.init({
    selector: "#description",
     height: 500,
           menubar: true,
           plugins: [
             'advlist autolink lists link image charmap print preview anchor',
             'searchreplace visualblocks code fullscreen',
             'insertdatetime media table paste code help wordcount'
           ],
             toolbar: 'undo redo | formatselect | ' +
             ' bold italic backcolor | alignleft aligncenter ' +
             ' alignright alignjustify | bullist numlist outdent indent |' +
             ' removeformat | help'
  });

