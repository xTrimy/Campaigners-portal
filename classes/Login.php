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
                       DB::query('UPDATE member_login_tokens SET is_deleted=1 WHERE token=:token', array(':token'=>sha1($_COOKIE['Campaigners_ID'])));
                       
                        DB::query('INSERT INTO member_login_tokens VALUES (\'\', :token, :user_id,0)', array(':token'=>sha1($token), ':user_id'=>$userid));
                        
                        setcookie("Campaigners_ID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
                        setcookie("Campaigners_ID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);
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
  