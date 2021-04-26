<?php
include('start.php');
header('Content-Type: application/json; charset=utf-8', true);
$response = new stdClass();
// Check if request sent correctly
if(isset($_POST['id'])){
    $id = $_POST['id'];
    if(DB::query('SELECT 1 FROM members WHERE id=:id',array(':id'=>$id))){ // Check if user exists
        if($user_id == $id){
            http_response_code(403);
            $response->error = "You can't cancel a friend request of yourself";
            $response->status = "Forbidden";
            $response->code = "403";
            $response->time = date('Y-m-d H:i:s');
        }else  if(!DB::query('SELECT 1 FROM friends WHERE sender_id=:sender_id AND receiver_id=:receiver_id',array(':receiver_id'=>$id,':sender_id'=>$user_id))){ // Check if didn't send a friend request
            http_response_code(200);
            $response->message = "You didn't send a friend request to cancel";
            $response->status = "Ok";
            $response->code = "200";
            $response->time = date('Y-m-d H:i:s');
        }else{
            // Cancel friend request
            DB::query(
            'UPDATE friends SET is_deleted=1 WHERE sender_id=:sender_id AND receiver_id=:receiver_id', array(':sender_id' => $user_id, ':receiver_id' => $id));
            DB::query('UPDATE notifications SET is_deleted=1 WHERE sender_id=:sender_id AND recipient_id=:receiver_id AND type="friend.request"',array(':sender_id'=>$user_id,':receiver_id'=>$id));
            http_response_code(200);
            $response->message = "Friend request canceled";
            $response->dev_message = "Friend request canceled for user_id(".$id.")";
            $response->status = "Ok";
            $response->code = "200";
            $response->time = date('Y-m-d H:i:s');
        }
    }else{ //User not found
        http_response_code(404);
        $response->message = "User not found";
        $response->status = "Not found";
        $response->code = "404";
        $response->time = date('Y-m-d H:i:s');
        $response->error = "Not found";
    }
}else{ // Request isn't correct (parameters not correct {$id})
    http_response_code(400);
    $response->status = "Bad request";
    $response->code = "400";
    $response->time = date('Y-m-d H:i:s');
    $response->error = "Bad request";
}
//Send JSON encoded response
echo json_encode($response);
?>