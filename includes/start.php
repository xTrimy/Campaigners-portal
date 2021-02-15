<?php
    include('classes/DB.php');
    include('classes/TLogin.php');
    include('classes/Login.php');
    include('classes/Permissions.php');
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
        $user_data = DB::query('SELECT * FROM members WHERE id=:id',array(':id'=>$user_id));
        $user_level = $Permissions::getUserLevel($user_id);
        $Permissions::grantPermission($user_level);

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
    $user_data=$user_data[0];
    $user['name'] = $user_data['name'];
    $user['first_name'] = explode(" ",$user['name'])[0];
    $user['image'] = $user_data['image'];

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
?>