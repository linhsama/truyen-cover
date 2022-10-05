<?php session_start()?>

<?php if(!isset($_SESSION['admin'])){
		echo '<script> location.href="/truyen-cover/admin/auth/dang-nhap.php";</script>';
    }
?><?php
    //Lấy thông tin từ người dùng gửi
    if(isset($_GET['tuong_tac_id'])){
    $tuong_tac_id = $_GET['tuong_tac_id'];
    // mở kết nối
    include_once(__DIR__ . '/../../backend/dbconnect.php'); 
    // lấy thông tin từ id
    $sql = <<<EOT
    SELECT tuong_tac_id,tuong_tac_noi_dung,tuong_tac_loai, tuong_tac_thoi_gian, tuong_tac_trang_thai,
        chapter.chapter_id, chapter.chapter_ten, 
        tai_khoan.tai_khoan_id, ten_hien_thi
    FROM (tuong_tac inner join tai_khoan on tuong_tac.tai_khoan_id = tai_khoan.tai_khoan_id) inner join chapter on tuong_tac.chapter_id = chapter.chapter_id  
    WHERE tuong_tac_id = $tuong_tac_id
EOT;
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($result, MYSQLI_ASSOC);
    // kiểm tra có id trong database không
    if(!empty($data)){
        // xóa dữ liệu trong data
        $sql = <<<EOT
        DELETE FROM tuong_tac
        WHERE tuong_tac_id = $tuong_tac_id;
EOT;
        mysqli_query($conn, $sql);
        // điều hướng về trang danh sách
        echo "<script>location.href = 'index.php?result=success';</script>";
    }
    }
?>