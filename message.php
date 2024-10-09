<?php 
    // // Thông tin kết nối
    // $serverName = "thi.database.windows.net"; // Tên server, ví dụ: "localhost" hoặc "192.168.1.1"
    // $connectionOptions = array(
    //     "Database" => "sinhvien", // Tên database
    //     "Uid" => "thi",           // Tên người dùng
    //     "PWD" => "@A123456"            // Mật khẩu
    // );

    // // Kết nối với SQL Server
    // $db = sqlsrv_connect($serverName, $connectionOptions);
    // mysqli_set_charset($db, "utf8");
    // $query = "SELECT * from tbl_message";
    // $message = mysqli_query($db, $query);

    // $rows = array();

    // while($row = mysqli_fetch_assoc($message)) {
    //     $rows[] = $row;
    // }
?>



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
