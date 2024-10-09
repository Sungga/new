<?php
// // Thông tin kết nối
// $serverName = "comp.database.windows.net";
// $connectionOptions = array(
//     "Database" => "sinhvien",
//     "Uid" => "vanh",
//     "PWD" => "@A123456"
// );

// // Kết nối tới SQL Server
// $conn = sqlsrv_connect($serverName, $connectionOptions);

// if ($conn === false) {
//     die(print_r(sqlsrv_errors(), true));
// }

// // Truy vấn bảng tbl_message
// $sql = "SELECT * FROM tbl_message";
// $stmt = sqlsrv_query($conn, $sql);

// if ($stmt === false) {
//     die(print_r(sqlsrv_errors(), true));
// }

// // Hiển thị dữ liệu
// while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
//     echo "ID: " . $row['id'] . " - Message: " . $row['message'] . "<br>";
// }

// // Giải phóng tài nguyên
// sqlsrv_free_stmt($stmt);
// sqlsrv_close($conn);
?>
