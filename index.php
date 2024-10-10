<?php 
    // Thông tin kết nối
    $serverName = "comp.database.windows.net"; // Tên server, ví dụ: "localhost" hoặc "192.168.1.1"
    $connectionOptions = array(
        "Database" => "sinhvien", // Tên database
        "Uid" => "vanh",           // Tên người dùng
        "PWD" => "@A123456"       // Mật khẩu
    );

    // Kết nối với SQL Server
    $db = sqlsrv_connect($serverName, $connectionOptions);
    if ($db === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    // Câu truy vấn
    $query = "SELECT * FROM tbl_message";
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
<!--     <link rel="stylesheet" href="./style.css"> -->
</head>
<body>
    <div id="main">
        <div id="main_container">
            <div class="container">
                <h1>CHAT WITH ME</h1>
                <div class="blockChat">
                    <?php foreach($rows as $item) { ?>
                        <?php if($item['user'] == 0) { ?>
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
                <div class="messInput">
                    <input type="text" id="messageInput" name="message" class="message">
                    <button  name="send" id="sendButton">Send</button>
                </div>
            </div>
        </div>
    </div>
    <div id="chat"></div>
</body>
</html>
