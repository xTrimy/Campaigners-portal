<?php
include('start.php');
header('Content-Type: application/json; charset=utf-8', true);
$response = new stdClass();
// Check if request sent correctly
if(isset($_POST['id']) && isset($_POST['value'])){
    $id = $_POST['id'];
    $value = $_POST['value'];
    $value = $value === 'true'? 1: 0;
    if(DB::query('SELECT 1 FROM tasks WHERE id=:id',array(':id'=>$id))){ // Check if task exists
        if(!DB::query('SELECT 1 FROM tasks WHERE id=:id AND member_id=:member_id',array(':id'=>$id,':member_id'=>$user_id))){ // Check if user not allowed to send this request
            http_response_code(403);
            $response->status = "Forbidden";
            $response->code = "403";
            $response->time = date('Y-m-d H:i:s');
            $response->error = "Forbidden";
         }else{
            // Update the task
            DB::query('UPDATE tasks SET is_finished=:is_finished WHERE id=:id',array(':id'=>$id,':is_finished'=>$value));
            http_response_code(200);
            $response->message = "Task status updated";
            $response->dev_message = "Task status updated to ".(int)($value);
            $response->status = "Ok";
            $response->code = "200";
            $response->time = date('Y-m-d H:i:s');
         }
    }else{ //Task not found
        http_response_code(404);
        $response->message = "Task not found";
        $response->status = "Not found";
        $response->code = "404";
        $response->time = date('Y-m-d H:i:s');
        $response->error = "Not found";
}
}else{ // Request isn't correct (parameters not correct {$id},{$value})
    http_response_code(400);
    $response->status = "Bad request";
    $response->code = "400";
    $response->time = date('Y-m-d H:i:s');
    $response->error = "Bad request";
}
//Send JSON encoded response
echo json_encode($response);
?>