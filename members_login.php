<?php
include('classes/DB.php');

if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $msg = "";
        if (DB::query('SELECT email FROM members WHERE email=:email', array(':email' => $email))) {

                if (password_verify($password, DB::query('SELECT password FROM members WHERE email=:email', array(':email' => $email))[0]['password'])) {
                        $cstrong = True;
                        $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                        $user_id = DB::query('SELECT id FROM members WHERE email=:email', array(':email' => $email))[0]['id'];
                        DB::query('INSERT INTO member_login_tokens VALUES (\'\', :token, :user_id,0)', array(':token' => sha1($token), ':user_id' => $user_id));
                        setcookie("Campaigners_ID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
                        setcookie("Campaigners_ID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);
                        header('Location: ./');
                } else {
                        $msg= 'Incorrect Email or Password';
                }
        } else {
                $msg = 'Incorrect Email or Password';
        }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
                *{
                        box-sizing: border-box;
                }
                html,
                body {
                        width: 100%;
                        height: 100%;
                        overflow: hidden;
                }

                body {
                        background-color: #98ff97;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        font-family: Arial;
                }

                form {
                        width: 500px;
                        max-width: 80%;
                        padding: 10px 20px 50px 20px;
                        background: #fff;
                        text-align: center;
                        box-shadow: 0px 5px 5px 0 rgba(0, 0, 0, 0.5);
                }

                form input[type="email"],
                form input[type="password"] {
                        box-sizing: border-box;
                        width: 100%;
                        padding: 20px;
                        background: #e0e0e0;
                        margin-bottom: 5px;
                        border: 1px solid #000;
                        outline: 0;
                }

                form input[type="submit"] {
                        width:100%;
                        padding:10px 30px;
                        background-color:green;
                        border:0;
                        color:white;
                        cursor: pointer;
                }
        </style>
</head>

<body>

        <form method="post">
                <h1>Login</h1>
                <p style="color:red;"><?php echo $msg; ?></p>
                <input type="email" name="email" value="" placeholder="Email ..."><br />
                <input type="password" name="password" value="" placeholder="Password ..."><br />
                <input type="submit" name="login" value="Login">
        </form>
</body>

</html>