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
    <title>Booking List</title>
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


    

    <section class="profile account">
        <div class="menu">
            <a href="profile.php">ข้อมูลส่วนตัว</a>              
            <a href="account.php">จัดการบัญชี</a>
            <a href="booklist.php">รายการจอง</a>
        </div>
        <div class="info">
            <h1>รายการจอง</h1>
            <p>ดูประวัติการจองห้องพัก และรายละเอียดต่างๆ ของห้องพัก</p>
            <div class="booking-list">
            <?php

                $sql = "SELECT * 
                FROM tb_book JOIN tb_room ON tb_book.room_id = tb_room.room_id JOIN tb_room_img ON tb_room_img.room_id = tb_room.room_id
                WHERE user_id = {$user['user_id']}
                GROUP BY book_id
                ORDER BY book_id DESC";

                $rs = $conn->query($sql);
                
                while($col = $rs->fetch_assoc()) {
                    switch ($col['book_status']) {
                        case 0:
                            $status = 'รอชำระเงิน';
                            $color = 'danger';
                            $link = 'payment.php?bookid='.$col['book_id'];
                            break;
                        case 1:
                            $status = 'กำลังตรวจสอบ';
                            $color = 'infocolor';
                            $link = '#';
                            break;
                        case 2:
                            $status = 'รอเข้าพัก';
                            $color = 'success';
                            $link = '#';
                            break;
                        case 3:
                            $status = 'กำลังเข้าพัก';
                            $color = 'infocolor';
                            $link = '#';
                            break;
                        case 4:
                            $status = 'เสร็จสิ้น';
                            $color = 'dark';
                            $link = '#';
                            break;
                    }
                    if($col['room_sale'] > 0) {
                        $netPrice = $col['book_total'] * ($col['room_price']  * (($col['room_sale'] ?? 100)/100));
                        $price = '
                            <s>'.$col['room_price'].' บาท</s>
                            <p>'.$netPrice.' บาท</p>
                        ';
                    }else {
                        $price = '
                            <p>'.$col['room_price'].' บาท</p>
                        ';
                    }

                    echo '
                        <div class="booking-card">
                            <div class="row">
                                <img src="asset/images/'.$col['room_img_path'].'" >
                                <div class="data">
                                    <h3>'.$col['room_name'].'</h3>
                                    <div class="in-out">
                                        <p>เช็คอิน <span>'.$col['book_in'].'</span></p>
                                        <p>เช็คเอาท์ <span>'.$col['book_out'].'</span></p>
                                    </div>
                                </div>
                                <div class="tail">
                                    <div class="price">
                                        '.$price.'
                                    </div>
                                    <a href="'.$link.'"><p class="'.$color.'">'.$status.'</p></a>
                                </div>
                            </div>
                        </div>
                    
                    ';

                }
            ?>
               
            </div>
           
        </div>
    </section>




    <script>
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