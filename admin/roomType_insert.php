<?php

    include('../conn.php');

    $rtId = $_POST['rtid'];
    $rtName = $_POST['rtname'];
    $bed = $_POST['bed'];
    $type = $_POST['type'];
    $rtPrice = $_POST['rtprice'];
    $total = $_POST['total'];

    $sql1 = "INSERT INTO tb_room
    VALUES(null,'$rtName','$type','$bed','$rtPrice','0','$total')
    ";
    if($result1 = mysqli_query($conn,$sql1)){
        $lastid = $conn->insert_id;
        $countFiles = count($_FILES['image']['name']);
        for($i = 0;$i < $countFiles;$i++){
            $file = $_FILES['image']['tmp_name'][$i];
            $target = '../asset/images/room/'.$_FILES['image']['name'][$i];
            move_uploaded_file($file,$target);
    
            $sql2 = 'INSERT INTO tb_room_img VALUES(null,"room/'.$_FILES['image']['name'][$i].'",'.$lastid.')';
            mysqli_query($conn,$sql2);
        }

        echo '
            <script>
                alert("Success");
                window.history.back();
            </script>
        ';

    }else{
        die('Cloud not connected: '.mysqli_error());
    }

    mysqli_close($conn);

?>