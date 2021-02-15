<?php
include('includes/start.php');
include('includes/head.php');
include('includes/header.php');

//check if user submited the form
$msg="";
$errmsg="";
if(isset($_POST['submit'])){
  $nickname = $_POST['nickname'];
  $bio = $_POST['bio'];
  $birthdate = $_POST['birthdate'];
  $phone = $_POST['phone'];
  //Photo Upload START
  if(!empty($_FILES["profile_image"]["name"])){
    $target_dir = "uploads/";
    $file_name = mktime().'-'.basename($_FILES["profile_image"]["name"]);
    $target_file = $target_dir . $file_name;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["profile_image"]["tmp_name"]);
    if($check !== false) {
      $uploadOk = 1;
    } else {
      $errmsg .= "Failed to upload image: File is not an image.<br>";
      $uploadOk = 0;
    }
    // Check if file already exists
    if (file_exists($target_file)) {
      $errmsg .= "Failed to upload image: File already exists.<br>";
      $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["profile_image"]["size"] > 300000) {
      $errmsg .= "Failed to upload image: File is too large (max: 250KB) <br>";
      $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
      $errmsg .= "Failed to upload image: Allowed formats are \"PNG, JPG, JPEG\" <br>";
      $uploadOk = 0;
    }
    if($uploadOk == 1) {
      if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file)) {
        DB::query('UPDATE members SET image=:image WHERE id=:id',
        array(
          ':id'=>$user_id,
          ':image'=>$file_name,
        ));
      } else {
        $errmsg .=  "Sorry, there was an error uploading your file.<br>";
      }
    }
  }
  //Photo Upload END
  DB::query('UPDATE members SET nickname=:nickname,phone=:phone,bio=:bio,birthdate=:birthdate WHERE id=:id',
  array(
    ':id'=>$user_id,
    ':bio'=>$bio,
    ':birthdate'=>$birthdate,
    ':phone'=>$phone,
    ':nickname'=>$nickname
  ));
  $msg .="Profile updated successfully!";
}
$item = DB::query('SELECT nickname,birthdate,image,bio,phone FROM members WHERE id=:id',array(':id'=>$user_id))[0];
 ?>
 <div id="main-body">
 
        <div class="cards">
          <div class="row">
            <div class="item">
            <h1>Profile Settings</h1>
            <div class="success"><?php echo $msg;?></div>
            <div class="error"><?php echo $errmsg;?></div>
                      <form method="post" enctype="multipart/form-data">
                        <p>Profile Picture:</p>
                        <input type="file" name="profile_image"><br>
                        <p>Nickname :</p> 
                        <input type="text" class="binput" name="nickname" value="<?php echo $item['nickname'];?>"><br>
                        <p>Bio :</p> 
                        <textarea class="binput" name="bio" ><?php echo $item['bio'];?></textarea><br>
                        <p>Birthdate :</p> 
                        <input type="date" class="binput" name="birthdate" value="<?php echo $item['birthdate'];?>"><br>
                        <p>Phone :</p> 
                        <input type="text" class="binput" name="phone" value="<?php echo $item['phone'];?>"><br>

                        <button type="submit" name="submit" class="xbutton">Update</button>
                      </form>
            </div>
          </div>
        </div>

 </div>
 <?php include('includes/footer.php') ?>
  