<?php

class Login{
public static function isLoggedIn() {

        if(isset($_COOKIE['Campaigners_ID'])){
            if(DB::query('SELECT user_id FROM member_login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['Campaigners_ID'])))){
                    $userid = DB::query('SELECT user_id FROM member_login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['Campaigners_ID'])))[0]['user_id'];
                    if(isset($_COOKIE['Campaigners_ID_'])){
                        return $userid;
                    }else{
                        $cstrong = True;
                        $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                        $timeNow = date('Y-m-d H:i:s');
                        DB::query('INSERT INTO member_login_tokens VALUES (\'\', :token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$userid));
                        DB::query('DELETE FROM member_login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['Campaigners_ID'])));
                        setcookie("Campaigners_ID", $token, time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE); //setting cookie to 3 days
                        setcookie("Campaigners_ID_", '1', time() + 60 * 60 * 12, '/', NULL, NULL, TRUE); //setting (rest) cookie to 12 hours
                        return $userid;
                    }
            }
        }else{
          if (session_status() == PHP_SESSION_NONE) {
              session_start();
          }
          if(isset($_SESSION["loginToken"]))
            if(DB::query('SELECT user_id FROM member_login_tokens WHERE token=:token', array(':token'=>sha1($_SESSION['loginToken'])))){
              $userid = DB::query('SELECT user_id FROM member_login_tokens WHERE token=:token', array(':token'=>sha1($_SESSION['loginToken'])))[0]['user_id'];
              return $userid;
            }
        }
          return false;
    }

}

?>
