    <base href="/club_portal/">
    <?php
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
    $page_permission = 10;
    include('../includes/start.php');
    include('../includes/head.php');
    $sub = true;
    include('../includes/header.php');
    include('../classes/Mail.php');

    //check if user submited the form
    $msg = "";
    $file_name = "test.html";
    $html = fopen($file_name, "r") or die("Unable to open file!");

    if (isset($_POST['submit'])) {
        $members = DB::query('SELECT * FROM members WHERE mail_sent=0 AND position_id = 1 LIMIT 1');
        $i = 0;
        foreach ($members as $member) {
            $i++;
            $message = fread($html, filesize($file_name));
            $message = str_replace("[Name]", $member['name'], $message);
            $message = str_replace("[Email]", $member['email'], $message);
            $message = str_replace("[Password]", $member['initial_password'], $message);
            Mail::sendMail('Your Campaigners Portal Account', $message, $member['email']);
            DB::query('UPDATE members SET mail_sent=1 WHERE id=:id', array(':id' => $member['id']));
            $msg = $member['name'];
        }
        $msg .= ": Sent " . $i . " Emails successfuly";
    }
    ?>
    <div id="main-body">
        <div class="cards">

            <div class="row">
                <div class="item">
                    <h1>Send?</h1>
                    <form action="" method="POST">
                        <input type="submit" name="submit" value="send">
                    </form>
                    <?php echo $msg; ?>
                </div>

            </div>
            <div class="row">
                <div class="item">
                    <h1>Email Preview</h1>
                    <?php
                    echo fread($html, filesize($file_name));
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php include('../includes/footer.php') ?>