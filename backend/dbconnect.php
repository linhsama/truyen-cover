<?php 
    // mysql://b099287ee010b1:cce8ce92@us-cdbr-east-06.cleardb.net/heroku_9545e73caaf405a?reconnect=true
    try{
        $conn = mysqli_connect('us-cdbr-east-06.cleardb.net', 'b099287ee010b1', 'cce8ce92', 'heroku_9545e73caaf405a') or die('Xin lỗi, database không kết nối được.');
    }catch(Exception $e){
        $conn = mysqli_connect('localhost', 'root', '', 'db_truyen-cover') or die('Xin lỗi, database không kết nối được.');
    }

    // Tùy chỉnh kết nối
    // Set charset là utf-8 đối với kết nối này. Dùng để gõ tiếng Việt, Nhật, Thái, Trung Quốc ...
    // Lưu ý: gõ với bộ gõ UNIKEY, bảng mã là UNICODE
    $conn->query("SET NAMES 'utf8mb4'"); 
    $conn->query("SET CHARACTER SET UTF8MB4");  
    $conn->query("SET SESSION collation_connection = 'utf8mb4_unicode_ci'");
?>