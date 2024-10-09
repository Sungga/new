<?php
// // Thông tin kết nối
// $serverName = "thi.database.windows.net"; // Tên server, ví dụ: "localhost" hoặc "192.168.1.1"
// $connectionOptions = array(
//     "Database" => "sinhvien", // Tên database
//     "Uid" => "thi",           // Tên người dùng
//     "PWD" => "@A123456"            // Mật khẩu
// );

// // Kết nối với SQL Server
// $database = sqlsrv_connect($serverName, $connectionOptions);
// mysqli_set_charset($database, "utf8");
// if($_SERVER['REQUEST_METHOD'] == 'POST') {
//     if(isset($_POST['message'])) {
//         $message = $_POST['message'];
//         $user = $_POST['user'];
//         if($user == 1) {
//             $query = "INSERT INTO tbl_message(user, message) VALUES('1', '$message')";
//         }
//         else {
//             $query = "INSERT INTO tbl_message(user, message) VALUES('0', '$message')";
//         }
//         mysqli_query($database, $query);
//     }
// }
?>

<?php
// Thông tin kết nối
$serverName = "comp.database.windows.net";
$connectionOptions = array(
    "Database" => "sinhvien",
    "Uid" => "vanh",
    "PWD" => "@A123456"
);

// Kết nối với SQL Server
$database = sqlsrv_connect($serverName, $connectionOptions);
if($database === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Set UTF-8 (SQL Server không có hàm sqlsrv_set_charset, nhưng ta có thể đảm bảo dữ liệu xử lý đúng UTF-8 từ phía server)
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['message'])) {
        $message = $_POST['message'];
        $user = $_POST['user'];

        // Tạo câu truy vấn
        $query = "INSERT INTO tbl_message (user, message) VALUES (?, ?)";
        
        // Chuẩn bị câu truy vấn và thực hiện với các giá trị truyền vào
        $params = array($user, $message);
        $stmt = sqlsrv_query($database, $query, $params);

        // Kiểm tra nếu truy vấn thành công
        if($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        } else {
            echo "Message đã được thêm thành công!";
        }
    }
}

// Đóng kết nối sau khi xong
sqlsrv_close($database);
?>
