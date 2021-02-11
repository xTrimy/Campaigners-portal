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
            $response->error = "You can't remove yourself";
            $response->status = "Forbidden";
            $response->code = "403";
            $response->time = date('Y-m-d H:i:s');
        }else if(
            !DB::query('SELECT 1 FROM friends WHERE sender_id=:sender_id AND receiver_id=:receiver_id',array(':receiver_id'=>$id,':sender_id'=>$user_id))
            ||
            !DB::query('SELECT 1 FROM friends WHERE sender_id=:sender_id AND receiver_id=:receiver_id',array(':receiver_id'=>$user_id,':sender_id'=>$id))
            ){ // Check if users are friends
            http_response_code(200);
            $response->message = "You already removed this user";
            $response->status = "Ok";
            $response->code = "200";
            $response->time = date('Y-m-d H:i:s');
        }else{
            // Send friend request
            DB::query('UPDATE friends SET is_deleted=1 WHERE sender_id=:sender_id AND receiver_id=:receiver_id',array(':sender_id'=>$user_id,':receiver_id'=>$id));
            DB::query('UPDATE friends SET is_deleted=1 WHERE sender_id=:sender_id AND receiver_id=:receiver_id',array(':sender_id'=>$id,':receiver_id'=>$user_id));
            http_response_code(200);
            $response->message = "Friend removed";
            $response->dev_message = "Friend removed with user_id(".$id.")";
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