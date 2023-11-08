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

    <div id="modal-cusEdit" class="modal-container">
        <div class="modal modal-cusEdit-info">
            <div class="modal-content">
                <span class="material-symbols-sharp" onclick="document.getElementById('modal-cusEdit').style.display = 'none'">close</span>
                <h2>ข้อมูลลูกค้า</h2> 

                <form action="customer_edit.php" method="post" onsubmit="return confirm('ต้องการแก้ไขหรือไม่?')">

                    <div>
                        <label for="cusid">รหัสลูกค้า :</label>
                        <input type="text" name="cus_id" id="cusid"  readonly>
                    </div>
                    <div>
                        <label for="uname">ชื่อผู้ใช้งาน :</label>
                        <input type="text" name="uname" id="uname" readonly>
                    </div>
                    <div>
                        <label for="pass">รหัสผ่าน :</label>
                        <input type="text" name="pass" id="pass" required>
                    </div>
                    <div>
                        <label for="name">ชื่อสกุล :</label>
                        <input type="text" name="name" id="name" required>
                    </div>
                    <div>
                        <label for="mail">อีเมล :</label>
                        <input type="text" name="mail" id="mail" required>
                    </div>
                    <div>
                        <label for="tel">เบอร์โทร :</label>
                        <input type="text" name="tel" id="tel" required>
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
                <a href="customer.php" class="active">
                    <span class="material-symbols-sharp">person</span>
                    <h3>ลูกค้า</h3>
                </a>
                <a href="roomType.php" class="">
                    <span class="material-symbols-sharp">door_front</span>
                    <h3>room</h3>
                </a>
                
                <a href="../logout.php">
                    <span class="material-symbols-sharp">logout</span>
                    <h3>ออกจากระบบ</h3>
                </a>                
            </div>
        </aside>

        <!--======================End of Aside======================-->

        <main>            
            <div class="recent-order">
                <h1>ลูกค้า</h1>
                <div class="search">
                    <input type="search" name="srch" id="srch" onkeyup="loadData(this.value)">
                    <button for="srch"><span class="material-symbols-sharp">search</span></button>
                </div>
                <div class="div-table-checkin">
                    <table class="table-checkin">
                        <thead>
                            <tr>
                                <th>รหัสลูกค้า</th>
                                <th>ชื่อผู้ใช้งาน</th>
                                <th>รหัสผ่าน</th>
                                <th>ชื่อสกุล</th>
                                <th>อีเมล</th>
                                <th>เบอร์โทร</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                           <?php        
                                
                                $sql = 'SELECT * FROM tb_user ORDER BY user_id DESC';
                                if($result = $conn->query($sql)){

                                    while($col = $result->fetch_array()){
                                        echo '
                                            <tr>
                                                <td>'.$col[0].'</td>
                                                <td>'.$col[1].'</td>
                                                <td>'.$col[2].'</td>
                                                <td>'.$col[3].'</td>
                                                <td>'.$col[4].'</td>
                                                <td>'.$col[5].'</td>
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

                $sql2 = 'SELECT user_id FROM tb_user ORDER BY user_id DESC LIMIT 1';

                if($result2 = mysqli_query($conn,$sql2)){
                    $lastId = mysqli_fetch_array($result2)[0];
                    $lastId += 1;
                }else{
                    die('Cloud not connected: '.mysqli_error());
                }

            ?>

            <div class="recent-update customer-insert">
                <div class="updates customer-div">
                    <h2>ลงทะเบียนลูกค้า</h2>
                    <form action="customer_insert.php" method="post" onsubmit="return confirm('คุณต้องการลงทะเบียนลูกหรือไม่?')">
                        <div>
                            <label for="cusid">รหัสลูกค้า :</label>
                            <input type="text" name="cus_id" id="cusid" value="<?php echo $lastId; ?>" required >
                        </div>
                        <div>
                            <label for="uname">ชื่อผู้ใช้งาน :</label>
                            <input type="text" name="uname" id="uname" required>
                        </div>
                        <div>
                            <label for="pass">รหัสผ่าน :</label>
                            <input type="text" name="pass" id="pass" required>
                        </div>
                        <div>
                            <label for="name">ชื่อสกุล :</label>
                            <input type="text" name="name" id="name" required>
                        </div>
                        <div>
                            <label for="mail">อีเมล :</label>
                            <input type="text" name="mail" id="mail" required>
                        </div>
                        <div>
                            <label for="tel">เบอร์โทร :</label>
                            <input type="text" name="tel" id="tel" required>
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
        
        //--------------------Load Data------------------------------------
        function loadData(str){
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function(){
                document.getElementById('tbody').innerHTML = this.responseText;
            }
            xhttp.open('GET','customerQuery/table.php?str='+str);
            xhttp.send();
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
            
            document.getElementById('modal-cusEdit').style.display = 'flex';

            var form = document.getElementsByTagName('form')[0];
            var collect = form.getElementsByTagName('input');
            for(var i=0;i<data.length;i++){
                collect[i].value = data[i];
            }

            var modalEdit =  document.getElementById('modal-cusEdit');
            window.onclick = (e) => {
                if(e.target === modalEdit){
                    modalEdit.style.display = 'none';
                }
            }

        }

        
            
    
        //--------------------Modal------------------------------------
        
    </script>
    <script src="./index.js"></script>

</body>
</html>