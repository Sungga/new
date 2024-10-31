<?php
// Thông tin kết nối
$serverName = "vanhh.database.windows.net";
$connectionOptions = array(
    "Database" => "vanhh",
    "Uid" => "vanh",
    "PWD" => "Vietanhb33@"
);

// Kết nối với SQL Server
$db = sqlsrv_connect($serverName, $connectionOptions);
if ($db === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Kiểm tra nếu người dùng gửi tin nhắn
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['message'])) {
    $message = $_POST['message'];
    
    $user = 0;
    if(isset($_GET['user']) && $_GET['user'] == 1) $user = 1;

    // Câu truy vấn để thêm dữ liệu
    $insertQuery = "INSERT INTO chat_with_me (message, users) VALUES (?, ?)";
    $params = array($message, $user);
    $insertStmt = sqlsrv_query($db, $insertQuery, $params);

    if ($insertStmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }
}

// Câu truy vấn để lấy dữ liệu
$query = "SELECT * FROM chat_with_me";
$stmt = sqlsrv_query($db, $query);
if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

$rows = array();

// Lấy dữ liệu từ kết quả truy vấn
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $rows[] = $row;
}

// Đóng kết nối
sqlsrv_free_stmt($stmt);
sqlsrv_close($db);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat with me</title>
    <link rel="stylesheet" href="./style.css"> 
</head>
<body>
    <div id="main">
        <div id="main_container">
            <div class="container">
                <h1>CHAT WITH ME</h1>
                <div class="blockChat">
                    <?php foreach($rows as $item) { ?>
                        <?php if($item['users'] == 0) { ?>
                            <div class="chatContent left">
                                <p><?php echo htmlspecialchars($item['message'], ENT_QUOTES, 'UTF-8'); ?></p>
                            </div>
                        <?php } else { ?>
                            <div class="chatContent right">
                                <p><?php echo htmlspecialchars($item['message'], ENT_QUOTES, 'UTF-8'); ?></p>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
                <form method="POST" action="">
                    <div class="messInput">
                        <input type="text" id="messageInput" name="message" class="message" required>
                        <button type="submit" name="send" id="sendButton">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="chat"></div>
</body>
</html>
