<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include('classes/DB.php');
if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        if (DB::query('SELECT email FROM trainees WHERE email=:email', array(':email' => $email))) {

                if (password_verify($password, DB::query('SELECT password FROM trainees WHERE email=:email', array(':email' => $email))[0]['password'])) {
                        echo 'Logged in!';
                        $cstrong = True;
                        $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                        $user_id = DB::query('SELECT id FROM trainees WHERE email=:email', array(':email' => $email))[0]['id'];
                        DB::query('INSERT INTO trainee_login_tokens VALUES (\'\', :user_id, :token,0)', array(':token' => sha1($token), ':user_id' => $user_id));
                        setcookie("TCampaigners_ID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
                        setcookie("TCampaigners_ID_", '1', time() + 60 * 30, '/', NULL, NULL, TRUE);
                        header('Location: ./');
                } else {
                        echo 'Incorrect Password!';
                }
        } else {
                echo 'User not registered!';
        }
}
?>
<h1>Login to your account</h1>
<form method="post">
        <input type="email" name="email" value="" placeholder="Email ..."><br />
        <input type="password" name="password" value="" placeholder="Password ..."><br />
        <input type="submit" name="login" value="Login">
</form>