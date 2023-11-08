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
    <title>Contact</title>
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

   <section class="sec-contact">
       <h1>ช่องทางติดต่อ</h1>
       <div class="row">
           <div class="map">
               <div class="box">
               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3870.9695270307398!2d99.9898724749105!3d14.019820691032116!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e2f1342d04d6e1%3A0x6111c6e4245323b9!2z4Lir4Lit4Lie4Lix4LiB4LmB4Lih4LmA4LiZ4Lit4Lij4LmMIOC4iuC4oeC4oOC4ueC4nuC4h-C4qOC5jA!5e0!3m2!1sth!2sth!4v1698306834110!5m2!1sth!2sth" style="border:0;" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
               </div>
           </div>
           <div class="info">
               <!-- <h1>ช่องทางติดต่อ</h1> -->
               <img src="asset/images/icons/qrcode.png" alt="">
               <div class="contact">                
                 <div>
                   <a href="#"><img src="asset/images/icons/calling_.png" >096-994-5944</a>
                   <a href="#"><img src="asset/images/icons/line2.png" >@934omtkx</a>
                   <a href="https://www.facebook.com/manor888"><img src="asset/images/icons/facebook2.png" >Facebook</a>
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