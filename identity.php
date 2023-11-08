<?php
session_start();
include('conn.php');

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $sql = 'SELECT * FROM tb_user WHERE user_id =' . $user['user_id'];
    $rs = $conn->query($sql);
    $col = $rs->fetch_assoc();
}
$checkinDate = $_POST['checkin'] ?? null;
// echo "วันที่เช็คอิน: " . $checkinDate . "<br>";
$checkoutDate = $_POST['checkout'] ?? null;
// echo "วันที่เช็คเอาท์: " . $checkoutDate . "<br>";
$man = $_POST['man'] ?? null;
// echo "จำนวนผู้ใหญ่: " . $man . "<br>";
$child = $_POST['child'] ?? null;
// echo "จำนวนเด็ก: " . $child . "<br>";
$roomId = $_GET['room_id'] ?? null;
// echo "หมายเลขห้อง: " . $roomId . "<br>";
$roomTotal = $_POST['roomTotal'] ?? null;
// echo "จำนวนห้องที่เลือก: " . $roomTotal . "<br>";





$sql_room = "SELECT * FROM `tb_room` WHERE room_id = '$roomId'";
$rs_room = $conn->query($sql_room);
$dataroom_room = $rs_room->fetch_assoc();
$sql_count = "SELECT *  FROM `tb_book` WHERE room_id ='$roomId' AND  book_in >= '$checkinDate' AND book_out <= '$checkoutDate'";
$rs_count = $conn->query($sql_count);
$count_book = $rs_count->fetch_all();


if ($dataroom_room['room_type'] == 1) {
    $sum_rom = (int) 0;
    foreach ($count_book as $key => $item):
        $sum_rom = (int) $sum_rom + (int) $item[5];
    endforeach;

    $roDb = $dataroom_room['room_total'];
    $conu = $sum_rom;


    $aw = $roDb - $conu;
    $sux_ = $aw - $roomTotal;
    if ($sux_ < 0) {
        echo "<script>alert('ห้องเต็ม($checkinDate - $checkoutDate) !! กรุณาเลือกวันเวลาใหม่') ; location.assign('stay.php')</script>";
    } else {

    }
    die();
}


?>
<!DOCTYPE php>
<php lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Booking</title>
        <link rel="stylesheet" href="asset/css/style.css">
    </head>

    <body>

        <!-- NavBar -->
        <?php
        if (isset($user)) {
            echo '
           <div class="nav">
              <nav class="active">
              <div class="logo"><img src="asset/images/logo/logo2.png"></div>        
                  <ul>
                      <li><a href="index.php"><img src="asset/images/icons/icon _house_.png"> หน้าแรก</a></li>
                      <li><a href="stay.php"><img src="asset/images/icons/icon _building_.png"> เข้าพัก</a></li>
                      <li><a href="promo.php"><img src="asset/images/icons/icon _ticket_.png"> โปรโมชัน</a></li>
                      <li><a href="interest.php"><img src="asset/images/icons/icon _heart_.png"> สิ่งที่หน้าสนใจ</a></li>
                      <li><a href="contact.php"><img src="asset/images/icons/icon _message_.png"> ติดต่อ</a></li>
                      <li><a class="social" href="https://web.facebook.com/"><img src="asset/images/icons/facebook.png"></a></li>
                      <li><a class="social" href="https://line.me/th/"><img src="asset/images/icons/line.png"></a></li>
                      <li class="dropdown" onclick="showDropDown()">
                       <img  src="asset/images/icons/nav_profile.png">
                       <div id="dropdown" class="hide">
                           <div class="profile">
                               <img src="asset/images/icons/nav_profile.png">
                               <div>
                                   <p>ID: ' . $user['user_id'] . '</p>
                                   <p>' . $user['user_uname'] . '</p>
                               </div>
                           </div>
                            <a href="profile.php"><img src="asset/images/icons/edit.png">ข้อมูลส่วนตัว</a>
                            <a href="account.php"><img src="asset/images/icons/account_edit.png">จัดการบัญชี</a>
                            <a href="logout.php"><img src="asset/images/icons/logout.png">ออกจากระบบ</a>
                       </div>
                       </li>
                  </ul>
              </nav>

           </div>
         ';
        } else {
            echo '
           <div class="nav">
               <nav class="active">
               <div class="logo"><img src="asset/images/logo/logo2.png"></div>
                   <ul>
                       <li><a href="index.php"><img src="asset/images/icons/icon _house_.png"> หน้าแรก</a></li>
                       <li><a href="stay.php"><img src="asset/images/icons/icon _building_.png"> เข้าพัก</a></li>
                       <li><a href="promo.php"><img src="asset/images/icons/icon _ticket_.png"> โปรโมชัน</a></li>
                       <li><a href="interest.php"><img src="asset/images/icons/icon _heart_.png"> สิ่งที่หน้าสนใจ</a></li>
                       <li><a href="contact.php"><img src="asset/images/icons/icon _message_.png"> ติดต่อ</a></li>
                       <!-- <li><a href="#"><img src="asset/images/icons/icon _write_.png"> รายการจอง</a></li> -->
                       <li><a class="social" href="https://web.facebook.com/"><img src="asset/images/icons/facebook.png"></a></li>
                       <li><a class="social" href="https://line.me/th/"><img src="asset/images/icons/line.png"></a></li>
                       <li><a href="login.php"><img src="asset/images/icons/icon _profile_circle2_.png"> Login</a></li>
                   </ul>

               </nav>
         
           </div>        
         ';
        }
        ?>


        <?php


        ?>


        <section class="booking">
            <a href="stay.php">ย้อนกลับ</a>
            <form action="book_insert.php" method="post">
                <div class="info">
                    <div class="inputbox">
                        <label for="id">เลขบัตรประจำตัวประชาชน*</label>
                        <input type="text" name="id" id="id" value="<?= isset($user) ? $col['user_personalid'] : "" ?>">
                    </div>
                    <div class="inputbox">
                        <label for="name">ชื่อ-สกุล*</label>
                        <input type="text" name="name" id="id" value="<?= isset($user) ? $col['user_name'] : "" ?>">
                    </div>
                    <div class="inputbox">
                        <label for="mail">อีเมล*</label>
                        <input type="text" name="mail" id="mail" value="<?= isset($user) ? $col['user_mail'] : "" ?>">
                    </div>
                    <div class="inputbox">
                        <label for="tel">หมายเลขโทรศัพท์*</label>
                        <input type="text" name="tel" id="tel" value="<?= isset($user) ? $col['user_tel'] : "" ?>">
                    </div>
                    <div class="inputbox">
                        <label for="address">ทีอยู่ที่สามารถติดต่อได้*</label>
                        <input type="text" name="address" id="address"
                            value="<?= isset($user) ? $col['user_address'] : "" ?>">
                    </div>
                    <div class="inputbox">
                        <label for="region">ประเทศ*</label>
                        <input type="text" name="region" id="region"
                            value="<?= isset($user) ? $col['user_region'] : "" ?>">
                    </div>
                    <input type="hidden" name="checkin" value="<?= $checkinDate ?>">
                    <input type="hidden" name="checkout" value="<?= $checkoutDate ?>">
                    <input type="hidden" name="man" value="<?= $man ?>">
                    <input type="hidden" name="child" value="<?= $child ?>">
                    <input type="hidden" name="roomId" value="<?= $roomId ?>">
                    <input type="hidden" name="roomTotal" value="<?= $roomTotal ?>">
                </div>
                <div class="rule">
                    <div>
                        <div class="item">
                            <h3>ข้อกำหนดของที่พัก</h3>
                            <ul>
                                <li>ไม่อนุญาตให้นำสัตว์เลี้ยงเข้าพัก</li>
                                <li>ห้ามสูบบุหรี่ในห้อง</li>
                            </ul>
                        </div>
                        <div class="item">
                            <h3>รายละเอียดการจอง</h3>
                            <p>
                                เพื่อทำการจองห้องพักไปแล้ว กรณียกเลิกการจอง ต้องไม่เกิน 24 ช.ม.
                                หลังจากทำการจองไปแล้ว หากเกินกำหนดทางที่พักจะไม่คืนมัดจำให้
                            </p>
                        </div>
                        <div class="item">
                            <h3>รายละเอียดเวลาเช็คอิน-เช็คเอ้าท์</h3>
                            <p>เช็คอิน : 10:00น. ถึง 19:30น.</p>
                            <p>เช็คเอาท์ : ดำเนินการก่อน 12:00 น.</p>
                            <p>พนักงานต้อนรับ 10:00น. ถึง 20:00น.</p>
                        </div>
                    </div>
                    <button type="submit" name="user_id" value="<?= $user['user_id'] ?>">ขั้นต่อไป</button>
                </div>
            </form>
        </section>



        <script>
            let dropdown = document.getElementsByClassName('dropdown')[0];
            let dropdownList = document.getElementById('dropdown');

            function showDropDown() {
                if (dropdownList.classList.contains('show-flex')) {
                    dropdownList.classList.remove('show-flex');
                    dropdownList.classList.add('hide');
                } else {
                    dropdownList.classList.add('show-flex');
                    dropdownList.classList.remove('hide');
                }
            }
        </script>

    </body>
</php>