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
    <title>Web Booking</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="asset/css/style.css">
</head>
<body>
   <!-- NavBar -->
   <?php
      if(isset($user)) {
        echo '
          <div class="nav">
             <nav>
                 <div class="logo"><img src="asset/images/logo/logo2.png"></div>
                 <ul>
                     <li><a href="index.php"><img src="asset/images/icons/icon _house_.png"> หน้าแรก</a></li>
                     <li><a href="stay.php"><img src="asset/images/icons/icon _building_.png"> เข้าพัก</a></li>
                     <li><a href="promo.php"><img src="asset/images/icons/icon _ticket_.png"> โปรโมชัน</a></li>
                     <li><a href="interest.php"><img src="asset/images/icons/icon _heart_.png"> สิ่งที่หน้าสนใจ</a></li>
                     <li><a href="contact.php"><img src="asset/images/icons/icon _message_.png"> ติดต่อ</a></li>
                     <li><a class="social" href="https://www.facebook.com/manor888"><img src="asset/images/icons/facebook.png"></a></li>
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

             <img src="asset/images/material/nav_bg.png" alt="nav_bg">
          </div>
        ';
      }else {
        echo '
          <div class="nav">
              <nav>
                  <div class="logo"><img src="asset/images/logo/logo2.png"></div>
                  <ul>
                      <li><a href="index.php"><img src="asset/images/icons/icon _house_.png"> หน้าแรก</a></li>
                      <li><a href="stay.php"><img src="asset/images/icons/icon _building_.png"> เข้าพัก</a></li>
                      <li><a href="promo.php"><img src="asset/images/icons/icon _ticket_.png"> โปรโมชัน</a></li>
                      <li><a href="interest.php"><img src="asset/images/icons/icon _heart_.png"> สิ่งที่หน้าสนใจ</a></li>
                      <li><a href="contact.php"><img src="asset/images/icons/icon _message_.png"> ติดต่อ</a></li>
                      <!-- <li><a href="#"><img src="asset/images/icons/icon _write_.png"> รายการจอง</a></li> -->
                      <li><a class="social" href="https://www.facebook.com/manor888"><img src="asset/images/icons/facebook.png"></a></li>
                      <li><a class="social" href="https://line.me/th/"><img src="asset/images/icons/line.png"></a></li>
                      <li><a href="login.php"><img src="asset/images/icons/icon _profile_circle2_.png"> Login</a></li>
                  </ul>
        
              </nav>
        
              <img src="asset/images/material/nav_bg.png" alt="nav_bg">
          </div>        
        ';
      }
   ?>

   <!-- Banner -->
   <div id="banner" class="banner">

     <div class="slide">
        
        <img src="asset/images/index/in1.jpg" alt="banner1">  
        <img src="asset/images/index/in1.jpg" alt="banner1">        
        <img src="asset/images/index/in1.jpg" alt="banner1">
       
     </div>

      <div class="search-room">
       <form action="stay.php" method="post">
         <div class="top">
           <div class="item">
              <label for="checkin"><img src="asset/images/icons/icon _calendar_.svg"></label>
              <input type="date" id="checkin" name="checkin_date">
              <p>ถึง</p>
              <input type="date" id="checkout" name="checkout_date">
           </div>
           <div class="item">
             <label for="man"><img src="asset/images/icons/icon _user_.svg"></label>
             <select name="man" id="man">
               <option value="0">ผู้ใหญ่</option>
               <?php
                for ($i=1; $i < 11; $i++) { 
                  echo '<option value="'.$i.'">'.$i.'</option>';
                }
               ?>
             </select>
             <select name="child" id="child">
               <option value="0">เด็ก</option>
               <?php
                for ($i=1; $i < 11; $i++) { 
                  echo '<option value="'.$i.'">'.$i.'</option>';
                }
               ?>
             </select>
           </div>
         </div>
         <div class="bottom">
           <div class="service">
             <div class="item">
               <div class="icon"><img src="asset/images/icons/white.png"></div>
               <span>WIFI</span>
             </div>
             <div class="item">
               <div class="icon"><img src="asset/images/icons/water_flash_icon.png"></div>
               <span>น้ำอุ่น</span>
             </div>
             <div class="item">
               <div class="icon"><img src="asset/images/icons/dinner_dish_plate_restaurant_icon.png"></div>
               <span>Dinner</span>
             </div>
             <div class="item">
               <div class="icon"><img src="asset/images/icons/tv_sharp_icon.png"></div>
               <span>TV</span>
             </div>
             <div class="item">
               <div class="icon"><img src="asset/images/icons/car_lot_park_parking_roadsign_icon.png"></div>
               <span>ที่จอดรถ</span>
             </div>
             <div class="item">
               <div class="icon"><img src="asset/images/icons/shop_market_sale_icon.png"></div>
               <span>ร้านค้า</span>
             </div>
           </div>

           <button type="submit">ค้นหา</button>

         </div>
       </form>
     </div>
    </div>


  <!-- Section Slide -->
  <section class="slide">

    <h1>ข้อเสนอที่คุณเลือกได้</h1>

    <div class="top">
      <div class="swiper swiper-top">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <img src="asset/images/room/twin1.jpg">
            <p>Manor Room 3</p>
            <p>(เตียงใหญ่สำหรับ 2 คน)</p>
            <div>
              <span>เข้าพัก 1 เดือน</span>
              <span>4000.-</span>
            </div>
          </div>

          <div class="swiper-slide">
            <img src="asset/images/room/single1.jpg">
            <p>Manormal Room 3</p>
            <p>(เตียงใหญ่สำหรับ 2 คน)</p>
            <div>
              <span>เข้าพัก 1 เดือน</span>
              <span>5500.-</span>
            </div>
          </div>

          <div class="swiper-slide">
            <img src="asset/images/room/twin1.jpg">
            <p>Manor Room 3</p>
            <p>(เตียงใหญ่สำหรับ 2 คน)</p>
            <div>
              <span>เข้าพัก 1 เดือน</span>
              <span>4000.-</span>
            </div>
          </div>

          <div class="swiper-slide">
            <img src="asset/images/room/single1.jpg">
            <p>Manormal Room 3</p>
            <p>(เตียงใหญ่สำหรับ 2 คน)</p>
            <div>
              <span>เข้าพัก 1 เดือน</span>
              <span>5500.-</span>
            </div>
          </div>

          <div class="swiper-slide">
            <img src="asset/images/room/twin1.jpg">
            <p>Manor Room 3</p>
            <p>(เตียงใหญ่สำหรับ 2 คน)</p>
            <div>
              <span>เข้าพัก 1 เดือน</span>
              <span>4000.-</span>
            </div>
          </div>

          <div class="swiper-slide">
            <img src="asset/images/room/single1.jpg">
            <p>Manormal Room 3</p>
            <p>(เตียงใหญ่สำหรับ 2 คน)</p>
            <div>
              <span>เข้าพัก 1 เดือน</span>
              <span>5500.-</span>
            </div>
          </div>

          <div class="swiper-slide">
            <img src="asset/images/room/twin1.jpg">
            <p>Manor Room 3</p>
            <p>(เตียงใหญ่สำหรับ 2 คน)</p>
            <div>
              <span>เข้าพัก 1 เดือน</span>
              <span>4000.-</span>
            </div>
          </div>

          <div class="swiper-slide">
            <img src="asset/images/room/single1.jpg">
            <p>Manormal Room 3</p>
            <p>(เตียงใหญ่สำหรับ 2 คน)</p>
            <div>
              <span>เข้าพัก 1 เดือน</span>
              <span>5500.-</span>
            </div>
          </div>

        </div>
      </div>
      <div class="swiper-dot"></div>
    </div>

  </section>

  <!-- Section Gallary -->
  <section class="gallary">

    <h1>แหล่งที่น่าสนใจ</h1>

    <div class="container">

      <div class="item">
        <img src="asset/images/recommanded/pa.jpg" >
        <h1>อุทยานแมลงเฉลิมพระเกียรติพระบาทสมเด็จพระเจ้าอยู่หัว</h1>
        <p>สถานที่สวยงาม
          ห่างจากที่พักประมาณ 11 ก.ม
          ลิ้งค์ Google maps
        </p>
      </div>

      <div class="right">

        <div class="top">

          <div class="item">
            <img src="asset/images/recommanded/as.jpg" >
            <h1>อุโมงค์ชมพูพันธุ์ทิพย์ มหาวิทยาลัยเกษตรศาสตร์ กำแพงแสน</h1>
            <p>
              ห่างจากที่พักประมาณ 6.5 ก.ม
              ลิ้งค์ Google maps
            </p>
          </div>

          <div class="item">
            <img src="asset/images/recommanded/r4.jpg" >
            <h1>ตลาดคุณาวรรณ</h1>
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

  <!-- Section About -->
  <section class="about">

    <h1>รายละเอียดที่พัก</h1>

    <div class="container">

      <div class="info">

        

        <div class="text">
          <p>
          </p>
        </div>

        <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3870.9695270307398!2d99.9898724749105!3d14.019820691032116!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e2f1342d04d6e1%3A0x6111c6e4245323b9!2z4Lir4Lit4Lie4Lix4LiB4LmB4Lih4LmA4LiZ4Lit4Lij4LmMIOC4iuC4oeC4oOC4ueC4nuC4h-C4qOC5jA!5e0!3m2!1sth!2sth!4v1698306834110!5m2!1sth!2sth" style="border:0;" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

      </div>

      <div class="contact">
        <h1>ติดต่อสอบถาม</h1>
        <div>
          <a href="#"><img src="asset/images/icons/icon _call calling_.png" >096-994-5944</a>
          <a href="#"><img src="asset/images/icons/line2.png" >@934omtkx</a>
          <a href="https://www.facebook.com/manor888"><img src="asset/images/icons/facebook2.png" >Facebook</a>
        </div>
      </div>

    </div>


  </section>

  <!-- Section Review -->
  <section class="review">

    <h1>รีวิวจากลูกค้า</h1>

    <div class="gallary">
      <img src="asset/images/pictures/ll 1.png" >
      <img src="asset/images/pictures/ll 1.png" >
      <img src="asset/images/pictures/ll 1.png" >
      <img src="asset/images/pictures/ll 1.png" >
    </div>

  </section>



  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
  <script>

    document.addEventListener("DOMContentLoaded", function() {
        var today = new Date().toISOString().split('T')[0];
        document.getElementById("checkin").setAttribute('min', today);

        document.getElementById("checkin").addEventListener("change", function() {
            var checkinDate = this.value;
            document.getElementById("checkout").setAttribute("min", checkinDate);
        });
    });

    // var swiper = new Swiper(".swiper", {
    //   // centeredSlides: true,
    //   autoplay: {
    //     delay: 2500,
    //     disableOnInteraction: false
    //   }
    // });

    var swiper = new Swiper(".swiper-top", {
      slidesPerView: 4,
      spaceBetween: 30,
      // centeredSlides: true,
      pagination: {
          el: ".swiper-dot",
          dynamicBullets: true,
          clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      loop:true,
    });

    var swiper = new Swiper(".swiper-bottom", {
      slidesPerView: 4,
      spaceBetween: 30,
      // centeredSlides: true,
      pagination: {
        el: ".swiper-pagination",
        dynamicBullets: true,
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      loop:true,
    });

    const navbar = document.getElementsByTagName('nav')[0];
    window.addEventListener("scroll", function() {
        if (window.scrollY > 0) {
          navbar.classList.add('active');
        } else {
          navbar.classList.remove('active');
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