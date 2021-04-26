<?php
include('../classes/DB.php');
include('../classes/Login.php');
include( '../classes/TLogin.php');
include('../classes/Notifications.php');
include('../classes/Permissions.php');
$user_id;
$user_type;
$user_data;
$user=[];
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$Permissions = new Permissions();

//Check member login
if(Login::isLoggedIn()){
    $user_id=Login::isLoggedIn();
    $user_type="member";
    $user_data = DB::query('SELECT m.*, c.name as cname, c.id as cid FROM members m LEFT JOIN committees c ON c.id=m.committee_id WHERE m.id=:id', array(':id' => $user_id));
    $user_level = $Permissions::getUserLevel($user_id);
    $Permissions::grantPermission($user_level);
    if ($user_id == 1) {
        $Permissions::grantPermission("it manager");
    }
}
//Check trainee login
else if(TLogin::isLoggedIn()){
    $user_id=TLogin::isLoggedIn();
    $user_type="trainee";
    $user_data = DB::query('SELECT * FROM trainees WHERE id=:id',array(':id'=>$user_id));
}else{
    echo "Bad Request";
    exit;
}
//Check user exists
if(!$user_data){
    echo "Bad Request";
    exit;
}
$user_data=$user_data[0];
$user['name'] = $user_data['name'];
$user['first_name'] = explode(" ",$user['name'])[0];
$user['image'] = $user_data['image'];
$user['committee'] = $user_data[ 'cname'];
$user['committee_id'] = $user_data['cid'];
?>