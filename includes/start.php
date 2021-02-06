<?php
    include('classes/DB.php');
    include('classes/TLogin.php');
    include('classes/Login.php');
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $user_id;
    $user_type;
    $user_data;
    $user=[];
    //Check member login
    if(Login::isLoggedIn()){
        $user_id=Login::isLoggedIn();
        $user_type="member";
        $user_data = DB::query('SELECT * FROM members WHERE id=:id',array(':id'=>$user_id));
    }
    //Check trainee login
    else if(TLogin::isLoggedIn()){
        $user_id=TLogin::isLoggedIn();
        $user_type="trainee";
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
?>