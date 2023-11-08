<?php

    session_start();
    if(isset($_SESSION['user'])){
      $user = $_SESSION['user'];  
    }
    include('conn.php');

?>
<!DOCTYPE php>
<php lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="asset/css/style.css">
</head>
<body>

    <!-- NavBar -->
    <?php
       if(isset($user)) {
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
                                   <p>ID: '.$user['user_id'].'</p>
                                   <p>'.$user['user_uname'].'</p>
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
       }else {
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

    
    <section class="booking">
        <!-- <a href="#">ย้อนกลับ</a> -->
        <?php

            $sql = "SELECT * FROM tb_book 
            JOIN tb_room 
            ON tb_book.room_id = tb_room.room_id 
            WHERE user_id = {$user['user_id']} AND book_id = {$_GET['bookid']}
            ORDER BY book_id DESC LIMIT 1";

            $rs = $conn->query($sql);
            $col = $rs->fetch_assoc();
            $bookIn = new DateTime($col['book_in']);
            $bookOut = new DateTime($col['book_out']);
            
            $roomType = $col['room_type'];
            if($roomType == 1) {
                $interval = $bookIn->diff($bookOut);
                $count = $interval->days;
            }else{
                $interval = $bookIn->diff($bookOut);                            
                $count = $interval->y * 12 + $interval->m;
            }

            if($count == 0) {
                $count = 1;
            }
            
            $price = $col['book_total'] * $col['room_price'];
            $sale = ($col['room_price']  * (($col['room_sale'])/100));
            $netPrice = $count * ($col['book_total'] * ($col['room_price'] - ($col['room_price']  * (($col['room_sale'])/100))));

        ?>
        <form class="payment" action="payment_insert.php" method="post" enctype="multipart/form-data">
           <h1>วิธีการชำระเงิน</h1>
           <p id="currentDateTime"><?= date('d/m/Y H:i:s') ?></p>
           <div class="detail">
           <div class="row">
                <p>ระยะเวลา</p>
                <p><?= $col['book_in'] ?> ถึง <?= $col['book_out'] ?></p>
            </div>
            <div class="row">
                <p><?= $col['room_name'] ?></p>
                <p><?= $col['book_total'] ?> ห้อง</p>
                <p><?= $price ?> บาท</p>
            </div>
            <div class="row">
                <p>ส่วนลด</p>
                <!-- <p><?= $col['room_sale'] ?>%</p> -->
                <p><?= $sale ?> บาท</p>
            </div>
            <div class="row">
                <p>ราคาสุทธิ</p>
                <p><?= number_format($netPrice) ?> บาท</p>
            </div>
           </div>
           <div class="pay">
                <div>
                    <img src="asset/images/pictures/qrcode.jpg">
                    <div>
                        <p>ชื่อธนาคาร</p>
                        <p>ชื่อบัญชี</p>
                        <p>เลขบัญชี</p>
                    </div>
                </div>
                <div>
                    <label class="slip" for="slip">แนบหลักฐาน</label>
                    <div class="img">
                        <img id="imagePreview" src="#" >
                    </div>
                    <input type="file" class="hide" name="file" id="slip">
                </div>
           </div>
           <button type="submit" name="book_id" value="<?= $col['book_id'] ?>">เสร็จสิ้น</button>
        </form>
    </section>



    <script>

        document.addEventListener("DOMContentLoaded", function() {
            function updateDateTime() {
                let now = new Date();
                let formatted = now.toLocaleDateString("th-TH", {
                    day: "2-digit",
                    month: "2-digit",
                    year: "numeric",
                    hour: "2-digit",
                    minute: "2-digit",
                    second: "2-digit",
                    hour12: false,
                });
            
                document.getElementById("currentDateTime").innerText = formatted;
            }
        
            setInterval(updateDateTime, 1000);
        });

        document.getElementById('slip').addEventListener('change', function(e) {
            const file = e.target.files[0];

            if (file) {
                const reader = new FileReader();
            
                reader.onload = function(event) {
                    const imagePreview = document.getElementById('imagePreview');
                    imagePreview.src = event.target.result;
                    imagePreview.style.display = 'block';
                }
            
                reader.readAsDataURL(file);
            }
        });

        let dropdown = document.getElementsByClassName('dropdown')[0];
        let dropdownList = document.getElementById('dropdown');
       
        function showDropDown() {
            if(dropdownList.classList.contains('show-flex')) {
                dropdownList.classList.remove('show-flex');
                dropdownList.classList.add('hide');
            }else {
                dropdownList.classList.add('show-flex');
                dropdownList.classList.remove('hide');
            }
        }
    </script>
    
</body>
</php>