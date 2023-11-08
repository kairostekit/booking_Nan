<?php
    session_start();
    include("../conn.php");

    if($_SESSION['user']['user_type']!=1){
    echo '<script>
        window.history.back();
    </script>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Management</title>

    <!--Style Sheet-->
    <link rel="stylesheet" href="style1.css">
    <!--Material Icons-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</head>
<body>

    <!-- ----------------------- Modal ---------------------- -->

    <div id="modal-roomTypeEdit" class="modal-container">
        <div class="modal modal-roomTypeEdit-info">
            <div class="modal-content">
                <span class="material-symbols-sharp" onclick="document.getElementById('modal-roomTypeEdit').style.display = 'none'">close</span>
                <h2>รายละเอียดประเภท</h2> 

                <form action="roomType_edit.php" method="post" enctype="multipart/form-data" onsubmit="return confirm('ต้องการแก้ไขหรือไม่?')">

                    <div>
                        <label for="rtid">รหัส :</label>
                        <input type="text" name="rtid" id="rtid" readonly>
                    </div>
                    <div>
                        <label for="rtname">ชื่อ :</label>
                        <input type="text" name="rtname" required>
                    </div>
                    <div>
                        <label for="rttype">ประเภท :</label>
                        <select name="type" id="rttype">
                            <option value="1">รายวัน</option>
                            <option value="2">รายเดือน</option>
                        </select>
                    </div>
                    <div>
                        <label for="rtbed">เตียง :</label>
                        <select name="bed" id="rtbed">
                            <option value="1">เตียงเดี่ยว</option>
                            <option value="2">เตียงคู่</option>
                        </select>
                    </div>
                    <div>
                        <label for="rtprice">ราคา :</label>
                        <input type="text" name="rtprice" required>
                    </div>
                    <div>
                        <label for="sale">ส่วนลด :</label>
                        <input type="text" name="sale" required>
                    </div>
                    <div>
                        <label for="total">จำนวนห้อง :</label>
                        <input type="text" name="total" required>
                    </div>
                  
                    <div>
                        <label for="name">รูปภาพ :</label>
                        <div class="image-add">
                            <div class="images-view">                            
                            </div>
                            <input type="file" name="image[]" multiple>
                        </div>
                    </div>                    
                    <div class="button" id="btnCO">
                        <button type="submit">แก้ไข</button>
                    </div>
                    
                </form>
              
             
            </div>
        </div>
    </div>

    <!-- ----------------------- Modal-End ---------------------- -->
  

    <!--======================Aside====================== */-->

    <divl class="container container-checkin">
        <aside>
            <div class="top">
                <div class="logo">
                        <h2>Booking <span class="danger">Manage</span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-symbols-sharp">close</span>
                </div>
            </div>
            <div class="sidebar">
                <a href="book.php" class="">
                    <span class="material-symbols-sharp">book</span>
                    <h3>จอง</h3>
                </a>
                <a href="customer.php" class="">
                    <span class="material-symbols-sharp">person</span>
                    <h3>ลูกค้า</h3>
                </a>
                <div class="room active">
                    <span class="material-symbols-sharp">door_front</span>
                    <h3>ห้องพัก</h3>                    
                </div>    
                <a href="../logout.php">
                    <span class="material-symbols-sharp">logout</span>
                    <h3>ออกจากระบบ</h3>
                </a>                
            </div>
        </aside>

        <!--======================End of Aside======================-->

        <main>            
            <div class="recent-order">
                <h1>ประเภทห้องพัก</h1>
                <div class="search">
                    <input type="search" name="srch" id="srch" onkeyup="loadData(getTable,'roomQuery/tbRoom.php?str='+this.value)">
                    <button for="srch"><span class="material-symbols-sharp">search</span></button>
                </div>
                <div class="div-table-checkin">
                    <table class="table-checkin table-room">
                        <thead>
                            <tr>
                                <th>รหัส</th>
                                <th>ชื่อ</th>
                                <th>ประเภท</th>
                                <th>เตียง</th>
                                <th>ราคา</th>
                                <th>ส่วนลด</th>
                                <th>จำนวนห้อง</th>
                                <th>รูปภาพ</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <?php        
                                
                                $sql = 'SELECT * FROM tb_room JOIN tb_room_img ON tb_room.room_id = tb_room_img.room_id GROUP BY tb_room.room_id ORDER BY tb_room.room_id DESC';
                                if($result = mysqli_query($conn,$sql)){
                    
                                    while($col = mysqli_fetch_array($result)){

                                        switch ($col['room_type']) {
                                            case 1:
                                                $type = 'รายวัน';
                                                break;
                                            
                                            case 2:
                                                $type = 'รายเดือน';
                                                break;
                                        }

                                        switch ($col['room_bed']) {
                                            case 1:
                                                $bed = 'เตียงเดี่ยว';
                                                break;
                                            
                                            case 2:
                                                $bed = 'เตียงคู่';
                                                break;
                                        }

                                        echo '
                                            <tr>
                                                <td>'.$col[0].'</td>
                                                <td>'.$col['room_name'].'</td>
                                                <td>'.$type.'</td>
                                                <td>'.$bed.'</td>
                                                <td>'.$col['room_price'].'</td>
                                                <td>'.($col['room_sale'] ?? '-').'</td>
                                                <td>'.$col['room_total'].'</td>
                                                <td><img src="../asset/images/'.$col['room_img_path'].'"></td>
                                            </tr>
                                        ';
                                    }

                                }else{
                                    die('Cloud not connected: '.mysqli_error());
                                }

                           ?>
                        </tbody>
                    </table>

                </div>
                <!--<a href="#">Show All</a>-->
            </div>
        </main>
        <!--======================End of Main======================-->

        <div class="right">
            <div class="top">
                <button id="menu-btn"><span class="material-symbols-sharp">menu</span></button>
                <div class="theme-toggler">
                    <span class="material-symbols-sharp active">
                        light_mode
                    </span>
                    <span class="material-symbols-sharp">
                        dark_mode
                    </span>
                </div>   
            </div>
            <!-- End of Top -->

            <?php

                $sql2 = 'SELECT room_id FROM tb_room ORDER BY room_id DESC LIMIT 1';                

                if($result2 = mysqli_query($conn,$sql2)){
                    $lastId = mysqli_fetch_array($result2)[0];
                    $lastId += 1;
                }else{
                    die('Cloud not connected: '.mysqli_error());
                }          

            ?>

            <div class="recent-update room-type-insert">
                <div class="updates room-type-div">
                    <h2>เพิ่มประเภทห้องพัก</h2>
                    <form action="roomType_insert.php" method="post" enctype="multipart/form-data" onsubmit="return confirm('คุณต้องการลงทะเบียนลูกหรือไม่?')">
                        <div>
                            <label for="rtid">หมายเลขรหัส :</label>
                            <input type="text" name="rtid" id="rtid" value="<?php echo $lastId; ?>" readonly >
                        </div>
                        <div>
                            <label for="name">ชื่อ :</label>
                            <input type="text" name="rtname" id="name" required>
                        </div>
                        <div>
                            <label for="bed">เตียง :</label>
                            <select name="bed" id="bed">
                                <option value="1">เตียงเดี่ยว</option>
                                <option value="2">เตียงคู่</option>
                            </select>
                        </div>
                        <div>
                            <label for="type">ประเภทห้อง :</label>
                            <select name="type" id="type">
                                <option value="1">รายวัน</option>
                                <option value="2">รายเดือน</option>
                            </select>
                        </div>
                        <div>
                            <label for="price">ราคา :</label>
                            <input type="text" name="rtprice" id="price" required>
                        </div>
                        <div>
                            <label for="total">จำนวน :</label>
                            <input type="text" name="total" id="total" required>
                        </div>
                        <div>
                            <label for="images" id="lbImages">รูปภาพ</label>
                            <input type="file" name="image[]" id="images" accept=".jpg,.jpeg,.png" multiple>      
                            <div class="images-upload" onclick="browse()">
                                <h2>เพิ่มรูปภาพ</h2>
                            </div>
                        </div>
                        <div class="button">
                            <button type="submit">ยืนยัน</button>
                        </div>
                    </form>
                </div>
            </div>
            

        </div>

    </divl>


    <script>

        function browse(){
            document.getElementById('lbImages').click();
        }
               

        //--------------------Get Table Value------------------------------------
        var table = document.getElementsByTagName('table')[0];
        var tbody = table.getElementsByTagName('tbody')[0];
        tbody.onclick = (e) => {
            var data = [];
            var collect = [];
            var target = e.target;
            while(target && target.nodeName !== 'TR'){
                target = target.parentNode;
            }
            if(target){
                var cells = target.getElementsByTagName('td');
                for(var i = 0;i < cells.length;i++){
                    data.push(cells[i].innerHTML);
                }
            }
            
            document.getElementById('modal-roomTypeEdit').style.display = 'flex';

            var form = document.getElementsByTagName('form')[0];
            var collect = form.getElementsByTagName('input');
            for(var i=0;i<(data.length-1);i++){
                if(i < 2 ) {
                    collect[i].value = data[i];
                }else if(i>3) {
                    collect[i-2].value = data[i];
                }

                switch (i) {
                    case 2:
                        if(data[i] == 'รายวัน') {
                            document.getElementById('rttype').selectedIndex = 0;
                        }else {
                            document.getElementById('rttype').selectedIndex = 1;
                        }
                        break;
                    case 3:
                        if(data[i] == 'เตียงเดี่ยว') {
                            document.getElementById('rtbed').selectedIndex = 0;
                        }else {
                            document.getElementById('rtbed').selectedIndex = 1;
                        }
                        break;    
                
                    
                }
            }

            loadData(getImages,'roomQuery/images.php?id='+data[0]);

            var modalEdit =  document.getElementById('modal-roomTypeEdit');
            window.onclick = (e) => {
                if(e.target === modalEdit){
                    modalEdit.style.display = 'none';
                }
            }
            
        }    
        
        //--------------------Load Data------------------------------------
        function loadData(cFunction,url){
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function(){cFunction(this);}
            xhttp.open('GET',url);
            xhttp.send();
        }    

        function getTable(xhttp){
            document.getElementById('tbody').innerHTML = xhttp.responseText;
        }

        function getImages(xhttp){
            document.getElementsByClassName('images-view')[0].innerHTML = xhttp.responseText;
        }
            
        //--------------------Preview Images------------------------------------
        const input = document.getElementById('images');
        const view = document.getElementsByClassName('images-upload')[0];

        input.onchange = () => {

            while(view.firstChild){
                view.removeChild(view.firstChild);
            }

            const curFiles = input.files;
            if(curFiles.length === 0){
                const para = document.createElemet('p');
                para.innerText = 'เพิ่มรูปภาพ';
                view.appendChild(para);
            }else{
                const list = document.createElement('ol');
                view.appendChild(list);

                for(const file of curFiles){
                    const listItem = document.createElement('li');
                    const para = document.createElement('p');
                    if(validFileType(file)){
                        const image = document.createElement('img');
                        image.src = URL.createObjectURL(file);
                        listItem.appendChild(image);              
                    }else{
                        para.textContent = `File name ${file.name}: Not a valid file type. Update your selection.`;
                        listItem.appendChild(para);
                    }
                    list.appendChild(listItem);
                }
            }

        }

        const fileTypes = [
            "image/apng",
            "image/bmp",
            "image/gif",
            "image/jpeg",
            "image/pjpeg",
            "image/png",
            "image/svg+xml",
            "image/tiff",
            "image/webp",
            "image/x-icon"
        ];

        function validFileType(file){
            return fileTypes.includes(file.type);
        }

        const img = document.getElementsByClassName('delImg');
        
        function delImage(e){                     
            if(confirm('ต้องการลบรูปหรือไม่')){
                window.location = 'roomType_delImg.php?src='+e.alt;
            }
        }

        //--------------------Modal------------------------------------
        
    </script>
    <script src="./index.js"></script>

</body>
</html>