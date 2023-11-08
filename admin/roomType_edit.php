<?php

    include('../conn.php');
    
    $rtId = $_POST['rtid'];
    $rtName = $_POST['rtname'];
    $type = $_POST['type'];
    $bed = $_POST['bed'];
    $rtPrice = $_POST['rtprice'];    
    $sale = $_POST['sale'];    
    $total = $_POST['total'];    

    $sql = "UPDATE tb_room 
    SET room_name = '$rtName', room_type = '$type', room_bed ='$bed', room_price = '$rtPrice' , room_sale = '$sale', room_total = '$total'
    WHERE room_id = $rtId";
    if(mysqli_query($conn,$sql)){
        if(isset($_FILES['image']) && $_FILES['image']['error'][0] == 0){
            $countFiles = count($_FILES['image']['name']);
            for($i=0;$i<$countFiles;$i++){
    
                $file = $_FILES['image']['tmp_name'][$i];
                $target = '../asset/images/room/'.$_FILES['image']['name'][$i];
                move_uploaded_file($file,$target);
    
                $sql = 'INSERT INTO tb_room_img VALUES(null,"room/'.$_FILES['image']['name'][$i].'",'.$rtId.')';
                mysqli_query($conn,$sql);
    
            }
        }
        
        echo '
            <script>
                alert("แก้ไขสำเร็จ");
                window.history.back();
            </script>
        ';          

    }

    

    mysqli_close($conn);

?>