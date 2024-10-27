<?php 
    $db = mysqli_connect("localhost","root","","chat_with_me");
    mysqli_set_charset($db, "utf8");
    $query = "SELECT * from tbl_message";
    $message = mysqli_query($db, $query);

    $rows = array();

    while($row = mysqli_fetch_assoc($message)) {
        $rows[] = $row;
    }
?>

<?php foreach($rows as $item) { ?>
    <?php if($item['users'] == 0) { ?>
        <div class="chatContent left">
            <p><?php echo $item['message']; ?></p>
        </div>
    <?php } else { ?>
        <div class="chatContent right">
            <p><?php echo $item['message']; ?></p>
        </div>
    <?php } ?>
<?php } ?>
