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

    <div id="modal-cusInsert" class="modal-container">
        <div class="modal modal-cusInsert-info">
            <div class="modal-content">
                <h2>เพิ่มข้อมูลลูกค้า</h2> 

                <form action="../regis_insert.php" method="post" onsubmit="return confirm('คุณต้องการเพิ่มข้อมูลลูกค้าหรือไม่?')">

                    <div>
                        <label for="uname">ชื่อผู้ใช้:</label>
                        <input type="text" name="uname" id="uname">
                    </div>

                    <div>
                        <label for="pass">รหัสผ่าน:</label>
                        <input type="password" name="upass" id="pass">
                    </div>

                    <div>
                        <label for="cusname">ชื่อสกุล:</label>
                        <input type="text" name="name" id="cusname">
                    </div>

                    <div>
                        <label for="mail">อีเมล:</label>
                        <input type="email" name="mail" id="mail">
                    </div>

                    <div>
                        <label for="line">ไอดีไลน์:</label>
                        <input type="text" name="line" id="line">
                    </div>

                    <div>
                        <label for="tel">เบอร์โทร:</label>
                        <input type="tel" name="tel" id="tel">
                    </div>

                    <div class="button">
                        <button type="submit">ยืนยัน</button>
                        <button onclick="document.getElementById('modal-cusInsert').style.display = 'none';" type="reset">ยกเลิก</button>
                    </div>
                    
                </form>
              
             
            </div>
        </div>
    </div>

    <div id="modal-bookEdit" class="modal-container">
        <div class="modal modal-bookEdit-info">
            <div class="modal-content">
                <span class="material-symbols-sharp" onclick="document.getElementById('modal-bookEdit').style.display = 'none'">close</span>
                <h2>รายละเอียดการจอง</h2> 

                <form action="book_edit.php" method="post" onsubmit="return confirm('ต้องการเปลี่ยนสถานะการจองหรือไม่?')">

                    <div>
                        <label for="bookid">หมายเลข:</label>
                        <input type="text" name="bookid" id="bookid" readonly>
                    </div>

                    <div>
                        <label for="username">ชื่อผู้จอง:</label>
                        <input type="text" name="username" id="username" readonly>
                    </div>

                    <div>
                        <label for="man">ผู้ใหญ่:</label>
                        <input type="text" name="man" id="man" readonly>
                    </div>

                    <div>
                        <label for="child">เด็ก:</label>
                        <input type="text" name="child" id="child" readonly>
                    </div>

                    <div>
                        <label for="in">วันเข้าพัก:</label>
                        <input type="text" name="in" id="in" readonly>
                    </div>

                    <div>
                        <label for="out">วันออก:</label>
                        <input type="text" name="out" id="out" readonly>
                    </div>

                    <div>
                        <label for="roomtotal">จำนวนห้อง:</label>
                        <input type="text" name="roomtotal" id="roomtotal" readonly>
                    </div>

                    <div>
                        <label for="stat">สถานะ:</label>
                        <input type="text" name="stat" id="stat" readonly>
                    </div>

                    <div class="button" id="btn">
                        <button type="submit">เข้าพัก</button>
                        <button type="submit" formaction="book_cancel.php">ยกเลิกการจอง</button>
                    </div>
                    
                </form>
              
             
            </div>
        </div>
    </div>

    <!-- ----------------------- Modal-End ---------------------- -->
  

    
    <divl class="container container-checkin">

        <!--======================Aside====================== */-->

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
                <a href="book.php" class="active">
                    <span class="material-symbols-sharp">book</span>
                    <h3>จอง</h3>
                </a>
                <a href="customer.php" class="">
                    <span class="material-symbols-sharp">person</span>
                    <h3>ลูกค้า</h3>
                </a>
                <a href="roomType.php" class="">
                    <span class="material-symbols-sharp">door_front</span>
                    <h3>ห้องพัก</h3>
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
                <h1>จองห้องพัก</h1>
                <div class="search">
                    <input type="search" name="srch" id="srch" onkeyup="loadData('bookQuery/table.php?str='+this.value,getTable)">
                    <button for="srch"><span class="material-symbols-sharp">search</span></button>
                </div>
                <div class="div-table-checkin">
                    <table class="table-checkin">
                        <thead>
                            <tr>
                                <th>หมายเลข</th>
                                <th>ชื่อผู้จอง</th>
                                <th>ผู้ใหญ่</th>
                                <th>เด็ก</th>
                                <th>วันเข้าพัก</th>
                                <th>วันออก</th>
                                <th>จำนวนห้องพัก</th>
                                <th>สถานะ</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                           <?php        
                                $sql = 'SELECT * FROM tb_book JOIN tb_user ON tb_book.user_id = tb_user.user_id';
                                $result = $conn->query($sql);
                                
                                while($col = $result->fetch_assoc()){
                                    switch ($col['book_status']) {
                                        case 0:
                                            $status = 'รอชำระเงิน';
                                            $color = 'danger';
                                            break;
                                        case 1:
                                            $status = 'ชำระเงินแล้ว';
                                            $color = 'success';
                                            break;
                                        case 2:
                                            $status = 'รอเข้าพัก';
                                            $color = 'warning';
                                            break;
                                        case 3:
                                            $status = 'กำลังเข้าพัก';
                                            $color = 'primary';
                                            break;
                                        case 4:
                                            $status = 'คืนห้อง';
                                            $color = 'dark';
                                            break;                                       
                                        
                                    }
                                    echo '
                                        <tr>
                                            <td>'.$col['book_id'].'</td>
                                            <td>'.$col['user_name'].'</td>
                                            <td>'.$col['book_man'].'</td>
                                            <td>'.$col['book_child'].'</td>
                                            <td>'.$col['book_in'].'</td>
                                            <td>'.$col['book_out'].'</td>
                                            <td>'.$col['book_total'].'</td>
                                            <td class="'.$color.'">'.$status.'</td>
                                        </tr>
                                    ';
    
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

            <div class="recent-update checkin-insert">
                <div class="updates checkin-div" id="panel">
                    <h2>จองห้องพัก</h2>
                    <form >
                        <div>
                            <label for="cusid">รหัสลูกค้า :</label>
                            <input type="text" name="cus_id" id="cusid"  readonly>
                        </div>
                        <div>
                            <label for="name">ชื่อสกุล :</label>
                            <input type="text" name="name" id="name" readonly>
                        </div>
                        <div>
                            <label for="person">จำนวนผู้เข้าพัก :</label>
                            <input type="text" name="person" id="person" readonly>
                        </div>
                        <div>
                            <label for="datein">วันเข้าพัก :</label>
                            <input type="text" name="datein" id="datein" readonly>
                        </div>
                        <div>
                            <label for="type">ประเภทห้อง :</label>
                            <input type="text" name="type" id="type" readonly>
                        </div>
                        
                        <div>
                            <label for="roomTotal">จำนวนห้อง :</label>
                            <input type="text" name="roomTotal" id="roomTotal" readonly>
                        </div>                        
                        <div>
                            <label for="total">หลักฐานการโอนเงิน :</label>
                            <div class="slip">
                                <h2>หลักฐานการโอนเงิน</h2>
                            </div>
                        </div>
                        <div class="button">
                            <button type="submit"  onclick="return false;">คลิกเพื่อเปลี่ยนสถานะ</button>
                            <!-- <button type="reset" onclick="document.getElementById('modal-cusInsert').style.display = 'block'">เพิ่มข้อมูลลูกค้า</button> -->
                        </div>
                    </form>
                </div>
            </div>
            <!--======================End of RecentUpdate======================-->
            

        </div>

    </divl>


    <script>
        
        
     
        //--------------------Load Data------------------------------------
        function loadData(url,cfunction){
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function(){cfunction(this);}
            xhttp.open('GET',url);
            xhttp.send();
        }

        function getName(xhttp){
            document.getElementById('name').value = xhttp.responseText;
        }

        function getId(xhttp){
            const name = document.getElementById('name').value;
            if(name != ''){
                document.getElementById('cusid').value = xhttp.responseText;
            }else{
                document.getElementById('cusid').value = '';
            }
        }

        function getTable(xhttp){
            document.getElementById('tbody').innerHTML = xhttp.responseText;
        }

        function getPanel(xhttp){
            document.getElementById('panel').innerHTML = xhttp.responseText;
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
            console.log(data[0]);
            loadData('bookQuery/panel.php?id='+data[0],getPanel);
            // var form = document.getElementsByTagName('form')[1];
            // collect = form.getElementsByTagName('input');
            // for(var i = 0;i < data.length;i++){
            //     collect[i].value = data[i];                    
            // }            
            
            // document.getElementById('modal-bookEdit').style.display = 'block';
            // var mdEdit = document.getElementById('modal-bookEdit');
            // window.onclick = (e) => {
            //     if(e.target == mdEdit){
            //         mdEdit.style.display = 'none';
            //     }
            // }
            // var bookStat = document.getElementById('bookstat');
            // if(bookStat.value != 'จอง'){
            //     document.getElementById('btn').style.display = 'none';
            // }else{
            //     document.getElementById('btn').style.display = 'flex';
            // }
        }

        //--------------------Modal------------------------------------
        
    </script>
    <script src="./index.js"></script>

</body>
</html>