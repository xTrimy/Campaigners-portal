<?php
include('includes/start.php');
include('includes/head.php');
include('includes/header.php');
if (!isset($_GET['id'])) {
    header('Location:./');
}
$id = $_GET['id'];
if (!TShirts::getTshirtsFormData($id)) {
    header('Location:./');
}

$data = TShirts::getTshirtsFormData($id);
$form = $data[0];
//check if user submited the form
$msg = "";
if (isset($_POST['submit'])) {

    $size = NULL;
    $style = NULL;
    $option = NULL;
    $color = NULL;

    extract($_POST);

    DB::query('INSERT INTO tshirts_registrees VALUES(\'\',:form_id,:member_id,:size,:color,:style,:option,0)', array(
        ":form_id" => $id,
        ":member_id" => $user_id,
        ":size" => $size,
        ":style" => $style,
        ":option" => $option,
        ":color" => $color
    ));

    $msg = "Your request has been submitted";
}

?>
<div id="main-body">

    <div class="cards">
        <div class="row">

            <div class="item">
                <h1>Size Chart</h1>

                <img style="width:100%;max-width:800px; margin:0 auto;text-align:center;" src="uploads/<?php echo $form['size_chart']; ?>">
            </div>
        </div>
        <div class="row">
            <div class="item ">
                <h1><?php echo $form['name']; ?></h1>
                <h3><?php echo $form['description']; ?></h3>
                <div class="success"><?php echo $msg; ?></div>
                <form method="post">
                    <?php
                    //Sizes START
                    $sizes = $form['available_sizes'];
                    $sizes = explode(',', $sizes);
                    if ($sizes) {
                    ?>
                        <p>Size:</p>
                        <select name="size" required id="" class="binput">
                            <?php
                            foreach ($sizes as $size) {
                            ?>
                                <option value="<?php echo $size; ?>"><?php echo $size; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <br>
                    <?php

                    } //Sizes END 
                    ?>
                    <?php
                    //colors START
                    $colors = $form['available_colors'];
                    $colors = explode(',', $colors);
                    if ($colors) {
                    ?>
                        <p>Color:</p>
                        <select name="color" required id="" class="binput">
                            <?php
                            foreach ($colors as $size) {
                            ?>
                                <option value="<?php echo $size; ?>"><?php echo $size; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <br>
                    <?php

                    } //colors END 
                    ?>
                    <?php
                    //styles START
                    $styles = $form['available_styles'];
                    $styles = explode(',', $styles);
                    if ($styles) {
                    ?>
                        <p>Style:</p>
                        <select name="style" required id="" class="binput">
                            <?php
                            foreach ($styles as $size) {
                            ?>
                                <option value="<?php echo $size; ?>"><?php echo $size; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <br>
                    <?php

                    } //styles END 
                    ?>
                    <?php
                    $obligatory = $form['obligatory_for_committee'];
                    $obligatory = explode(',', $obligatory);
                    if (!in_array($user['committee'], $obligatory)) {

                        //options START
                        $options = $form['options'];
                        $options = explode(',', $options);
                        if ($options) {
                    ?>
                            <p>Options:</p>
                            <select name="option" required id="" class="binput">
                                <?php
                                foreach ($options as $size) {
                                ?>
                                    <option value="<?php echo $size; ?>"><?php echo $size; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <br>
                    <?php
                        } //options END 
                    }
                    ?>

                    <button type="submit" name="submit" class="xbutton">Submit</button>
                </form>
            </div>
        </div>
    </div>

</div>
<?php include('includes/footer.php') ?>