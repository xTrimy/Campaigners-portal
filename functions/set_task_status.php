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
        if(!(DB::query('SELECT 1 FROM tasks t LEFT JOIN members_tasks mt ON mt.task_id = t.id JOIN members m ON mt.member_id=m.id AND m.id=:user_id WHERE t.id=:id',array(':id'=>$id,':user_id'=>$user_id))) // Check if is user the "assigned to" user
        && (!(Permissions::getAccessLevel($user_id) >= 2 && $user['committee_id'] == DB::query('SELECT committee_id FROM tasks WHERE id=:id', array(':id' => $id))[0]['committee_id']) //Check if user is head of the committee
        && !(Permissions::getAccessLevel($user_id) >= 4))) //Check if user high board or higher
        { 
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