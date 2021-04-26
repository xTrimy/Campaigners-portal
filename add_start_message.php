<?php
$page_permission = 10; //IT Manager or above
include('includes/start.php');
include('includes/head.php');
include('includes/header.php');

//check if user submited the form
$msg = "";
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    DB::query('INSERT INTO start_messages VALUES(\'\',:name,0) ', array(':name' => $name));
    $id = DB::query('SELECT id FROM start_messages WHERE name=:name ORDER BY id DESC LIMIT 1 ', array(':name' => $name))[0]['id'];
    for ($i = 0; $i < count($_FILES['image']['name']); $i++) {
        // Image Upload START
        $target_dir = "uploads/";
        $file_name = mktime() . '-' . basename($_FILES["image"]["name"][$i]);
        $target_file = $target_dir . $file_name;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"][$i], $target_file)) {
                $image = $file_name;
            } else {
                $errmsg .=  "Sorry, there was an error uploading your file.<br>";
            }
        }
        // Image Upload END
        $title = $_POST['title'][$i];
        $description = $_POST['description'][$i];
        DB::query('INSERT INTO start_messages_pages VALUES(\'\', :message_id, :image, :title, :description, 0)',
        array(
            ':message_id'=>$id,
            ':image'=>$image,
            ':title'=>$title,
            ':description'=>$description
        ));
        $msg = "Start message added and will be displayed next time you open the portal";
    }
}
?>
<div id="main-body">

    <div class="cards">
        <div class="row">
            <div class="item">
                <h1>Create new message</h1>
                <div class="success"><?php echo $msg; ?></div>
                <form method="post" enctype="multipart/form-data">
                    <p>Name :</p>
                    <input type="text" class="binput" name="name" required> <br>

                    <div id="increasing_inputs" data-num="1">
                        <div class="input_group">
                            <p>Page: <span class="group_num"> 1 </span></p>
                            <p>Image :</p>
                            <input type="file" name="image[]" class="binput" required>
                            <p>Name :</p>
                            <input type="text" name="title[]" class="binput" required>
                            <p>Description :</p>
                            <textarea type="text" name="description[]" class="binput" required></textarea>
                        </div>
                    </div>
                    <span class="xbutton add"><i class="fas fa-plus"></i></span>
                    <button type="submit" name="submit" class="xbutton">Add</button>
                </form>
            </div>
        </div>
    </div>

</div>
<script>
    const add_buttons = document.querySelectorAll('.xbutton.add');
    add_buttons.forEach(function(el) {
        el.addEventListener('click', function() {
            const parent = this.previousElementSibling;
            let element = parent.querySelector('.input_group');
            let cloned = element.cloneNode(true);
            cloned.querySelector('.group_num').innerHTML = parseInt(parent.getAttribute('data-num')) + 1;
            parent.setAttribute('data-num', parseInt(parent.getAttribute('data-num')) + 1);
            console.log(cloned);
            this.previousElementSibling.appendChild(cloned);

        });
    });
</script>
<?php include('includes/footer.php') ?>