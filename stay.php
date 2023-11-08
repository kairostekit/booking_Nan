<?php
    session_start();
    if(isset($_SESSION['user'])){
      $user = $_SESSION['user'];  
    }
    include('conn.php');
  
    $checkinDate = $_POST['checkin_date'] ?? null;
    $checkoutDate = $_POST['checkout_date'] ?? null;
    $men = $_POST['man'] ?? null;
    $child = $_POST['child'] ?? null;
 
?>
<!DOCTYPE php>
<php lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าพัก</title>
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


    <!-- Section Rest -->
    <section class="rest">

        <h1>ชื่อที่พัก</h1>

        <div class="images">
            <img src="asset/images/pictures/5.jpg" >
            <div class="gallary">
                <img src="asset/images/pictures/6.jpg" >
                <img src="asset/images/pictures/1.jpg" >
                <img src="asset/images/pictures/2.jpg" >
                <img src="asset/images/pictures/7.jpg" >
                <img src="asset/images/pictures/3.jpg" >
                <img src="asset/images/pictures/4.jpg" >
                
            </div>
        </div>

        <h1>สิ่งอำนวยความสะดวก</h1>

        <div class="info">
            <div class="service">
                <p><img src="asset/images/icons/right_arrow_direction_left_icon.svg">WIFI ฟรี</p>
                <p><img src="asset/images/icons/right_arrow_direction_left_icon.svg">ที่จอดรถฟรี</p>
                <p><img src="asset/images/icons/right_arrow_direction_left_icon.svg">บริการรูมเซอร์วิส</p>
                <p><img src="asset/images/icons/right_arrow_direction_left_icon.svg">บริการรับส่งสนามบิน</p>
                <p><img src="asset/images/icons/right_arrow_direction_left_icon.svg">บริการรถรับส่ง</p>
                <p><img src="asset/images/icons/right_arrow_direction_left_icon.svg">มีร้านสะดวกชื้อ</p>
                <p><img src="asset/images/icons/right_arrow_direction_left_icon.svg">บริการรับฝากสัมภาระ</p>
                <p><img src="asset/images/icons/right_arrow_direction_left_icon.svg">แผนกต้อนรับ (24 ชั่วโมง)</p>
            </div>

            <div class="rating">
                <div class="rating-star">
                    <img src="asset/images/icons/star_icon.svg">
                    <img src="asset/images/icons/star_icon.svg">
                    <img src="asset/images/icons/star_icon.svg">
                    <img src="asset/images/icons/star_icon.svg">
                    <img src="asset/images/icons/star_icon.svg">
                </div>
                <p>ดีมาก</p>
                <p>1,550 รีวิว</p>
            </div>
        </div>

    </section>


    <!-- Section Type -->
    
    <section class="type">

        <h1>ประเภทห้องพัก</h1>

        <div class="filter">
            
            <div class="buttons-box">
                <label class="selected" for="all">ทั้งหมด</label>
                <input type="radio" name="type" id="all" value="0" >
                <label class="" for="single">รายวัน</label>
                <input type="radio" name="type" id="single" value="1">
                <label for="twin">รายเดือน</label>
                <input type="radio" name="type" id="twin" value="2">                
            </div>

            <div class="selection-box">                
                <div class="item">
                    <label for="checkin"><img src="asset/images/icons/icon _calendar_.svg"></label>
                    <input type="date" id="checkin" name="checkin_date" value="<?= $checkinDate ?>">
                    <p>ถึง</p>
                    <input type="date" id="checkout" name="checkout_date" value="<?= $checkoutDate ?>">
                </div>
                <div class="item">
                  <label for="man"><img src="asset/images/icons/icon _user_.svg"></label>
                  <p>ผู้ใหญ่</p>
                  <select name="man" id="man">                    
                    <?php
                        echo '<option value="'.($men ?? "0").'">'.($men ?? "ผู้ใหญ่").'</option>';
                        for ($i=1; $i < 11; $i++) { 
                          echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                    ?>
                  </select>
                  <p>เด็ก</p>
                  <select name="child" id="child">
                    <?php
                        echo '<option value="'.($child ?? "0").'">'.($child ?? "เด็ก").'</option>';
                        for ($i=1; $i < 11; $i++) { 
                          echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                    ?>
                  </select>
                </div>
            </div> 

        </div>

        <div class="room-box">

            <div class="head">
                <h1>ประเภทห้อง</h1>
                <h1>เลือกห้อง</h1>
            </div>

            <div class="room">

                <?php

                    $sql = 'SELECT * FROM tb_room';

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
                                        <p><img src="asset/images/icons/right_arrow_direction_left_icon.svg"> ร้านสะดวกชื้อ</p>
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

            </div>

        </div>
        <p><img src="asset/images/icons/money-check-edit .png"> ไม่ต้องใช้บัตรเครดิตในการจอง เราจะส่งอีเมลยืนยันการจองของคุณ</p>

    </section>

    



    <footer>
    </footer>


       <script>
            function getSelectedBedValue() {
                const selectedBed = document.querySelector('input[name="type"]:checked');

                return selectedBed ? selectedBed.value : null;
            }

            function createHiddenInput(name, value) {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = name;
                input.value = value;
                return input;
            }


            // document.addEventListener('DOMContentLoaded', function() {
            //     const labels = document.querySelectorAll('.buttons-box label');
            //     const radios = document.querySelectorAll('.buttons-box input[type="radio"]');               

            
            //     labels.forEach(label => {
            //         label.addEventListener('click', function() {
            //             labels.forEach(l => l.classList.remove('selected')); 
            //             this.classList.add('selected'); 
            //         });
            //     });
            
            //     radios.forEach(radio => {
            //         radio.addEventListener('change', function() {
            //             if (this.checked) {
            //                 labels.forEach(l => l.classList.remove('selected')); 
            //                 document.querySelector(`label[for="${this.id}"]`).classList.add('selected'); 
            //             }

            //             const selectedValue = getSelectedBedValue();

            //             const xhttp = new XMLHttpRequest();
            //             xhttp.onload = function () {
            //                 document.getElementsByClassName("room")[0].innerHTML = this.responseText;
            //             }
            //             xhttp.open("POST", "stay_filter.php");
            //             xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            //             xhttp.send('type=' + selectedValue);                       
                        
            //         });
            //     });

            //     var today = new Date().toISOString().split('T')[0];
            //     document.getElementById("checkin").setAttribute('min', today);

            //     document.getElementById("checkin").addEventListener("change", function() {
            //         var checkinDate = this.value;
            //         document.getElementById("checkout").setAttribute("min", checkinDate);
            //     });

            //     const bookingButtons = document.querySelectorAll('button[type="submit"]');

            //     bookingButtons.forEach(btn => {
            //         btn.addEventListener('click', function(e) {
            //             e.preventDefault();

            //             const form = e.target.closest('form');
                    
            //             const roomTotalSelect = form.querySelector('.room-total select');
            //             const roomTotalValue = roomTotalSelect.options[roomTotalSelect.selectedIndex].value;
                    
                        
            //             const checkinValue = document.querySelector('#checkin').value;
            //             const checkoutValue = document.querySelector('#checkout').value;
            //             const manValue = document.querySelector('#man').value;
            //             const childValue = document.querySelector('#child').value;
                    
            //             // Append these values to the form
            //             form.appendChild(createHiddenInput('checkin', checkinValue));
            //             form.appendChild(createHiddenInput('checkout', checkoutValue));
            //             form.appendChild(createHiddenInput('man', manValue));
            //             form.appendChild(createHiddenInput('child', childValue));
            //             form.appendChild(createHiddenInput('roomTotal', roomTotalValue));

            //             form.submit();
            //         });
            //     });
            // });

            document.addEventListener('DOMContentLoaded', function() {
                const labels = document.querySelectorAll('.buttons-box label');
                        
                labels.forEach(label => {
                    label.addEventListener('click', function() {
                        labels.forEach(l => l.classList.remove('selected')); 
                        this.classList.add('selected'); 
                    });
                });
            
                // ใช้ event delegation สำหรับการเปลี่ยนแปลง radio buttons
                document.body.addEventListener('change', function(e) {
                    if (e.target && e.target.matches('.buttons-box input[type="radio"]')) {
                        const selectedValue = getSelectedBedValue();
                    
                        const xhttp = new XMLHttpRequest();
                        xhttp.onload = function() {
                            document.getElementsByClassName("room")[0].innerHTML = this.responseText;
                        }
                        xhttp.open("POST", "stay_filter.php");
                        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        xhttp.send('type=' + selectedValue); 
                    }
                });
            
                var today = new Date().toISOString().split('T')[0];
                document.getElementById("checkin").setAttribute('min', today);
            
                document.getElementById("checkin").addEventListener("change", function() {
                    var checkinDate = this.value;
                    document.getElementById("checkout").setAttribute("min", checkinDate);
                });
            
                // ใช้ event delegation สำหรับปุ่ม submit
                document.body.addEventListener('click', function(e) {
                    if (e.target && e.target.matches('button[type="submit"]')) {
                        e.preventDefault();
                    
                        const form = e.target.closest('form');
                        const roomTotalSelect = form.querySelector('.room-total select');
                        const roomTotalValue = roomTotalSelect.options[roomTotalSelect.selectedIndex].value;
                    
                        const checkinValue = document.querySelector('#checkin').value;
                        const checkoutValue = document.querySelector('#checkout').value;
                        const manValue = document.querySelector('#man').value;
                        const childValue = document.querySelector('#child').value;
                    
                        form.appendChild(createHiddenInput('checkin', checkinValue));
                        form.appendChild(createHiddenInput('checkout', checkoutValue));
                        form.appendChild(createHiddenInput('man', manValue));
                        form.appendChild(createHiddenInput('child', childValue));
                        form.appendChild(createHiddenInput('roomTotal', roomTotalValue));
                    
                        form.submit();
                    }
                });
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