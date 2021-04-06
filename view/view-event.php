<?php
include('../includes/start.php');
include('../includes/head.php');
include('../includes/header.php');

if (!isset($_GET['date'])) {
    header('Location:./');
}
$event_date = $_GET['date'];

$event_details = DB::query('SELECT e.*,c.name as cname FROM events e LEFT JOIN committees c ON c.id=e.committee_id WHERE e.start_date<=:start_date AND e.end_date>=:start_date', array(':start_date' => $event_date));

?>
<div id="main-body">
    <div class="page-title">
        Event
    </div>
    <div class="cards">
    <div class="row">
        <div class="item">
            <?php
                $day = "today";
                if(date('Y-m-d') != $event_date){
                    $day = "on ".$event_date;
                }
                if(count($event_details) == 0){
                    echo "There's no events happening ".$day." 😞";
                }else if (count($event_details) == 1){
                    echo "There's an event happening " . $day . " 🚀";
                } else {
                echo "There're ". count($event_details) . " events happening " . $day . " 😮😮";
            }
            ?>
        </div>
    </div>
        <?php
        foreach ($event_details as $event) {
        ?>
            <div class="row mb-50">
                <div class="item">
                    <h1>Event Date</h1>
                    <p>Event Starts At: <b><?php echo $event['start_date']; ?></b></p>
                    <p>Event Ends At: <b><?php echo $event['end_date']; ?></b></p>
                </div>
                <div class="item" style="max-height:300px;">
                    <h1>Event Details</h1>
                    <?php if ($event['committee_id']) {
                    ?>
                        <i>This is a special event for <b><?php echo $event['cname']; ?></b> Committee</i>
                    <?php
                    } ?>
                    <h3>Event Name: </h3>
                    <?php echo $event['name']; ?>
                    <h3>Event Description: </h3>
                    <?php echo $event['description']; ?>
                </div>
            </div>
        <?php
        }
        ?>


    </div>
</div>
<?php include('../includes/footer.php') ?>