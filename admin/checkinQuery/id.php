<?php   

    include('../../conn.php');

    $sql = 'SELECT * FROM tb_user WHERE user_name LIKE "%'.$_GET['name'].'%" LIMIT 1';
    $result = mysqli_query($conn,$sql);
    $col = mysqli_fetch_array($result);

    if($row = mysqli_num_rows($result)){
        echo $col['user_id'];
    }else{
        echo '';
    }

?>