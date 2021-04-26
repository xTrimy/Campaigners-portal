<?php
$version_number = "v1.3.0-Alpha";

if (file_exists('classes/DB.php')){
    include_once('classes/DB.php');
    include_once('classes/TLogin.php');
    include_once('classes/Login.php');
    include_once('classes/Permissions.php');
    include_once('classes/Notifications.php');
    include_once('classes/TShirts.php');
    include_once('classes/Functions.php');
    include_once('classes/StartMessages.php');
    include_once('classes/Streaks.php');
} else {
    include_once('../classes/DB.php');
    include_once('../classes/TLogin.php');
    include_once('../classes/Login.php');
    include_once('../classes/Permissions.php');
    include_once('../classes/Notifications.php');
    include_once('../classes/TShirts.php');
    include_once('../classes/Functions.php');
    include_once('../classes/StartMessages.php');
    include_once('../classes/Streaks.php');
}
    
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    //Permissions Class
    $Permissions = new Permissions();
    $user_id;
    $user_data;
    $user=[];
    //Check member login
    if(Login::isLoggedIn()){
        $user_id=Login::isLoggedIn();
        $Permissions::grantPermission('member');
        $user_data = DB::query('SELECT m.*, c.name as cname, c.id as cid FROM members m,committees c WHERE c.id=m.committee_id AND m.id=:id',array(':id'=>$user_id));
        $user_level = $Permissions::getUserLevel($user_id);
        $Permissions::grantPermission($user_level);
        if($user_id == 1){
        $Permissions::grantPermission("it manager");
        }
    }
    //Check trainee login
    else if(TLogin::isLoggedIn()){
        $user_id=TLogin::isLoggedIn();
        $Permissions::grantPermission('trainee');
        $user_data = DB::query('SELECT * FROM trainees WHERE id=:id',array(':id'=>$user_id));
    }else{
        header('Location: ./login_page.html');
    }
    //Check user exists
    if(!$user_data){
        header('Location: ./login_page.html');
    }

    Streaks::addNewStreakIfNotExist($user_id);

    $user_data=$user_data[0];
    $user['name'] = $user_data['name'];
    $user['first_name'] = explode(" ",$user['name'])[0];
    $user['image'] = $user_data['image'];
    $user['committee'] = $user_data[ 'cname'];
    $user['committee_id'] = $user_data['cid'];
    $user['streak_count'] = Streaks::getStreakCountMoreThanTwo($user_id);

    //For Pagination
    $default_results_per_page = 10;  
    
    // Check if page permission allowed for this user
    if(!isset($page_permission)){
        $page_permission=0;
    }
    if($Permissions::getAccessLevel() < $page_permission){
        header('Location:index.php?forbidden');
        exit;
    }
    if(isset($_GET['notification'])){
        Notifications::markNotificationAsRead($_GET['notification'],$user_id);
    }
    // Record today's streak if not exists
?>