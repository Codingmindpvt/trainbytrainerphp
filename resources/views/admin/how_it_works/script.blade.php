<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
       //alert('dfdf');
       if($('#Form').length >0){
           $('#Form').validate({
            rules:{
                type_id:{
                    required:true
                },
                title:{
                    required:true,
                    minlength: 3,
                    maxlength: 20,
                },
                description:{
                    required:true,
                    minlength: 10,
                    maxlength: 50,
                },
                image_file:{
                    required:true,
                    accept: "jpg,png,jpeg",
                },
            },
            messages:{
                type_id:{
                    required:"Please Select type"
                },
                title:{
                    required:"Please Enter title",
                    minlength:"Please Enter it least 3 characters",
                    maxlength:"Your title maxlength should be 20 characters long."
                },
                description:{
                    required:"Please Enter description",
                    minlength:"Please Enter it least 10 characters",
                    maxlength:"Your title maxlength should be 50 characters long."
                },
                image_file: {
                    required: "Please Select image_file",
                    accept: "Only image type jpg/png/jpeg/ is allowed"
                },
            }
           });
       }
       if($('#Form_validation').length >0){
           $('#Form_validation').validate({
            rules:{
                type_id:{
                    required:true
                },
                title:{
                    required:true,
                    minlength: 3,
                    maxlength: 20,
                },
                description:{
                    required:true,
                    minlength: 10,
                    maxlength: 50,
                },
                image_file:{
                    accept: "jpg,png,jpeg",
                },
            },
            messages:{
                type_id:{
                    required:"Please Select type"
                },
                title:{
                    required:"Please Enter title",
                    minlength:"Please Enter it least 3 characters",
                    maxlength:"Your title maxlength should be 20 characters long."
                },
                description:{
                    required:"Please Enter description",
                    minlength:"Please Enter it least 10 characters",
                    maxlength:"Your title maxlength should be 50 characters long."
                },
                image_file: {
                    accept: "Only image type jpg/png/jpeg/ is allowed"
                },
            }
           });
       }
    });

</script>