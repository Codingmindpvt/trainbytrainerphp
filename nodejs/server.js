var app = require('express')();
var http = require('http').createServer(app);
var io = require('socket.io')(http, { origins: '*:*'});
var request = require('request');
const dotenv = require('dotenv');
dotenv.config();
var api_url = '';
var port = process.env.API_PORT;
const date = require('date-and-time');

var mysql      = require('mysql');
var db = mysql.createConnection({
  host     : process.env.DB_HOST,
  user     : process.env.DB_USERNAME,
  password : process.env.DB_PASSWORD,
  database : process.env.DB_DATABASE
});

app.use( (req, res, next) => {
   res.header("Access-Control-Allow-Origin", "*");
   res.header("Access-Control-Allow-Credentials", "true");
   res.header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");
   next();
});

db.connect();

app.get('/', function(req, res){
    res.sendFile(__dirname + '/index.html');
});

io.on('connection', function(socket){
    console.log('a user connected');

    //Join room
    socket.on('joinroom', function (room_id) {
        // console.log('room_id = ' + room_id);
        socket.join(room_id);
    });


    //send message event
    
    socket.on('message', function(data){
        data.user_status = 1;
        // console.log('data = ', data);
        checkUserStatus(data,function(res) {
            const now = new Date(new Date().toLocaleString('en', { timeZone: 'Asia/Calcutta' }));
            data.message_time = date.format(now, 'YYYY-MM-DD HH:mm');
            data.id = "0";

            if(res.user_status == 1) {
                var created_at = data.message_time;
                var chatInsertQuery =  "INSERT INTO `chats` (`sender_id`, `receiver_id`, `message`, `media`, `thumbnail`, `type`, `is_read`, `is_deleted`, `created_at`, `updated_at`) VALUES ('"+data.sender_id+"', '"+data.receiver_id+"', "+db.escape(data.message)+", 'Null', 'Null', '"+data.message_type+"', 'N', 'N', '"+created_at+"', NULL)";
                //  var chatInsertQuery = "INSERT INTO `messages` (`sender_id`, `receiver_id`, `message_type`, `message`, `message_time`, `read_status`, `sender_status`, `receiver_status`, `thumbnail`) VALUES ('"+data.sender_id+"', '"+data.receiver_id+"', '"+data.message_type+"', "+db.escape(data.message)+", '"+created_at+"', '1', 'Y', 'Y', '"+data.thumbnail+"');";
                // console.log('query ==  ', chatInsertQuery);
               // var chatInsertQuery = "INSERT INTO `chats` (`sender_id`, 'receiver_id', `room_id`, `message`, `thumbnail`, `chat_type`, `created_at`) VALUES ('"+data.sender_id+"', '"+data.room_id+"', "+db.escape(data.message)+", '"+data.thumbnail+"', '"+data.chat_type+"', '"+created_at+"')";
                db.query(chatInsertQuery, function(err, result, fields) {
                if (err) throw err;
                    var messageId = result.insertId;
                    data.id = messageId.toString();
                    data.message_time = date.format(now, 'DD-MM-YYYY HH:mm');
                    io.sockets.emit('message',data);
                    // console.log("message sent", data);
                    var url = api_url + '/webservices/sendOneToOneNotification?sender_id='+data.sender_id+'&receiver_id='+data.receiver_id+'&message='+data.message;
                    request.get(url, function (error, response, body) {
                        //console.log('response=' + JSON.stringify(response));
                    });
                });
            } else {
                data.message_time = date.format(now, 'DD-MM-YYYY HH:mm');

                io.sockets.emit('message',data);
            }
        });
    });

    // socket.on('groupmessage', function(data){
    //     data.user_status = 1;
    //     console.log('data = ', data);
    //     checkGroupStatus(data,function(res) {
    //         const now = new Date();
    //         data.message_time = date.format(now, 'YYYY-MM-DD HH:mm:ss');
    //         data.group_msg_id = "0";
    //         if(res.user_status == 1) {
    //             var created_at = data.message_time;
    //             var chatInsertQuery = "INSERT INTO `group_messages` (`group_id`, `user_id`, `message`, `message_time`, `status`, `message_type`, `thumbnail`) VALUES ( '"+data.group_id+"', '"+data.user_id+"', "+db.escape(data.message)+",  '"+created_at+"', 'Y', '"+data.message_type+"', '"+data.thumbnail+"');";
    //             console.log('query ==  ', chatInsertQuery);
    //            // var chatInsertQuery = "INSERT INTO `chats` (`sender_id`, 'receiver_id', `room_id`, `message`, `thumbnail`, `chat_type`, `created_at`) VALUES ('"+data.sender_id+"', '"+data.room_id+"', "+db.escape(data.message)+", '"+data.thumbnail+"', '"+data.chat_type+"', '"+created_at+"')";
    //             db.query(chatInsertQuery, function(err, result, fields) {
    //             if (err) throw err;
    //                 var messageId = result.insertId;
    //                 data.group_msg_id = messageId.toString();
    //                 io.sockets.in(data.group_id).emit('groupmessage',data);
    //                 console.log("message sent", data);

    //                 var url = api_url + '/webservices/sendGroupMessageNotification?user_id='+data.user_id+'&group_id='+data.group_id+'&message='+data.message;

    //                 request.get(url, function (error, response, body) {
    //                     console.log('response=' + JSON.stringify(response));
    //                 });
    //             });
    //         } else {
    //             io.sockets.in(data.group_id).emit('message',data);
    //         }
    //     });
    // });

    // socket.on('deleteGroupMessages', function(data){
    //     var messageIds = data.messsage_ids;
    //     console.log('Group messageIds ==  ', messageIds);
    //     var deleteGroupMessageQuery = "DELETE FROM group_messages WHERE id IN ("+messageIds+")";

    //     db.query(deleteGroupMessageQuery, function(err, result, fields) {
    //         if (err) throw err;
    //         io.sockets.in(data.group_id).emit('deleteGroupMessages',data);
    //     });
    // });


    socket.on('deleteMessages', function(data){
        var messageIds = data.messsage_ids;
        console.log('Single messageIds ==  ', messageIds);
        var deleteGroupMessageQuery = "DELETE FROM chats WHERE id IN ("+messageIds+")";

        db.query(deleteGroupMessageQuery, function(err, result, fields) {
            if (err) throw err;
            io.sockets.in(data.room_id).emit('deleteMessages',data);
        });
    });


    // socket.on('startcalls', function(data){
    //     //console.log('begin  data == ');
    //     data.call_status = 1;
    //     checkCallStatus(data,function(res) {
    //         console.log("after call status function", res);

    //         var room_id = "";
    //         if(res.call_status == '1'){
    //             const now = new Date();
    //             var created_at = date.format(now, 'YYYY-MM-DD HH:mm:ss');
    //             var callQuery = "INSERT INTO `calls` (`room_id`, `caller_id`, `group_id`, `receiver_id`, `acceptcalls`, `calltype`, `created_at`) VALUES ( '"+data.room_id+"', '"+data.caller_id+"', '"+data.group_id+"', '"+data.receiver_id+"', '"+data.caller_id+"',  '"+data.calltype+"', '"+created_at+"');";

    //             var receiver_ids_str = data.receiver_id;
    //             var receiver_ids = receiver_ids_str.split(',');

    //             db.query(callQuery, function(err, result, fields) {
    //                 if (err) throw err;
    //                 for (receiver of receiver_ids) {
    //                     console.log(`Start call receiver is: `, receiver)
    //                     room_id = "VCR-" + receiver;
    //                     io.sockets.in(room_id).emit('getCalls',data);
    //                 }
    //             });
    //             room_id = "VCR-" + data.caller_id;
    //             io.sockets.in(room_id).emit('startcalls',data);

    //             var url = api_url + '/webservices/startCallNotification';

    //             request.post({url:url, form: data}, function (error, response, body) {
    //                 console.log('response=' + response);
    //                 //console.log('response=' + JSON.stringify(response));
    //             });
    //        } else {
    //             room_id = "VCR-" + data.caller_id;
    //             console.log("room_id ", room_id);
    //             io.sockets.in(room_id).emit('startcalls',data);
    //         }

    //     });
    // });

    // socket.on('endcall', function(data){
    //     data.call_status = 1;

    //     if(data.calltype=='S') {
    //         var getcallQuery = "SELECT * from `calls` WHERE `calls`.`room_id` = '"+data.room_id+"' AND calltype='S';";
    //         console.log(`endcall call query: `, getcallQuery);
    //         db.query(getcallQuery, function(err, result, fields) {
    //             if (err) throw err;

    //             if(typeof result[0] != 'undefined' && result[0]) {
    //                     var receiver_ids = result[0].receiver_id.split(',');
    //                     receiver_ids.push(result[0].caller_id);
    //                     receiver_ids = receiver_ids.filter((v, i, a) => a.indexOf(v) === i);

    //                     console.log("receiver", receiver_ids);

    //                     for (receiver of receiver_ids) {
    //                         console.log(`A receiver is: `, receiver);
    //                         room_id = "VCR-" + receiver;
    //                         io.sockets.in(room_id).emit('endcall',data);
    //                     }

    //                     var endcallQuery = "UPDATE `calls` SET `callstatus` = 'E' WHERE `calls`.`id` = '"+result[0].id+"';";
    //                     db.query(endcallQuery);
    //                 var url = api_url + '/webservices/endCallNotification';
    //                 request.post({url:url, form: data}, function (error, response, body) {
    //                     console.log('response=' + response);
    //                     console.log('error=' + error);
    //                     console.log('body=' + body);
    //                     //console.log('response=' + JSON.stringify(response));
    //                 });

    //             }
    //         });
    //     } else {

    //         var getcallQuery = "SELECT * from `calls` WHERE `calls`.`room_id` = '"+data.room_id+"' AND calltype='G';";
    //         console.log(`End call getcallQuery: `, getcallQuery);
    //         db.query(getcallQuery, function(err, result, fields) {
    //             if (err) throw err;
    //             if(typeof result[0] != 'undefined' && result[0]) {
    //                 /*if(result[0].caller_id == data.caller_id) {
    //                 }*/
    //                 var acceptcalls = result[0].acceptcalls;
    //                 if(acceptcalls != "" && acceptcalls != null) {
    //                     var acceptcalls = result[0].acceptcalls.split(',');
    //                     const index = acceptcalls.indexOf(data.caller_id);

    //                     if (index > -1) {
    //                         acceptcalls.splice(index, 1);
    //                     }

    //                     console.log(`acceptcalls: `, acceptcalls);
    //                     console.log(`acceptcalls.length: `, acceptcalls.length);
    //                     if(acceptcalls.length < 2) {
    //                         var endcallQuery = "UPDATE `calls` SET `callstatus` = 'E', acceptcalls='"+acceptcalls+"' WHERE `calls`.`id` = '"+result[0].id+"';";
    //                         db.query(endcallQuery);
    //                         var receiver_ids = result[0].receiver_id;
    //                         receiver_ids = receiver_ids.split(',');
    //                         receiver_ids.push(result[0].caller_id);
    //                         //console.log(receiver_ids);
    //                         for (receiver_id of receiver_ids) {
    //                             console.log(`Group receiver is: `, receiver_id);
    //                             room_id = "VCR-" + receiver_id;
    //                             io.sockets.in(room_id).emit('endcall',data);
    //                         }

    //                         //return false;
    //                         /*room_id = "VCR-" + result[0].caller_id;
    //                         io.sockets.in(room_id).emit('endcall',data);*/
    //                         var url = api_url + '/webservices/endCallNotification';
    //                         request.post({url:url, form: data}, function (error, response, body) {
    //                             console.log('response=' + response);
    //                             console.log('error=' + error);
    //                             console.log('body=' + body);
    //                             //console.log('response=' + JSON.stringify(response));
    //                         });
    //                     } else {
    //                         var endcallQuery = "UPDATE `calls` SET  acceptcalls='"+acceptcalls+"' WHERE `calls`.`id` = '"+result[0].id+"';";
    //                         db.query(endcallQuery);
    //                         room_id = "VCR-" + data.caller_id;
    //                         io.sockets.in(room_id).emit('endcall',data);
    //                     }
    //                 }
    //                 console.log(`A receiver is after: `, acceptcalls);
    //             }
    //         });
    //     }

    // });

    // socket.on('acceptcall', function(data){
    //     data.call_status = 1;
    //     var getcallQuery = "SELECT * from `calls` WHERE `calls`.`room_id` = '"+data.room_id+"';";
    //     db.query(getcallQuery, function(err, result, fields) {
    //         if (err) throw err;

    //         if(typeof result[0] != 'undefined' && result[0]) {
    //             var accept_userids = result[0].acceptcalls.split(',');
    //             accept_userids.push(data.caller_id);
    //             var unique_accept_userids = accept_userids.filter((v, i, a) => a.indexOf(v) === i);

    //             var endcallQuery = "UPDATE `calls` SET acceptcalls='"+unique_accept_userids+"', `calls`.`callstatus` = 'A'  WHERE `calls`.`id` = '"+result[0].id+"';";
    //             db.query(endcallQuery);
    //         }
    //     });
    // });

    // socket.on('rejectcall', function(data){
    //     data.call_status = 1;
    //     var getcallQuery = "SELECT * from `calls` WHERE `calls`.`room_id` = '"+data.room_id+"';";
    //     if(data.calltype == 'S') {
    //         console.log(`reject call query: `, getcallQuery);
    //         db.query(getcallQuery, function(err, result, fields) {
    //             if (err) throw err;

    //             if(typeof result[0] != 'undefined' && result[0]) {
    //                 var receiver_ids = result[0].receiver_id;
    //                 if(receiver_ids != "" && receiver_ids != null) {
    //                     receiver_ids = result[0].receiver_id.split(',');
    //                     receiver_ids.push(result[0].caller_id);
    //                     receiver_ids = receiver_ids.filter((v, i, a) => a.indexOf(v) === i);
    //                     //console.log('receiver_ids : ', receiver_ids);
    //                     for (receiver of receiver_ids) {
    //                         console.log(`reject call receiver id: `, receiver);
    //                         room_id = "VCR-" + receiver;
    //                         io.sockets.in(room_id).emit('rejectcall',data);
    //                     }
    //                 }
    //                 var endcallQuery = "UPDATE `calls` SET `calls`.`callstatus` = 'E'  WHERE `calls`.`id` = '"+result[0].id+"';";
    //                 db.query(endcallQuery);
    //             }
    //         });
    //     } else {
    //         db.query(getcallQuery, function(err, result, fields) {
    //             if (err) throw err;

    //             if(typeof result[0] != 'undefined' && result[0]) {
    //                 var leavecalls = result[0].leavecalls;
    //                 var receiver_ids = result[0].receiver_id.split(',');
    //                 receiver_ids.push(result[0].caller_id);
    //                 receiver_ids = receiver_ids.filter((v, i, a) => a.indexOf(v) === i);

    //                 var leavecallsArray = [];
    //                 if(leavecalls != "" && leavecalls != null) {
    //                     leavecallsArray  = leavecalls.split(',');
    //                 }

    //                 //console.log('receiver_ids : ', receiver_ids);
    //                 for (receiver of receiver_ids) {
    //                     console.log(`reject call receiver id: `, receiver);
    //                     room_id = "VCR-" + receiver;
    //                     io.sockets.in(room_id).emit('rejectcall',data);
    //                 }

    //                 leavecallsArray.push(data.caller_id);
    //                 leavecallsArray = leavecallsArray.filter((v, i, a) => a.indexOf(v) === i);
    //                 var leavecallQuery = "UPDATE `calls` SET `calls`.`leavecalls` = '"+leavecallsArray+"'  WHERE `calls`.`id` = '"+result[0].id+"';";
    //                 db.query(leavecallQuery);

    //                 var leavecallsLength = leavecallsArray.length;
    //                 var receiveridsLength = receiver_ids.length;
    //                 var userleft = receiveridsLength - leavecallsLength;

    //                 if(leavecallsLength < 2) {
    //                     var endcallQuery = "UPDATE `calls` SET `calls`.`callstatus` = 'E'  WHERE `calls`.`id` = '"+result[0].id+"';";
    //                     db.query(endcallQuery);
    //                 }

    //             }
    //         });

    //         var url = api_url + '/webservices/rejectCallNotification';
    //         request.post({url:url, form: data}, function (error, response, body) {
    //             console.log('response=' + response);
    //             console.log('error=' + error);
    //             console.log('body=' + body);
    //             //console.log('response=' + JSON.stringify(response));
    //         });
    //     }
    // });

    socket.on('disconnect', function(){
      console.log('user disconnected');
    });

});

//     //CHECK ONE TO ONE CALL STATUS

//     var checkCallStatus = function (data, callback) {
//        // console.log("with call status function");
//         data.error_msg = "";
//         var minutesToAdd=2;
//         var currentDate = new Date();
//         var futureDate = new Date(currentDate.getTime() - minutesToAdd*60000);

//         var created_at = date.format(futureDate, 'YYYY-MM-DD HH:mm:ss');
//         //console.log('created_at', created_at);

//         var updatePendingCallQuery = "UPDATE `calls` SET `callstatus` = 'E' WHERE `calls`.`created_at` < '"+created_at+"' AND callstatus='P'";
//         //console.log('updatePendingCallQuery' + updatePendingCallQuery);
//         db.query(updatePendingCallQuery);

//        if(data.calltype == 'S') {
//             var callback_status = busy_callback = 0;
//             var busyUserQuery = "SELECT * FROM calls where (caller_id='"+data.caller_id+"' OR FIND_IN_SET('"+data.caller_id+"', acceptcalls)) AND (callstatus ='A' || callstatus ='P')";
//             console.log('busyUser  ', busyUserQuery);
//             var busyOtherUserQuery = "SELECT * FROM calls where (caller_id='"+data.receiver_id+"' OR FIND_IN_SET('"+data.receiver_id+"', acceptcalls)) AND (callstatus ='A')";

//             db.query(busyUserQuery, function (error, results, fields) {
//                 if (error) throw error;
//                 if(typeof results[0] == 'undefined' && !results[0]) {
//                  //   callback(data);
//                 } else {
//                     data.call_status = 0;
//                     data.error_msg = "You are already on another call!";
//                    // callback(data);
//                 }
//                 callback_status = 1;
//                 console.log('callback_status'+ callback_status + "===busy_callback=="+busy_callback);
//                 if( callback_status == 1 && busy_callback ==1) {
//                     callback(data);
//                 }
//             });

//             db.query(busyOtherUserQuery, function (error, results, fields) {
//                 if (error) throw error;
//                 if(typeof results[0] == 'undefined' && !results[0]) {

//                 } else {
//                     data.call_status = 0;
//                     data.error_msg = "User is already on another call!";
//                 }
//                 busy_callback = 1;
//                 console.log('callback_status'+ callback_status + "===busy_callback=="+busy_callback);
//                 if( callback_status == 1 && busy_callback ==1) {
//                     callback(data);
//                 }
//             });




//         } else {
//             var busyUserQuery = "SELECT * FROM calls where (caller_id='"+data.caller_id+"' AND (callstatus ='P' || callstatus ='A')) OR (FIND_IN_SET('"+data.caller_id+"', acceptcalls) AND (callstatus ='A'))";
//             // console.log("busyUserQuery", busyUserQuery);
//             var busy_callback = 0;
//             db.query(busyUserQuery, function (error, results, fields) {
//                 if (error) throw error;
//                 if(typeof results[0] == 'undefined' && !results[0]) {

//                     var receiver_ids = data.receiver_id.split(',');
//                     console.log(`receiver_ids: `, receiver_ids);
//                     var totalreceivers = receiver_ids.length;
//                     var loopcount = 1;
//                     var busy_count = 0;
//                     var free_receiver_id =[];
//                     for (receiver of receiver_ids) {
//                         var otherUserQuery = "SELECT calls.* FROM calls where (caller_id='"+receiver+"' AND (callstatus ='P' || callstatus ='A')) OR (FIND_IN_SET('"+receiver+"', acceptcalls) AND (callstatus ='A'))";
//                         console.log(`otherUserQuery: `, otherUserQuery);
//                         db.query(otherUserQuery, function (error, otherresults, fields) {
//                             if (error) throw error;
//                             if(typeof otherresults[0] == 'undefined' && !otherresults[0]) {
//                             }else {
//                                 busy_count++;
//                             }
//                                 console.log(`free_receiver_id:`, receiver);
//                                // free_receiver_id.push(receiver);
//                             if(totalreceivers == loopcount) {
//                                 if(loopcount == busy_count) {
//                                     data.call_status = 0;
//                                     data.error_msg = "All users are already on another call!";
//                                     callback(data);
//                                 } else {
//                                    // data.receiver_ids = free_receiver_id;
//                                     callback(data);
//                                 }
//                             }

//                             loopcount++;
//                         });

//                     }

//                 } else {
//                     data.call_status = 0;
//                     data.error_msg = "You are already on another call!";
//                     callback(data);
//                     return false;
//                 }
//             });
//         }
//     }

    //check user status or exist or not
    var checkUserStatus = function (data,callback) {
            data.error_msg = "";
            var active_query = "SELECT * FROM users where id='"+data.receiver_id+"'";

            db.query(active_query, function (error, results, fields) {
                if (error) throw error;
                if(typeof results[0] == 'undefined' && !results[0]) {
                    data.user_status = 0;
                    data.error_msg = "This user is no longer available";
                    callback(data);
                    return false;
                } else {
                    callback(data);
                }
            });
    }

    // var checkGroupStatus = function (data,callback) {
    //         data.error_msg = "";
    //         var active_query = "SELECT * FROM groups where id='"+data.group_id+"'";

    //         db.query(active_query, function (error, results, fields) {
    //             if (error) throw error;
    //             if(typeof results[0] == 'undefined' && !results[0]) {
    //                 data.user_status = 0;
    //                 data.error_msg = "This group is no longer available";
    //                 callback(data);
    //                 return false;
    //             } else {
    //                 callback(data);
    //             }
    //         });
    // }
http.listen(port, function(){
  console.log('listening on *:'+ port);
});