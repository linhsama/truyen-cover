<?php
    //Lấy thông tin từ người dùng gửi
    if(isset($_GET['the_loai_id'])){
        $the_loai_id = $_GET['the_loai_id'];
    // lấy thông tin từ id
    $sql = <<<EOT
        SELECT the_loai_id 
        FROM the_loai
        WHERE the_loai_id = $the_loai_id;
EOT;
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($result, MYSQLI_ASSOC);
    // kiểm tra có id trong database không
    if(!empty($data)){
        // xóa dữ liệu trong data
        $sql = <<<EOT
        DELETE FROM the_loai
        WHERE the_loai_id = $the_loai_id;
EOT;
        mysqli_query($conn, $sql);
        // điều hướng về trang danh sách
        echo "<script>location.href = 'index.php?direction=the-loai&status=success';</script>";
    }               
    }
?>