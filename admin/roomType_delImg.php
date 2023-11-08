<?php

    include('../conn.php');

    $src = $_GET['src'];

    $sql = 'SELECT room_img_id FROM tb_room_img WHERE room_img_path = "'.$src.'"';
    $result = mysqli_query($conn,$sql);
    $imId = mysqli_fetch_array($result);

    $sql2 = 'DELETE FROM tb_room_img WHERE room_img_id = '.$imId[0];
    if(mysqli_query($conn,$sql2)){
        echo '
            <script>
                alert("ลบรูปภาพสำเร็จ");
                window.history.back();
            </script>
        ';
    }

    mysqli_close($conn);

?>