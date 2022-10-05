<div class="container-cs">
    <br />
    <div class="container-lm">
        <section>
            <?php include_once(__DIR__ . '/../../../backend/dbconnect.php'); ?>
            <?php
    $tai_khoan_id = $_SESSION['user_tai_khoan_id'];
    $sql_truyen_da_thich = <<<EOT
    SELECT * 
    FROM (tuong_tac INNER JOIN chapter ON tuong_tac.chapter_id = chapter.chapter_id)
    INNER JOIN truyen ON truyen.truyen_id = chapter.truyen_id
    WHERE tai_khoan_id = '$tai_khoan_id' AND tuong_tac_loai = '2'
    ORDER BY tuong_tac_id DESC
    EOT;
        $result_truyen_da_thich = mysqli_query($conn, $sql_truyen_da_thich);
        $data_truyen_da_thich = [];
        while ($row = mysqli_fetch_array($result_truyen_da_thich, MYSQLI_ASSOC)) {
            $data_truyen_da_thich[] = array(
                'truyen_id' => $row['truyen_id'],
                'truyen_ma' => $row['truyen_ma'],
                'truyen_ten' => $row['truyen_ten'],
                'truyen_tac_gia' => $row['truyen_tac_gia'],
                'truyen_mo_ta' => $row['truyen_mo_ta'],
                'truyen_anh_dai_dien' => $row['truyen_anh_dai_dien'],
                'truyen_tinh_trang' => $row['truyen_tinh_trang'],
                'truyen_luot_xem' => $row['truyen_luot_xem'],
                'truyen_ngay_dang' => date('H:m:s d/m/Y',strtotime($row['truyen_ngay_dang'])),
                'truyen_trang_thai' => $row['truyen_trang_thai'],
                'chapter_id' => $row['chapter_id'],
                'chapter_ten' => $row['chapter_ten'],
                'chapter_so' => $row['chapter_so'],
            );
        }
?>
            <?php if(empty($data_truyen_da_thich)):?>
            Bạn chưa thích truyện nào cả!
            <?php else:?>
            <!-- truyen-da-hoan-thanh -->
            <a href="#">
                <div class="section-title color-5">TRUYỆN ĐÃ THÍCH</div>
            </a>
            <?php foreach($data_truyen_da_thich as $item):?>

            <div class="item-medium">
                <a
                    href="/truyen-cover?truyen-manga=noi-dung-chapter&truyen_id=<?=$item['truyen_id']?>&chapter_id=<?=$item['chapter_id']?>&chapter_so=<?=$item['chapter_so']?>">
                    <div class="item-thumbnail">
                        <img src="/truyen-cover/assets/uploads/<?=$item['truyen_anh_dai_dien']?>">
                        <span class="background-5"><?=$item['chapter_so']?> <i class="fa-solid fa-bookmark"></i></span>
                    </div>
                </a>
                <a
                    href="/truyen-cover?truyen-manga=noi-dung-chapter&truyen_id=<?=$item['truyen_id']?>&chapter_id=<?=$item['chapter_id']?>&chapter_so=<?=$item['chapter_so']?>">
                    <h3 class="item-title"><?=$item['truyen_ten']?></h3>
                </a>
            </div>
            <?php endforeach?>
            <?php endif?>
        </section>
    </div>
</div>