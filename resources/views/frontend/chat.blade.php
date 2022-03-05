@extends('layouts.guest')

@section('content')
<section class="mainsection chat_section py-4">
<div class="container chat_app">
@if(!empty($has_one_message) || (!empty(request()->route('id'))) )
  <div class="row app-one">
    <div class="col-lg-4 col-md-12 side">
      <div class="side-one">
        <div class="row heading">
            <div class="col-4">
                <h2>MESSAGE</h2>
            </div>
            <div class="form-group has-feedback mb-0 offset-1 col-7">
              <input id="myInput" type="text" class="form-control" name="searchText" placeholder="Search">
            </div>
        </div>
        <div class="sideBar">

         <input type="hidden" id="view_blade_chat_id" name="view_chat_id" value="{{request()->route('id')}}" >

         @foreach($users as $user )
          @if(!empty($user->last_message))
          <div  class="list active_user_{{$user->id}}" id="list" user_id="{{$user->id}}" onclick="doWithThisElement({{$user->id}},this)">
              <div class="sideBar-body">
                  <div class="avatar-icon">
                    @if($user->profile_image != "")
                      <img src="{{asset('public/'.$user->profile_image)}}">
                    @else
                      <img src="{{asset('public/images/default-image.png')}}">
                    @endif
                  </div>
                  <div class="chat-person">
                    <h4 class="name-meta">{{$user->first_name}} {{$user->last_name}}</h4>
                    @if($user->type == "T")
                    <p class='last_message_{{$user->id}}' style="width:132px;">{{$user->last_message}} </p>
                    @elseif($user->type == "I")
                    <p class='last_message_{{$user->id}}'><i class="fa fa-image"></i> Image</p>
                    @elseif($user->type == "D")
                    <p class='last_message_{{$user->id}}'><i class="fa fa-file-pdf-o"></i> Pdf</p>
                    @else
                    <p></p>
                    @endif
                  </div>
                  <span class="time-meta pull-right msg_current_time_{{$user->id}}">{{$user->time }}

                  </span>
              </div>
           </div>
           @endif
              @endforeach
        </div>

    </div>

   </div>



    <div class="col-lg-8 col-md-12 conversation">

      <div class="message" id="conversation">
        <div class="chat-person-name">
          <!-- <img src="public/images/chat2.png" alt="image">
          <h3>Maria Roy</h3>
          <div class="dropdown clear-chat">
           <i class="fa fa-ellipsis-v" type="button" data-toggle="dropdown"></i>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">Clear Chat</a>
            </div>
          </div> -->
        </div>
          <!-- <div class="message_header1 py-3 px-4">
            <div class="sideBar-name p-0">
              <div class="chatuser_details">
                <h4>Maria</h4>
                <div class="chat-area-box">
                  <span class="mb-0 text-secondary" style="font-size: 15px;">Hi, i am josephin. How are you..</span>
                  <p class="message-time">
                    11:00 PM
                  </p>
                </div>
              </div>
            </div>
         </div> -->

         <input type='hidden' name='user_id' id='user_id' value="qqq" >

        <div class="chat_outer current_user_div " style="display:none">

        </div>

      </div>
      <div class="row reply">
        <div class="col-sm-12 col-xs-12 reply-main px-0">
          <textarea class="form-control" rows="1" id="message" placeholder="Type a message"></textarea>
          <img src="{{asset('public/images/add-more.png')}}" width="30" class="add-image-box">
          <form name="photo" id="imageUploadForm" enctype="multipart/form-data" action="{{route('upload_chat_doc')}}" method="post">
          <input type="file" name="document" accept=".png, .jpg, .jpeg, .pdf"
          class="send_doc" id="fileUpload">
          @csrf
          <input type="submit" name="upload"  value="" />
        </form>

         <button class="send-msg " id='send'></button>
        </div>
      </div>

    </div>
  </div>
  @else
<a  href="{{route('coaches')}}" ><h1 style="padding-top: 226px; padding-top: 223px; padding-bottom: 384px; padding-left: 233px;">Hi !! click here to start the chat with coach.</h1></a>
@endif
</div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ env('SOCKET_URL')}}/socket.io/socket.io.js"></script>
<script>
var input = document.getElementById("message");
input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
   event.preventDefault();
   document.getElementById("send").click();
  }
});
</script>


<script>

    $(document).ready(function (e) {
    $('#imageUploadForm').on('submit',(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        var file_name = $('#fileUpload').val();

  // check file extention
  let fileName, fileExtension;
  fileName = file_name;

  fileExtension = fileName.split('.').pop();

  ///////////

  $.ajax({
    type:'POST',
    url: $(this).attr('action'),
    data:formData,
    cache:false,
    contentType: false,
    processData: false,
    success:function(data){
      var socket = io.connect("{{ env('SOCKET_URL')}}");
      // alert(fileExtension);
      if(fileExtension == "png"||fileExtension =="jpeg"||fileExtension =="jpg"){
        var message_type = 'I';
       }else if(fileExtension == "pdf"){
        var message_type = 'D';
       }else{
        var message_type = 'O';
       }
       if(message_type == 'O'){
         alert("Invalid file format ");
         return false;
       }

      if(data.status){
        e.preventDefault();
                var message = data.url ?? '';
                var reciever_id = parseInt($('#user_id').val());
                var sender_id = '{{auth()->user()->id}}';
                // var message = "hello this is my message!!!";

                var data = {
                    sender_id: parseInt(sender_id),
                    message: message,
                    message_type: message_type,
                    receiver_id:  parseInt(reciever_id),
                    type: 'admin'
                  };


                console.log(socket);
                $('#message').val('');
                socket.emit('message', data);

               }
            },
            error: function(data){
                console.log("error");
                console.log(data);
            }
        });

    }));


    $("#fileUpload").on("change", function() {

        $("#imageUploadForm").submit();
    });
});

   $(document).ready(function(){
   $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".list").filter(function() {
      $(this).toggle($(this).find('.name-meta').text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
 <script>

function doWithThisElement(sidebar_user_id, active) {

  $('.list').removeClass("active-chat");//remove active class
if(active){
  $(active).addClass("active-chat");// add active class
}else{
  $('.active_user_'+sidebar_user_id).click();
}
  // alert("User: " + sidebar_user_id);
  var sidebar_user = sidebar_user_id;
  current_user =sidebar_user_id;
  $('#user_id').val(sidebar_user_id)
  const user_id = "{{auth()->user()->id}}";
  $.ajax({
        url: "{{route('chat_data')}}",
        type: 'GET',
        data: {'sidebar_user_id':sidebar_user},
        dataType: 'json', // added data type

        success: function(response) {
            // console.log(response);
            $('.current_user_div').html('')
            user_name= response.data1.first_name
            last_name= response.data1.last_name
            reload = 0 ;
           if(!response.data[0]){
            // console.log(response);
            reload = 1 ;


           }
            // alert(user_name);

            var html = '';
            if(response.data1.profile_image){
              html ='<img src="'+ app_url +'/public/'+response.data1.profile_image+'" alt=""><h3>'+response.data1.first_name+' '+response.data1.last_name+'</h3>'
              }
              else{
                html ='<img src="'+ app_url +'/public/images/default-image.png" alt=""><h3>'+response.data1.first_name+' '+response.data1.last_name+'</h3>'
              }
              $(".chat-person-name").show().html(html);


              $.each(response.data, function (key, data) {

              // console.log(data);

         if (user_id == data.sender_id) {
            $('.current_user_div').show()
            var html = '';
            if (data.type == 'T') {
                html =
                    '<div class="message-main-sender"><div class="sender"><div class="message-name">You</div><div class="mesage_text current_user_message">' +data.message + '</div><span class="message-time">' + data.created_at +'</span></div> </div>'

            } else {
              if(data.type == 'I'){
                html =
                    '<div class="message-main-sender"><div class="sender"><div class="message-name">You</div><div class="current_user_message"><div><a href="' +data.message + '" target="_blank"><img src="' +data.message + '" width=100px; height=100px;></a></div></div><span class="message-time">' + data.created_at +'</span></div> </div>'
              }else{
                html =
                    '<div class="message-main-sender"><div class="sender"><div class="message-name">You</div><div class="current_user_message"><div><a href="' +data.message + '" target="_blank"><img src="'+ app_url +'/public/chat_doc/pdf.png" width=100px; height=100px;></a></div></div><span class="message-time">' + data.created_at +'</span></div> </div>'

              }
            }


        } else {
            var html = '';
            if (data.type == 'T') {
                html =
                    '<div class="message_header1 py-3 px-4"><div class="sideBar-name p-0"><div class="chatuser_details"><h4>'+response.data1.first_name+'</h4><div class="chat-area-box"><span class="mb-0 text-secondary" style="font-size: 15px;">' + data.message +'</span><p class="message-time"> ' + data.created_at + ' </p> </div></div></div></div>'

            } else {
              if(data.type == 'I'){
                html =
                    '<div class="message_header1 py-3 px-4"><div class="sideBar-njame p-0"><div class="chatuser_details"><h4>'+response.data1.first_name+'</h4><div class="chat-area-box-for-doc"><span class="mb-0 text-secondary" style="font-size: 15px;"><div><div><a href="' +data.message + '" target="_blank"><img src="' +data.message + '" width=100px; height=100px;></a></div></span><p class="message-time"> ' + data.created_at + ' </p> </div></div></div></div>'
              }else{
                html =
                    '<div class="message_header1 py-3 px-4"><div class="sideBar-njame p-0"><div class="chatuser_details"><h4>'+response.data1.first_name+'</h4><div class="chat-area-box-for-doc"><span class="mb-0 text-secondary" style="font-size: 15px;"><div><a href="' +data.message + '" target="_blank"><img src="'+ app_url +'/public/chat_doc/pdf.png" width=100px; height=100px;></a></div></span><p class="message-time"> ' + data.created_at + ' </p> </div></div></div></div>'

              }
            }
        }
        // console.log(html);
        $(".current_user_div").show().append(html);
        $('.current_user_div').scrollTop($('.current_user_div')[0].scrollHeight);

        })
        }
    });

    // $('.current_user_div').scrollTop($('.current_user_div')[0].scrollHeight);
    // $("current_user_div").animate({
    //                 scrollTop: $(
    //                   'current_user_div').get(0).scrollHeight
    //             });
}

$(document).ready(function(){


 var socket = io.connect("{{ env('SOCKET_URL')}}");

  socket.on('message', function(data) {
    if(reload == 1){
          location.reload();
        }

// alert('ok');
    // console.log(data);
    const user_id = "{{auth()->user()->id}}";
    
    if((data.message === '')|| (data.message === '\n')){
      return false;
    }
    if (user_id == data.sender_id) {
      $('.current_user_div').show()
      var html = '';
      if (data.message_type == 'T') {
        html =
        '<div class="message-main-sender"><div class="sender"><div class="message-name">You</div><div class="mesage_text current_user_message">' +data.message + '</div><span class="message-time">' +data.message_time +'</span></div> </div>'
      } else {
        if(data.message_type == 'I'){
          html =
          '<div class="message-main-sender"><div class="sender"><div class="message-name">You</div><div class="current_user_message"><div><a href="' +data.message + '" target="_blank"><img src="' +data.message + '" width=100px; height=100px;></a></div></div><span class="message-time">' + data.message_time +'</span></div> </div>'
        }else{
          html =
          '<div class="message-main-sender"><div class="sender"><div class="message-name">You</div><div class="current_user_message"><div><a href="' +data.message + '" target="_blank"><img src="'+ app_url +'/public/chat_doc/pdf.png" width=100px; height=100px;></a></div></div><span class="message-time">' + data.message_time +'</span></div> </div>'

        }
      }
      var rec = data.receiver_id;


    } else {
      if ((user_id == data.receiver_id)) {
            var html = '';
            if (data.message_type == 'T') {
                html =
                    '<div class="message_header1 py-3 px-4"><div class="sideBar-name p-0"><div class="chatuser_details"><h4>'+user_name+'</h4><div class="chat-area-box"><span class="mb-0 text-secondary" style="font-size: 15px;">' + data.message +'</span><p class="message-time"> ' + data.message_time + ' </p> </div></div></div></div>'

            } else {


              if(data.message_type == 'I'){
                html =
                    '<div class="message_header1 py-3 px-4"><div class="sideBar-njame p-0"><div class="chatuser_details"><h4>'+user_name+'</h4><div class="chat-area-box-for-doc"><span class="mb-0 text-secondary" style="font-size: 15px;"><div><a href="' +data.message + '" target="_blank"><img src="' +data.message + '" width=100px; height=100px;></a></div></span><p class="message-time"> ' + data.message_time + ' </p> </div></div></div></div>'
              }else{
                html =
                    '<div class="message_header1 py-3 px-4"><div class="sideBar-njame p-0"><div class="chatuser_details"><h4>'+user_name+'</h4><div class="chat-area-box-for-doc"><span class="mb-0 text-secondary" style="font-size: 15px;"><div><a href="' +data.message + '" target="_blank"><img src="'+ app_url +'/public/chat_doc/pdf.png" width=100px; height=100px;></a></div></span><p class="message-time"> ' + data.message_time + ' </p> </div></div></div></div>'

              }
            }
          }
      }
      if (data.message_type == 'T') {
      $('.last_message_'+rec).html(data.message);
      }else if(data.message_type == 'I'){
        $('.last_message_'+rec).html('<i class="fa fa-image"></i> Image');
      }else{
        $('.last_message_'+rec).html('<i class="fa fa-file-pdf-o"></i> Pdf');
      }
      $('.msg_current_time_'+rec).html(data.message_time);
        $(".current_user_div").show().append(html);
     var clone_div = $('.last_message_'+rec).parent().parent().parent().clone();
     $('.last_message_'+rec).parent().parent().parent().remove();
      $('.sideBar').prepend(clone_div);

        $('.current_user_div').scrollTop($('.current_user_div')[0].scrollHeight);


        // $('#chat-board').html(response.message);
        //console.log(data);

        // $('.active_user_'+current_user).hltml('');
        // $('.active_user_'+rec).load(location.href + '.list');


        $.ajax({
        url: "{{route('user_list')}}",
        type: 'GET',
        dataType: 'json', // added data type

        success: function(response) {
            console.log(response);

        // $('.active_user_'+rec).load(location.href + '.list');
            // $('.sideBar').html(response);



        }
      });


      });


$(".send-msg").click(function(e) {
  // alert('ok');
  var length = $.trim($("#message").val()).length;
     if(length == 0)
     {
      return false;
     }

        e.preventDefault();
        var message = $('#message').val();
        var document = $('#document').val();
        var reciever_id = parseInt($('#user_id').val());
        var sender_id = '{{auth()->user()->id}}';
        var room_id = 1 + Math.floor(Math.random() * 10);
        // alert(room_id);
        // var message = "hello this is my message!!!";

        if(message === ''){
          return false;
        }

        var data = {
            sender_id:  parseInt(sender_id),
            message: message,
            document: document,
            message_type: 'T',
            receiver_id:  parseInt(reciever_id),
            type: 'admin',
            room_id: room_id
          };


        console.log(socket);
        $('#message').val('');
        if(message == '\n'){
          return false;
        }



        socket.emit('message', data);

    })
});
</script>
<script>
  $(document).ready(function(){
  var view_blade_id=$("#view_blade_chat_id").val();
  if(view_blade_id !== ""){
       doWithThisElement(view_blade_id);
  }else{
  window.onload = function() {
  $('.list').eq(0).click();
  }
}
  });
</script>
@endsection
