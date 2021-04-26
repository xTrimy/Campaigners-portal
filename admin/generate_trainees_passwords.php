<base href="/club_portal/">
<?php

function generateStrongPassword($length = 9, $add_dashes = false, $available_sets = 'lud')
{
    $sets = array();
    if (strpos($available_sets, 'l') !== false)
    $sets[] = 'abcdefghjkmnpqrstuvwxyz';
    if (strpos($available_sets, 'u') !== false)
    $sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
    if (strpos($available_sets, 'd') !== false)
    $sets[] = '23456789';
    if (strpos($available_sets, 's') !== false)
    $sets[] = '!@#$%&*?';

    $all = '';
    $password = '';
    foreach ($sets as $set) {
        $password .= $set[array_rand(str_split($set))];
        $all .= $set;
    }

    $all = str_split($all);
    for ($i = 0; $i < $length - count($sets); $i++)
    $password .= $all[array_rand($all)];

    $password = str_shuffle($password);

    if (!$add_dashes)
    return $password;

    $dash_len = floor(sqrt($length));
    $dash_str = '';
    while (strlen($password) > $dash_len) {
        $dash_str .= substr($password, 0, $dash_len) . '-';
        $password = substr($password, $dash_len);
    }
    $dash_str .= $password;
    return $dash_str;
}


$page_permission = 10;
include('../includes/start.php');
include('../includes/head.php');
include('../includes/header.php');

//check if user submited the form
$msg = "";

if (isset($_POST['submit'])) {
    $trainees = DB::query('SELECT * FROM trainees WHERE password=""');
    foreach($trainees as $trainee){
        $generated_password = generateStrongPassword();
        $encrypted_password = password_hash($generated_password, PASSWORD_DEFAULT);
        DB::query('UPDATE trainees SET initial_password=:initial_password,password=:password WHERE id=:id',array(
            ':initial_password'=>$generated_password,
            ':password'=>$encrypted_password,
            ':id'=>$trainee['id']
        ));
    }
    $msg = "Generated ".count($trainees)." Passwords successfuly";
}
?>
<div id="main-body">
    <div class="cards">
        <div class="row">
            <div class="item">
                <h1>Generate Password for All Trainees</h1>
                <?php
                    echo $msg;
                ?>
                <form method="post">
                    <button type="submit" name="submit" class="xbutton">Generate</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include('../includes/footer.php') ?>