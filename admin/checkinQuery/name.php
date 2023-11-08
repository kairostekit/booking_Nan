<?php   

    include('../../conn.php');

    $sql = 'SELECT * FROM tb_user WHERE user_id = "'.$_GET['id'].'" LIMIT 1';
    $result = mysqli_query($conn,$sql);
    $col = mysqli_fetch_array($result);

    if($row = mysqli_num_rows($result)){
        echo $col['user_name'];
    }else{
        echo '';
    }

?>