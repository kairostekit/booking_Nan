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
    <title>Account</title>
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
            <h1>จัดการบัญชี</h1>
            <p>ปรับการตั้งค่าบัญชีของผู้ใช้  เพื่อความปลอดภัยของบัญชี</p>
            <form action="account_update.php" method="post" onsubmit="return confirmSubmit();">
                <div>
                    <label for="userName">ชื่อผู้ใช้</label>
                    <input  type="text" name="userName" id="userName" value="<?= $user['user_uname'] ?> " readonly>
                </div>
                <div>
                    <label for="pass">รหัสผ่าน</label>
                    <input type="text" name="pass" id="pass" value="<?= $user['user_pass'] ?>">
                </div>
                
                <button type="submit">บันทึก</button>
            </form>
        </div>
    </section>




    <script>

        function confirmSubmit() {
            var r = confirm("คุณแน่ใจว่าต้องการบันทึกข้อมูลใช่หรือไม่?");
            if (r == true) {
                return true;
            } else {
                return false;
            }
        }

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