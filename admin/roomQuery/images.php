<?php

    include('../../conn.php');

    $id = $_GET['id'];

    $sql = 'SELECT room_img_path FROM tb_room_img WHERE room_id ='.$id;
    $result = mysqli_query($conn,$sql);

    while($col = mysqli_fetch_array($result)){
        echo '<img src="../asset/images/'.$col[0].'" alt="'.$col[0].'" onclick="delImage(this)">';
    }


?>