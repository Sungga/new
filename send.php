<?php
$database = mysqli_connect("localhost","root","","chat_with_me");
mysqli_set_charset($database, "utf8");
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['message'])) {
        $message = $_POST['message'];
        $user = $_POST['user'];
        if($user == 1) {
            $query = "INSERT INTO tbl_message(user, message) VALUES('1', '$message')";
        }
        else {
            $query = "INSERT INTO tbl_message(user, message) VALUES('0', '$message')";
        }
        mysqli_query($database, $query);
    }
}
?>