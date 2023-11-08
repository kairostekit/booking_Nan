<?php
    include('conn.php');

    $type = $_POST['type'];
    if($type == 0) {
        $sql = "SELECT * FROM tb_room";
    }else {
        $sql = "SELECT * FROM tb_room WHERE room_type = '$type'";
    }

    $rs = $conn->query($sql);
    while($col = $rs->fetch_assoc()) {
        $sqlImg = 'SELECT * FROM tb_room_img WHERE room_id = '.$col['room_id'].' LIMIT 1';
        $rsImg = $conn->query($sqlImg);
        $row = $rsImg->fetch_assoc();
        switch ($col['room_bed']) {
            case 1:
                $bed = 'เตียงเดี่ยว';
                break;
            
            case 2:
                $bed = 'เตียงคู่';
                break;
        }
        if($col['room_sale'] != 0) {
            $discountAmount = ($col['room_price'] * $col['room_sale']) / 100;
            $discountedPrice = $col['room_price'] - $discountAmount;
        } else {
            $discountedPrice = $col['room_price'];
            $discountAmount = 0;
        }
        echo '
            <form action="identity.php?room_id='.$col['room_id'].'" method="post">
            <div class="item">
                <span>'.$col['room_id'].'</span>
                <img src="asset/images/'.$row['room_img_path'].'" >
        
                <div class="info">
                    <h2>'.$col['room_name'].'</h2>
                    <div class="line">
                        <p>'.$bed.'</p>                                        
                    </div>
                    <ul>
                        <li>มีสิ่งอำนวยความสะดวก</li>
                        <li>ไม่สามารถขอเงินคืนได้</li>
                        <li>จองล่วงหน้า</li>
                    </ul>
                    <div class="grid">
                        <p><img src="asset/images/icons/right_arrow_direction_left_icon.svg"> มีร้านสะดวกชื้อ</p>
                        <p><img src="asset/images/icons/right_arrow_direction_left_icon.svg"> เครื่องปรับอากาศ</p>
                        <p><img src="asset/images/icons/right_arrow_direction_left_icon.svg"> ห้องน้ำส่วนตัว</p>
                        <p><img src="asset/images/icons/right_arrow_direction_left_icon.svg"> ทีวี</p>
                        <p><img src="asset/images/icons/right_arrow_direction_left_icon.svg"> กาน้ำร้อน</p>
                        <p><img src="asset/images/icons/right_arrow_direction_left_icon.svg"> ฟรีไวไฟ</p>
                        <p><img src="asset/images/icons/right_arrow_direction_left_icon.svg"> ที่จอดรถ</p>
                    </div>
                </div>
        
                <div class="room-total">
        
                    <span>เลือกจำนวนห้อง</span>
                    <select name="roomTotalSelection" class="roomTotal">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
        
                </div>
                <div class="price">
                    <div class="detail">'
                    .($col['room_sale'] != 0 ? "<s>{$col['room_price']} บาท</s>" : "").'                                   
                    <h2>'.$discountedPrice.' บาท</h2>
                    <p>รวมภาษีและค่าธรรมเนียมต่างๆ</p>
                    '.($col['room_sale'] != 0 ? "<h3>SALE {$col['room_sale']}%</h3>" : "").'
                    </div>
                    <button type="submit">จอง</button>
                </div>
            </div>
            </form>

        ';
    }
?>