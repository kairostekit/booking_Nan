<?php
    include('../../conn.php');
    $id = $_GET['id'];
    $sql = "SELECT * FROM tb_book 
    JOIN tb_user ON tb_book.user_id = tb_user.user_id JOIN tb_room ON tb_book.room_id = tb_room.room_id LEFT JOIN slip ON slip.book_id = tb_book.book_id  
    WHERE tb_book.book_id = $id ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    switch ($row['book_status']) {
        case 0:
            $txt = 'รอการชำระเงิน';
            $click = 'return false;';
            break;
        
        case 1:
            $txt = 'ยืนยันการชำระเงิน';
            $click = '';
            break;
        case 2:
            $txt = 'ลงทะเบียนเข้าพัก';
            $click = '';
            break;
        case 3:
            $txt = 'คืนห้อง';
            $click = '';
            break;
        case 4:
            $txt = '---';
            $click = 'return false;';
            break;
    }

?>

<h2>จองห้องพัก</h2>
<form action="book_insert.php" method="post" onsubmit="return confirm('คุณต้องการทำรายการหรือไม่?')">
    <div>
        <label for="cusid">รหัสลูกค้า :</label>
        <input type="text" name="id" id="cusid" value="<?= $id ?>" readonly>
    </div>
    <div>
        <label for="name">ชื่อสกุล :</label>
        <input type="text" name="name" id="name" value="<?= $row['user_name'] ?>" readonly>
    </div>
    <div>
        <label for="person">จำนวนผู้เข้าพัก :</label>
        <input type="text" name="person" id="person" value="ผู้ใหญ่ <?= $row['book_man'] ?> เด็ก <?= $row['book_child'] ?>" readonly>
    </div>
    <div>
        <label for="datein">วันเข้าพัก :</label>
        <input type="text" name="datein" id="datein" value="<?= $row['book_in'] ?> ถึง <?= $row['book_out'] ?>" readonly>
    </div>
    <div>
        <label for="type">ประเภทห้อง :</label>
        <input type="text" name="type" id="type" value="<?= $row['room_name'] ?>" readonly>
    </div>
    
    <div>
        <label for="roomTotal">จำนวนห้อง :</label>
        <input type="text" name="roomTotal" id="roomTotal" value="<?= $row['book_total'] ?>" readonly>
    </div>                        
    <div>
        <label for="total">หลักฐานการโอนเงิน :</label>
        <div class="slip" >
            <?php if($row['slip_path'] != null) { ?>
            <a href="../<?= $row['slip_path'] ?>"><img src="../<?= $row['slip_path'] ?>"></a>
            <?php }else { ?>
                <h2>หลักฐานการโอนเงิน</h2>
            <?php } ?>
        </div>
    </div>
    <input type="hidden" name="stat" value=<?= $row['book_status'] ?>>
    <input type="hidden" name="mail" value=<?= $row['user_mail'] ?>>
    <div class="button">
        
        <button type="submit" name="id" value="<?= $row['book_id'] ?>" onclick="<?= $click ?>"><?= $txt ?></button>
        <!-- <button type="reset" onclick="document.getElementById('modal-cusInsert').style.display = 'block'">เพิ่มข้อมูลลูกค้า</button> -->
    </div>
</form>