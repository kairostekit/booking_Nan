<?php
session_start();
if(isset($_SESSION['user'])){
  $user = $_SESSION['user'];  
}
?>
<!DOCTYPE php>
<php lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interest</title>
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
                           <a href="#"><img src="asset/images/icons/edit.png">ข้อมูลส่วนตัว</a>
                           <a href="#"><img src="asset/images/icons/account_edit.png">จัดการบัญชี</a>
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
    ?><?php
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

    <section class="grid-image">
        <h1>สิ่งที่น่าสนใจในสถานที่ใกล้เคียง</h1>

        <div class="container">
            <a href="asset/images/recommanded/r8.jpg">
                <div class="item">
                    <img src="asset/images/recommanded/r8.jpg" >
                    <div class="text">
                        <h2>สวนน้ำหนองกระทุ่ม</h2>
                        <p>ห่างจากที่พักประมาณ 11 ก.ม</p>
                    </div>
                </div>
            </a>

            <a href="asset/images/recommanded/P03025554_1.jpeg">
                <div class="item">
                    <img src="asset/images/recommanded/P03025554_1.jpeg" >
                    <div class="text">
                        <h2>วัดประชาราษฎร์บำรุง (วัดรางหมัน)</h2>
                        <p>ห่างจากที่พักประมาณ 11 ก.ม</p>
                    </div>
                </div>
            </a>

            <a href="asset/images/recommanded/as.jpg">
                <div class="item">
                    <img src="asset/images/recommanded/as.jpg" >
                    <div class="text">
                        <h2>อุโมงค์ชมพูพันธุ์ทิพย์ มหาวิทยาลัยเกษตรศาสตร์ กำแพงแสน</h2>
                        <p>ห่างจากที่พักประมาณ 11 ก.ม</p>
                    </div>
                </div>
            </a>

            <a href="asset/images/recommanded/r10.jpg">
                <div class="item">
                    <img src="asset/images/recommanded/r10.jpg" >
                    <div class="text">
                        <h2>สวนกล้วยไม้สุวรรณภูมิ ออร์คิดส์</h2>
                        <p>ห่างจากที่พักประมาณ 11 ก.ม</p>
                    </div>
                </div>
            </a>

            <a href="asset/images/recommanded/r4.jpg">
                <div class="item">
                    <img src="asset/images/recommanded/r4.jpg" >
                    <div class="text">
                        <h2>ตลาดคุณาวรรณ</h2>
                        <p>ห่างจากที่พักประมาณ 11 ก.ม</p>
                    </div>
                </div>
            </a>

            <a href="asset/images/recommanded/pa.jpg">
                <div class="item">
                    <img src="asset/images/recommanded/pa.jpg" >
                    <div class="text">
                        <h2>อุทยานแมลงเฉลิมพระเกียรติพระบาทสมเด็จพระเจ้าอยู่หัว</h2>
                        <p>ห่างจากที่พักประมาณ 11 ก.ม</p>
                    </div>
                </div>
            </a>

        </div>

    </section>

    <section class="gallary">

        <h1>แหล่งที่น่าสนใจ</h1>
    
        <div class="container">
    
          <div class="item">
            <img src="asset/images/recommanded/pa.jpg" >
            <h1>อุทยานแมลงเฉลิมพระเกียรติพระบาทสมเด็จพระเจ้าอยู่หัว</h1>
            <p>สถานที่ท่องเที่ยว
              ห่างจากที่พักประมาณ 11 ก.ม
              ลิ้งค์ Google maps
            </p>
          </div>
    
          <div class="right">
    
            <div class="top">
    
              <div class="item">
                <img src="asset/images/recommanded/r4.jpg" >
                <h1>ตลาดคุณาวรรณ</h1>
                <p>
                  ห่างจากที่พักประมาณ 6.5 ก.ม
                  ลิ้งค์ Google maps
                </p>
              </div>
    
              <div class="item">
                <img src="asset/images/recommanded/as.jpg" >
                <h1>อุโมงค์ชมพูพันธุ์ทิพย์ มหาวิทยาลัยเกษตรศาสตร์ กำแพงแสน</h1>
                <p>
                  ห่างจากที่พักประมาณ 6.5 ก.ม
                  ลิ้งค์ Google maps
                </p>
              </div>
    
    
            </div>
    
            <div class="bottom">
              <div class="item">
                <img src="asset/images/recommanded/P03025554_1.jpeg" >
                <div class="info">
                  <h1>วัดประชาราษฎร์บำรุง (วัดรางหมัน)</h1>
                  <p>
                    ห่างจากที่พักประมาณ 11 ก.ม
                    ลิ้งค์ Google maps
                  </p>
                </div>
              </div>
            </div>
    
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